@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Dots</title>
        <!--<link rel="stylesheet" href="requestdone.css">-->
         <link rel="stylesheet" href="{{ asset('css/eventinfo.css') }}">
    </head>
    

    <body>
<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
<!--        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 400) }}" alt="">-->
<!--    </div>-->
<!--</div>    -->
                
<h1>　{{$event->title}}</h1>

<!--自分の詳細-->
@if (Auth::user()->id == $user->id)

<aside class="col-xs-5">
    <div class="panel panel-default">
        <div class="panel-body" id="image">
            <img class="media-object img-rounded img-responsive" src="/images/{{$icon}}" alt="">
        </div>
    </div>
<br>
<div class="attend">
    <h3>参加中のメンバー</h3>
    <div class="panel-body" id="content">
        @foreach ($attendees as $attendee)
        <a href = "{{route ('usershow.get', $attendee->user->id) }}">
        {{$attendee->user->name}}さん　
        </a>
        @endforeach
    </div>
</div>    
</aside>


<div class = "event">
    <hr class="style1">
        <p>
            <span class="glyphicon glyphicon-user">    
                <a href = "{{route ('usershow.get', $user->id) }}">
                あなた
                </a>
            </span>
        </p> 
<p><span class="glyphicon glyphicon-time">　{{$event->date}}</p>
<p><span class="glyphicon glyphicon-map-marker">　{{$event->place}}</p>
<p><span class="glyphicon glyphicon-piggy-bank">　{{$event->point}}pt</p>
</div>
    
<aside class="col-xs-7">
<hr class="style1">
    <h3>詳細</h3>
    <div class="panel-body" id="content">
        <p>{{$event->content}}</p>
    </div>
<hr class="style1">
</aside>

<!--終了している-->
@elseif ($event->status == 'done')

<aside class="col-xs-5">
<div class="panel panel-default">
    <div class="panel-body" id="image">
        <img class="media-object img-rounded img-responsive" src="/images/{{$icon}}" alt="">
    </div>

<div class ="warning">
    <p>このイベントの募集は終了しています。</p>
</div>

</div>

<br>
<div class="attend">
    <h3>参加中のメンバー</h3>
    <div class="panel-body" id="content">
        @foreach ($attendees as $attendee)
        <a href = "{{route ('usershow.get', $attendee->user->id) }}">
        {{$attendee->user->name}}さん　
        </a>
        @endforeach
    </div>
</div>
</aside>

<div class = "event">
    <hr class="style1">
<p>
    <span class="glyphicon glyphicon-user">    
        <a href = "{{route ('usershow.get', $user->id) }}">
        {{$user->name}}さん
        </a>
    </span>
</p> 
<p><span class="glyphicon glyphicon-time">　{{$event->date}}</p>
<p><span class="glyphicon glyphicon-map-marker">　{{$event->place}}</p>
<p><span class="glyphicon glyphicon-piggy-bank">　{{$event->point}}pt</p>
</div>

<aside class="col-xs-7">
    <hr class="style1">
        <h3>詳細</h3>
        <div class="panel-body" id="content2">
        <p>{{$event->content}}</p>
        </div>
    <hr class="style1">
    </aside>

<!--リクエスト済み-->
@elseif (Auth::user()->request_check($event))

<aside class="col-xs-5">
<div class="panel panel-default">
    <div class="panel-body" id="image">
        <img class="media-object img-rounded img-responsive" src="/images/{{$icon}}" alt="">
    </div>

<div class ="warning">
    <p>参加済みです。</p>
</div>

</div>

<br>
<div class="attend">
    <h3>参加中のメンバー</h3>
    <div class="panel-body" id="content">
        @foreach ($attendees as $attendee)
        <a href = "{{route ('usershow.get', $attendee->user->id) }}">
        {{$attendee->user->name}}さん　
        </a>
        @endforeach
    </div>
</div>
</aside>

<div class = "event">
    <hr class="style1">
<p>
    <span class="glyphicon glyphicon-user">    
        <a href = "{{route ('usershow.get', $user->id) }}">
        {{$user->name}}さん
        </a>
    </span>
</p>    
<p><span class="glyphicon glyphicon-time">　{{$event->date}}</p>
<p><span class="glyphicon glyphicon-map-marker">　{{$event->place}}</p>
<p><span class="glyphicon glyphicon-piggy-bank">　{{$event->point}}pt</p>
</div>

<aside class="col-xs-7">
    <hr class="style1">
        <h3>詳細</h3>
        <div class="panel-body" id="content2">
        <p>{{$event->content}}</p>
        </div>
    <hr class="style1">
    </aside>

<!--そのほか    -->
@else

 <aside class="col-xs-5">
<div class="panel panel-default">
    <div class="panel-body" id="image">
        <img class="media-object img-rounded img-responsive" src="/images/{{$icon}}" alt="">
    </div>
    
    @if ($negative_or_positive)
    <a href = "{{route ('requestdone.get', $event->id)}}" class="btn btn-primary">参加をリクエスト</a>
    @else
    <div class="warning">
    <p>必要なポイント数　{{$event->point}}ポイント</p>
    </div>
    @endif
</div>

<br>
<div class="attend">
    <h3>参加中のメンバー</h3>
    <div class="panel-body" id="content">
        @foreach ($attendees as $attendee)
        <a href = "{{route ('usershow.get', $attendee->user->id) }}">
        {{$attendee->user->name}}さん　
        </a>
        @endforeach
    </div>
</div>
</aside>

<div class = "event">
    <hr class="style1">
        <p>
            <span class="glyphicon glyphicon-user">    
                <a href = "{{route ('usershow.get', $user->id) }}">
                {{$user->name}}さん
                </a>
            </span>
        </p> 
<p><span class="glyphicon glyphicon-time">　{{$event->date}}</p>
<p><span class="glyphicon glyphicon-map-marker">　{{$event->place}}</p>
<p><span class="glyphicon glyphicon-piggy-bank">　{{$event->point}}pt</p>
</div>


<aside class="col-xs-7">
    <hr class="style1">
        <h3>詳細</h3>
        <div class="panel-body" id="content2">
        <p>{{$event->content}}</p>
        </div>
    <hr class="style1">
</aside>
        
@endif
   
</body>
@endsection