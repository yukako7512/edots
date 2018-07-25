@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/userblade.css" type="text/css">
  </head>
  <body>

@if (Auth::user()->id == $user->id)    
<br><br>

<img src="/images/icons/{{$icon}}" alt="画像"class="sample2"> 

<p class="name">{{$user->name}}</p>
<p class="review">REVIEW&nbsp;&nbsp;{!!$stars!!} 
@if($review_round!=0)
<a href = "{{route('reviewhistory.get', $user->id)}}">
{{$review_round}}
</a>
@endif
</p>

<p class="point">POINT&nbsp;&nbsp;<a href = "{{route ('pointhistory.get') }}">{{$points}}</a></p>

<br><br><br>



<p class="profile">
PROFILE&nbsp;&nbsp;
<a class="btn btn-default" href="{{route ('profileedit.get', $user->id) }}" role="button">EDIT</a></p>
<hr class="style1">

<div class="box1">
    <p>{{$user->introduction}}</p>
</div>
<hr class="style1">
<br>

<div class="tabs">
<input id="join" type="radio" name="tab_item" checked>
<label class="tab_item" for="join">参加イベント</label>

<input id="arrange" type="radio" name="tab_item">
<label class="tab_item" for="arrange">主催イベント</label>

<input id="joinhistory" type="radio" name="tab_item">
<label class="tab_item" for="joinhistory">参加イベント履歴</label>

<input id="arrangehistory" type="radio" name="tab_item">
<label class="tab_item" for="arrangehistory">主催イベント履歴</label>


<div class="tab_content" id="join_content">
<div class="tab_content_description">
<p class="c-txtsp">
 
   
@foreach($joining_events as $joining_event)
 <a href = "{{route ('eventshow.get', $joining_event->id) }}">
<p>{{$joining_event->title}}</p>
</a>
<p>{{$joining_event->date}}</p>
<a href = "{{route ('usershow.get', \App\User::find($joining_event->user_id)->id) }}">
<p>{{\App\User::find($joining_event->user_id)->name}}さん</p>
</a>
<a class="btn btn-default" href = "{{route ('review.get', [$joining_event->id, $user->id]) }}">完了</a> 
<hr>
@endforeach</p>




</div>
</div>

<div class="tab_content" id="arrange_content">
<div class="tab_content_description">
<p class="c-txtsp">

   
   @foreach($arranging_events as $arranging_event)
<a href = "{{route ('eventshow.get', $arranging_event->id) }}">
<p>{{$arranging_event->title}}</p>
</a>
<p>{{$arranging_event->date}}</p>
<a class="btn btn-default" href = "{{route ('arrangedone.get', [$arranging_event->id,  $user->id]) }}" id="event">
    <p>イベントを締め切る</p>
</a> 

<hr>
@endforeach



</p>
</div>
</div>

<div class="tab_content" id="joinhistory_content">
<div class="tab_content_description">
<p class="c-txtsp">
 
 
  @foreach($joined_histories as $joined_history)
<a href = "{{route ('eventshow.get', $joined_history->id) }}">
<p>{{$joined_history->title}}</p>
</a>
<p>{{$joined_history->date}}</p>
<a href = "{{route ('usershow.get', \App\User::find($joined_history->user_id)->id) }}">
<p>{{\App\User::find($joined_history->user_id)->name}}さん</p>
</a>
<hr>
@endforeach


</p>
</div>
</div>

<div class="tab_content" id="arrangehistory_content">
<div class="tab_content_description">
<p class="c-txtsp">


@foreach($arrnged_histories as $arrnged_history)
 
 <a href = "{{route ('eventshow.get', $arrnged_history->id) }}">
<p>{{$arrnged_history->title}}</p>
</a>
<p>{{$arrnged_history->date}}</p>
<hr>
@endforeach


</p>
</div>
</div>


</div>

@else

<br><br>
<img src="/images/icons/{{$icon}}" alt="画像"class="sample2"> 

<p class="name">{{$user->name}}</p>
<p class="review">REVIEW&nbsp;&nbsp;{!!$stars!!} 
@if($review_round!=0)
<a href = "{{route('reviewhistory.get', $user->id)}}">
{{$review_round}}
</a>
@endif

<br><br><br><br><br><br>
<p class="profile">
PROFILE&nbsp;&nbsp;</p>

<hr class="style1">
<div class="box1">
    <p>{{$user->introduction}}</p>
</div>
<hr class="style1">
<br><br>

<div class="tabs">
<input id="join" type="radio" name="tab_item" checked>
<label class="tab_item" for="join">参加イベント</label>

<input id="arrange" type="radio" name="tab_item">
<label class="tab_item" for="arrange">主催イベント</label>

<input id="joinhistory" type="radio" name="tab_item">
<label class="tab_item" for="joinhistory">参加イベント履歴</label>

<input id="arrangehistory" type="radio" name="tab_item">
<label class="tab_item" for="arrangehistory">主催イベント履歴</label>


<div class="tab_content" id="join_content">
<div class="tab_content_description">
<p class="c-txtsp">


@foreach($joining_events as $joining_event)

 <a href = "{{route ('eventshow.get', $joining_event->id) }}">
<p>{{$joining_event->title}}</p>
</a>
<p>{{$joining_event->date}}</p>
<a href = "{{route ('usershow.get', \App\User::find($joining_event->user_id)->id) }}">
<p>{{\App\User::find($joining_event->user_id)->name}}さん</p>
</a>
<hr>
@endforeach</p>

 
</div>
</div>

<div class="tab_content" id="arrange_content">
<div class="tab_content_description">
<p class="c-txtsp">


    @foreach($arranging_events as $arranging_event)
 
<a href = "{{route ('eventshow.get', $arranging_event->id) }}">
<p>{{$arranging_event->title}}</p>
</a>
<p>{{$arranging_event->date}}</p>

<hr>
    @endforeach

 
</p>
</div>
</div>

<div class="tab_content" id="joinhistory_content">
<div class="tab_content_description">
<p class="c-txtsp">
 

  @foreach($joined_histories as $joined_history)
<a href = "{{route ('eventshow.get', $joined_history->id) }}">
<p>{{$joined_history->title}}</p>
</a>
<p>{{$joined_history->date}}</p>
<a href = "{{route ('usershow.get', \App\User::find($joined_history->user_id)->id) }}">
<p>{{\App\User::find($joined_history->user_id)->name}}さん</p>
</a>
<hr>
@endforeach


</p>
</div>
</div>

<div class="tab_content" id="arrangehistory_content">
<div class="tab_content_description">
<p class="c-txtsp">


@foreach($arrnged_histories as $arrnged_history)

<a href = "{{route ('eventshow.get', $arrnged_history->id) }}">
<p>{{$arrnged_history->title}}</p>
</a>
<p>{{$arrnged_history->date}}</p>
<hr>
@endforeach


</p>

</div>


</div>


  </body>

</html>

@endif
@endsection