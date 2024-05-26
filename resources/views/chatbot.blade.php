@extends('layouts.sign')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
@section('title',"ChatBot")
@section('content')
    <script>
        var botmanWidget = {
            aboutText:'Dawaak',
            introMessage: ' Say Hi to Dawaak ChatBot',
            title: 'ChatBot',
            placeholderText:'Enter Your message',
            dateTimeFormat:


        };
    </script>
    
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection