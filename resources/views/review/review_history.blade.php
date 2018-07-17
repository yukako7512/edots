@extends('layouts.app')
@section('content')

@foreach($my_events as $my_event)
<p>---------------------------------</p>
<p>{{$my_event->title}}</p>

<?php
$reviews = $my_event->reviews()->get();
?>

    @foreach($reviews as $review)
    <?php
    $stars = $review->stars($review->rating);
    ?>
        @if($review!=null)
        <p>=====</p>
        <p>{{$review->user()->get()->first()->name}}</p>
        <p>{{$stars}}</p>
        <p>{{$review->comment}}</p>
        <p>=====</p>
        @endif
    @endforeach
<p>---------------------------------</p>
@endforeach
@endsection