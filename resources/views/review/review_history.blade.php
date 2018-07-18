@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
            <title>レビュー履歴</title>
        <link rel="stylesheet" href="review_history.css">
    </head>

<body>
@foreach($my_events as $my_event)

<?php
$reviews = $my_event->reviews()->get();
$exist_or_not = $my_event->review_check ($my_event);
?>
@if($exist_or_not)
    <h2>「{{$my_event->title}}」のレビュー</h2>
    
    <div class="row">
    <div class="col-xs-10">
   
        @foreach($reviews as $review)
        <?php
        $stars = $review->stars($review->rating);
        ?>
        @if($review!=null)
         <div class="panel panel-default">
            <div class="panel-heading">    
                <p>{{$review->user()->get()->first()->name}}さん　{{$stars}}</p>
        	</div>
            <div class="panel-body">
                <p>{{$review->comment}}</p>
            </div>
        </div>
        @endif
        @endforeach  
    
    </div>
    </div>

@endif
@endforeach

<!--<p>まだレビューはありません</p>-->

</body>
@endsection