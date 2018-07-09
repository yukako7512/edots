@extends('layouts.app')
@section('content')

<p>----------------------</p>
<p>{{$event->title}}</p>

@if (Auth::user()->id == $user->id)
<a href = "{{route ('usershow.get', $user->id) }}">
    <p>お前</p>
</a>
<p>{{$event->date}}</p> 
<p>{{$event->place}}</p> 
<p>{{$event->content}}</p>
<p>{{$event->point}}ポイント</p> 

@elseif (Auth::user()->request_check($event))
<a href = "{{route ('usershow.get', $user->id) }}">
    <p>{{$user->name}}さん</p>
</a>
<p>{{$event->date}}</p> 
<p>{{$event->place}}</p> 
<p>{{$event->content}}</p>
<p>{{$event->point}}ポイント</p>
<p>リクエスト済み</p>
    
@else
<a href = "{{route ('usershow.get', $user->id) }}">
    <p>{{$user->name}}さん</p>
</a>
<p>{{$event->date}}</p> 
<p>{{$event->place}}</p> 
<p>{{$event->content}}</p>
<p>{{$event->point}}ポイント</p> 
<a href = "{{route ('requestdone.get', $event->id)}}">    
    <p>リクエスト</p>
</a> 
    
@endif
   
<p>----------------------</p>

@endsection