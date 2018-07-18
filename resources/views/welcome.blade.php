@extends('layouts.app')
@section('cover')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ secure_asset('css/welcome.css') }}">
  </head>
  <body>
      
    <div id="box1" class="box">
      <span>&nbsp;&nbsp;&nbsp;&nbsp;全ての繋がりが</span><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;新しい経験になる</span><br>
    </div>
    
     <div id="box2" class="box">
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONNECTING YOUR DOTS</span>
    </div>
    <br>
    
<a href="{{route('index.get')}}" class="demo1">START</a><a href="{{route('aboutus.get')}}" class="demo2">ABOUT US</a>
    
  </body>
  
@endsection@extends('layouts.app')
@section('cover')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ secure_asset('css/dots.css') }}">
  </head>
  <body>
      
    <div id="box1" class="box">
      <span>&nbsp;&nbsp;&nbsp;&nbsp;全ての繋がりが</span><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;新しい経験になる</span><br>
    </div>
    
     <div id="box2" class="box">
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONNECTING YOUR DOTS</span>
    </div>
    <br>
    
<a href="{{route('index.get')}}" class="demo1">START</a><a href="{{route('aboutus.get')}}" class="demo2">ABOUT US</a>
    
  </body>
  
@endsection