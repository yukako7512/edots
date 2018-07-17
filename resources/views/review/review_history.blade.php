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
@foreach($my_reviews as $my_review)
<?php
$stars = $my_review->stars($my_review->rating);
?>

<div class="panel panel-info">
    <div class="panel-heading">
        {{$my_review->user()->name()}}さんのレビュー：{{$stars}}
	</div>
	
    <div class="panel-body">
        <p>コメント：{{$my_review->comment}}</p>
    </div>
</div>
</body>

@endforeach
@endsection


