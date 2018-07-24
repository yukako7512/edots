@extends('layouts.app')



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dotslink</title>
    <link rel="stylesheet" href="{{ secure_asset('category/index.css') }}">

      

  </head>
  
  <body>
    @section('content')
  <div class="category-wrapper" class="clearfix">
    <div class='container'>
  
      <div class="heading">
          <h1>Category Index<span>.</span></h1>
          <p>Find the category you like to join or share!</p>
          <hr>
          
  <div class='category' class="clearfix">
  <a href="{{ route('history.get') }}">             
  <div class = "history">            
  <img src="{{ secure_asset('category/history1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">HISTORY</div>
  </div>
  </div>
  
  <div class='category' class="clearfix">
  <a href="{{ route('technology.get') }}">             
  <div class = "tech">            
  <img src="{{ secure_asset('category/technology1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">TECHNOLOGY</div>
  </div>
  </div>
  
  <div class='category' class="clearfix">
  <a href="{{ route('food.get') }}">             
  <div class = "food">            
  <img src="{{ secure_asset('category/food1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">FOODS</div>
  </div>
  </div>
          
  <div class='category' >
  <a href="{{ route('nature.get') }}">             
  <div class = "nature">            
  <img src="{{ secure_asset('category/nature1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">NATURE</div>
  </div>
  </div>
  
    <div class='category' >   
  <a href="{{ route('language.get') }}">  
  <div class = "language">            
  <img src="{{ secure_asset('category/language1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">LANGUAGE</div>
  </div>
  </div>
  
    <div class='category' >  
  <a href="{{ route('beauty.get') }}">  
  <div class = "beauty">            
  <img src="{{ secure_asset('category/beauty1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">BEAUTY</div>
  </div>
  </div>
  
  <div class='category' >
  <a href="{{ route('art.get') }}">           
  <div class = "art">            
  <img src="{{ secure_asset('category/art1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">ARTS</div>
  </div>
  </div>

  <div class='category' >     
  <a href="{{ route('sport.get') }}">  
  <div class = "sport">            
  <img src="{{ secure_asset('category/sport1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">SPORTS</div>
  </div>
  </div>
  
  <div class='category' class="clearfix">
  <a href="{{ route('others.get') }}">             
  <div class = "other">            
  <img src="{{ secure_asset('category/others1.jpg') }}" alt="Avatar" class="image">
  <div class="overlay">OTHERS</div>
  </div>
  </a>
  </div>
  </div>
  </div>
</div>

  
<div class="message-wrapper">
      <div class="container">
        <div class="heading">
       
        </div>
       
       <div class="post">
        <a href="{{ route('post.get') }}" class='btn'>
          
           <p class="taikenpost">POST</p>
<div class="plus"></div>
          
       </a>
    </div>
       
      </div>
    </div>
    
    
 </body> 
  

  </html>
  
  @endsection
