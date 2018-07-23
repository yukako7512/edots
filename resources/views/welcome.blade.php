<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
  </head>
  <body>
        @include('commons.navbar')
    <div class="text"> 
    <div id="box1" class="box">
      <span>&nbsp;&nbsp;&nbsp;&nbsp;全ての繋がりが</span><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;新しい経験になる</span><br>
    </div>
    
     <div id="box2" class="box">
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONNECTING YOUR DOTS.</span>
    </div>
    <br>
    <div class="button">
<a href="{{route('signup.get')}}" class="demo1">START</a><a href="{{route('aboutus.get')}}" class="demo2">ABOUT US</a>
    </div>
  </body>
  
