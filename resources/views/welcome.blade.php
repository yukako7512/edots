@extends('layouts.app')
@section('cover')
<p>Top Page</p>

<a href="{{route('index.get')}}"><p>start</p></a>
<a href="{{route('aboutus.get')}}"><p>about us</p></a>
@endsection