<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Connecting Dots</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="{{ secure_asset('css/freepoint.css') }}">
    </head>
    
    <body>

<section class="callout">
      <div class="container text-center">
          <img src ="images/dots_logo2.jpg">
       <h2>ご登録ありがとうございます。</h2>
      </div>
</section>

<div id="wrapper">
    <div class="box">
        <h2>①</h2> 
        My page のPlofileで
        <br>特技や趣味を知らせよう
    </div>

    <div class="box">
        <h2>②</h2>
        主催するイベントを
        <br>フォームから登録
    </div>

    <div class="box">
        <h2>③</h2> 
        ポイントを使って
        <br>いろんなイベントに参加
    </div>
</div>

<div class="container text-center">
    <a href="{{route('firstindex.get')}}" class="btn btn-primary btn-xl">1000ptをGETして早速始める</a>
</div>
 
 </body>
</html>
 
