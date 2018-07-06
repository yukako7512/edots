@extends('layouts.app')
@section('content')

<a href="{{route('art.get')}}"><p>Arts</p></a>
<a href="{{route('sport.get')}}"><p>Sports</p></a>
<a href="{{route('language.get')}}"><p>Language</p></a>
<a href="{{route('nature.get')}}"><p>Nature</p></a>
<a href="{{route('beauty.get')}}"><p>Beauty</p></a>
<a href="{{route('food.get')}}"><p>Food</p></a>
<a href="{{route('technology.get')}}"><p>Technology</p></a>
<a href="{{route('others.get')}}"><p>Others</p></a>

<a href="{{ route('post.get') }}"><p>Let's post an Event</p></a>
@endsection
