import os
import nltk
import numpy as np
import tensorflow as tf
from tensorflow import keras
from keras.layers import Dense
from keras.models import Sequential
from keras.callbacks import EarlyStopping
import random
import json
import logging
from flask import Flask, request, jsonify, render_template
from nltk.corpus import wordnet

# Configure logging
logging.basicConfig(level=logging.DEBUG)

# Force TensorFlow to use the CPU
os.environ["CUDA_VISIBLE_DEVICES"] = "-1"

# Disable resource variables deprecation warning
tf.compat.v1.disable_resource_variables()

# Initialize Flask app
app = Flask(__name__)

# Check if NLTK data is downloaded, if not, download it
nltk.download('punkt')
nltk.download('wordnet')

# Define function to load intents data
def load_intents_data():
    intents_file = "D:\chatbot\ChatBot\intents.json"
    try:
        with open(intents_file) as file:
            logging.info("Loading intents data")
            return json.load(file)
    except FileNotFoundError:
        logging.error(f"Error: File '{intents_file}' not found.")
        return None

# Load intents data
data = load_intents_data()
if data is None:
    logging.error("Failed to load intents data. Exiting.")
    exit()

# Function to get synonyms
def get_synonyms(word):
    synonyms = set()
    for syn in wordnet.synsets(word):
        for lemma in syn.lemmas():
            synonyms.add(lemma.name().replace('_', ' '))
    return synonyms

# Function to expand patterns with synonyms
def expand_patterns(patterns):
    expanded_patterns = set()
    for pattern in patterns:
        tokens = nltk.word_tokenize(pattern)
        for token in tokens:
            synonyms = get_synonyms(token)
            for synonym in synonyms:
                new_pattern = pattern.replace(token, synonym)
                expanded_patterns.add(new_pattern)
        expanded_patterns.add(pattern)
    return list(expanded_patterns)

# Define function to preprocess data
def preprocess_data():
    words = []
    labels = []
    docs_x = []
    docs_y = []
    for intent in data["intents"]:
        for pattern in expand_patterns(intent["patterns"]):
            wrds = nltk.word_tokenize(pattern)
            words.extend(wrds)
            docs_x.append(wrds)
            docs_y.append(intent["tag"])

        if intent["tag"] not in labels:
            labels.append(intent["tag"])

    words = [nltk.stem.LancasterStemmer().stem(w.lower()) for w in words if w != "?"]
    words = sorted(list(set(words)))
    labels = sorted(labels)

    training = []
    output = []

    out_empty = [0 for _ in range(len(labels))]

    for x, doc in enumerate(docs_x):
        bag = []
        wrds = [nltk.stem.LancasterStemmer().stem(w) for w in doc]

        for w in words:
            if w in wrds:
                bag.append(1)
            else:
                bag.append(0)

        output_row = out_empty[:]
        output_row[labels.index(docs_y[x])] = 1
        training.append(bag)
        output.append(output_row)

    training = np.array(training)
    output = np.array(output)
    return words, labels, training, output

# Preprocess data
logging.info("Preprocessing data")
words, labels, training, output = preprocess_data()

# Define neural network model using Keras
model = Sequential()
model.add(Dense(8, input_shape=(len(training[0]),), activation='relu'))
model.add(Dense(8, activation='relu'))
model.add(Dense(len(output[0]), activation='softmax'))
model.compile(optimizer='adam', loss='categorical_crossentropy', metrics=['accuracy'])

# Define EarlyStopping callback
early_stopping = EarlyStopping(monitor='loss', patience=3, restore_best_weights=True)

model_file = "model.h5"

# Train or load model
if os.path.exists(model_file):
    logging.info("Loading model weights")
    try:
        model.load_weights(model_file)
    except ValueError as e:
        logging.error(f"Error loading model weights: {str(e)}")
        logging.info("Training model from scratch")
        model.fit(training, output, epochs=50, batch_size=8, callbacks=[early_stopping])
        model.save_weights(model_file)
else:
    logging.info("Training model")
    model.fit(training, output, epochs=50, batch_size=8, callbacks=[early_stopping])
    model.save_weights(model_file)

# Function to create bag of words
def bag_of_words(s, words):
    bag = [0 for _ in range(len(words))]
    s_words = nltk.word_tokenize(s)
    s_words = [nltk.stem.LancasterStemmer().stem(word.lower()) for word in s_words]

    for se in s_words:
        for i, w in enumerate(words):
            if w == se:
                bag[i] = 1
            
    return np.array(bag)

# Function to process message and return response
def chatbot_response(message):
    logging.info(f"Received message: {message}")
    results = model.predict(np.array([bag_of_words(message, words)]))[0]
    results_index = np.argmax(results)
    tag = labels[results_index]
    if results[results_index] > 0.8:
        for tg in data["intents"]:
            if tg['tag'] == tag:
                responses = tg['responses']
        response = random.choice(responses)
    else:
        response = "I'm sorry, I didn't understand that."
    logging.info(f"Response: {response}")
    return response

# Route to handle chatbot API requests
@app.route('/chatbot', methods=['POST'])
def chatbot_api():
    try:
        data = request.get_json()
        message = data['message']
        response = chatbot_response(message)
        return jsonify({'sender': 'DAWAAK', 'response': response})
    except Exception as e:
        logging.error(f"Error processing request: {str(e)}")
        return jsonify({'error': str(e)})

# Route for the root URL
@app.route('/')
def index():
    return render_template('index.html', intents=data["intents"])

# Route for handling 404 errors
@app.errorhandler(404)
def page_not_found(e):
    return render_template('404.html'), 404

# Main function
if __name__ == '__main__':
    logging.info("Starting Flask app")
    app.run(debug=True, host='192.168.1.7', port=8000)
