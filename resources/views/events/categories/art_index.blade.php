@extends('layouts.app')
@section('content')

@foreach($items as $item)
<p>----------------------</p>
    <a href = "{{route ('eventshow.get', $item->id) }}">
        <p>{{$item->title}}</p>
    </a>
<p>{{$item->date}}</p> 
<p>{{$item->place}}</p> 
<p>{{$item->point}}ポイント</p> 
<p>----------------------</p>

@endforeach
@endsection