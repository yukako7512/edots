<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Share</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="{{ secure_asset('css/review.css') }}">
    </head>
    <body>
        @include('commons.navbar')
        
    <div class ="cover">
            <div class = "cover-contents">
                    <h1>体験をReviewしよう。</h1>
                    <br><br>
                    <p>以下の項目にご記入の上、<br>
                    POSTボタンを押してください。</p>
                    
                    {!! Form::open(['url' => 'reviewdone/'.$event_id.'/'.$attendiee_id])!!}
    <div class="form-group">
    {!! Form::label('rating', '評価') !!}    
    {!! Form::select('rating', ['1'=>'★', '2'=>'★★', '3'=>'★★★','4'=>'★★★★','5'=>'★★★★★']) !!} 
    </div>
    
    <div class="form-group">
     <p>コメント</p>   
    {!! Form::textarea('comment') !!}
    </div>
     <div class="form-group">
    {!! Form::submit('POST', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
            </div>
        </div>