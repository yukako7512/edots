@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>イベント詳細</title>
        <!--<link rel="stylesheet" href="requestdone.css">-->
         <link rel="stylesheet" href="{{ secure_asset('css/eventinfo.css') }}">
    </head>
    

    <body>
<!--<div class="panel panel-default">-->
<!--    <div class="panel-body">-->
<!--        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 400) }}" alt="">-->
<!--    </div>-->
<!--</div>    -->
                
<h1>　{{$event->title}}</h1>

@if (Auth::user()->id == $user->id)

 <aside class="col-xs-5">
<div class="panel panel-default">
    <div class="panel-body" id="image">
        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
    </div>
    
</div>
</aside>


    <div class = "event">
        <a href = "{{route ('usershow.get', $user->id) }}">
            <p>お前</p>
        </a>
        
    <p>日時　{{$event->date}}</p> 
    <p>場所　{{$event->place}}</p> 
    <p>必要なポイント数　{{$event->point}}ポイント</p> 
    </div>
    
    <aside class="col-xs-7">
    <hr class="style1">
        <h3>詳細</h3>
        <div class="panel-body" id="content">
        <p>{{$event->content}}</p>
        </div>
    <hr class="style1">
    </aside>

@elseif (Auth::user()->request_check($event))

<aside class="col-xs-5">
<div class="panel panel-default">
    <div class="panel-body" id="image">
        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
    </div>

<div class ="warning">
    <p>リクエスト済みです。</p>
</div>

</div>
</aside>

<div class = "event">
<a href = "{{route ('usershow.get', $user->id) }}">
    <p>{{$user->name}}さん</p>
</a>
<p>日時　{{$event->date}}</p> 
<p>場所　{{$event->place}}</p> 
<p>必要なポイント数　{{$event->point}}ポイント</p>
</div>

<aside class="col-xs-7">
    <hr class="style1">
        <h3>詳細</h3>
        <div class="panel-body" id="content2">
        <p>{{$event->content}}</p>
        </div>
    <hr class="style1">
    </aside>

    
@else

 <aside class="col-xs-5">
<div class="panel panel-default">
    <div class="panel-body" id="image">
        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->personal_id, 500) }}" alt="">
    </div>
    
    @if ($negative_or_positive)
    <a href = "{{route ('requestdone.get', $event->id)}}" class="square_btn">参加をリクエスト</a>
    @else
    <div class="warning">
    <p>ポイントが足りないよ～ｗｗｗｗｗｗｗｗｗ</p>
    </div>
    @endif
</div>
</aside>

<div class = "event">
    <hr class="style1">
    <a href = "{{route ('usershow.get', $user->id) }}">
        <p>{{$user->name}}さん</p>
    </a>
    <p>日時　{{$event->date}}</p> 
    <p>場所　{{$event->place}}</p> 
    <p>必要なポイント数　{{$event->point}}ポイント</p>
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