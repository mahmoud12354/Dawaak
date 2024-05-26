<?php

namespace App\Http\Controllers;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BotmanController extends Controller
{
    public function handle(){
        $botman = app('botman');
        $botman->hears('{message}',function($botman,$message){
            if($message == 'Hi' ){
                $this->askName($botman);
            }else{
                $botman->reply("i can't understand you ");
            }
        });
        $botman->listen();
    }
    public function askName($botman){
        $botman->ask("hello! what is Your Name?", function(Answer $answer){
            $name = $answer->getText();
            $this->say('nice to meet you ' .$name);
        });
    }

    public function chatbot() {
        if (Auth::check()){
            return view('chatbot');
        }else{
            return view('login');
        }
    }
}
