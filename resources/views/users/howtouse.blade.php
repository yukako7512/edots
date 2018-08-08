@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Share</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/howtouse.css') }}">


  </head>
  <body>
  <div id="heading">
    <h1>How To Use</h1>
  </div>
  <div class="tabs">
    <input id="all" type="radio" name="tab_item" checked>
    <label class="tab_item" for="all">主催者側</label>
    <input id="programming" type="radio" name="tab_item">
    <label class="tab_item" for="programming">参加者側</label>

    <div class="tab_content" id="all_content">
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/howtouse1.png" alt="画像の説明" style="border:none;width:450px;height:450px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="/images/howtouse2.png" alt="画像の説明" style="border:none;width:450px;height:450px;"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/howtouse3.png" alt="画像の説明" style="border:none;width:450px;height:450px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="/images/howtouse4.png" alt="画像の説明" style="border:none;width:450px;height:450px;">
    </div>
    <div class="tab_content" id="programming_content">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/howtouse5.png" alt="画像の説明" style="border:none;width:450px;height:450px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="/images/howtouse6.png" alt="画像の説明" style="border:none;width:450px;height:450px;"><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/howtouse7.png" alt="画像の説明" style="border:none;width:450px;height:450px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="/images/howtouse8.png" alt="画像の説明" style="border:none;width:450px;height:450px;">
        
</div>
    
    </body>
    </html>
    
@endsection