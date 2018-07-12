@extends('layouts.app')
@section('content')
@foreach($reviewers as $reviewer)
<p>{{$reviewer}}<p>
@endforeach

@foreach($my_reviews as $my_review)
<?php
$stars = $my_review->stars($my_review->rating);
?>
<p>-----------------------------</p>
<p>{{
<p>{{$stars}}</p>
<p>コメント{{$my_review->comment}}</p>
<p>-----------------------------</p>
@endforeach
@endsection