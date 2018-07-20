@extends('layouts.app')
@section('content')

@if (Auth::user()->id == $user->id)
<a href = "{{route ('reviewhistory.get', $user->id) }}">
    <p>{{$review_round}}</p>
</a>    
<p>{!!$stars!!}</p>

{{$icon}}
<p>{{$user->name}}</p>
<a href = "{{route ('profileedit.get', $user->id) }}">
    <p>edit</p>
</a>
<p>{{$user->introduction}}</p>
<p>{{$points}}ポイント</p>

<p>------arranging events------</p>
@foreach($arranging_events as $arranging_event)
<p>{{$arranging_event->title}}</p>
<p>{{$arranging_event->date}}</p>

<a href = "{{route ('arrangedone.get', [$arranging_event->id,  $user->id]) }}">
    <p>arrange完了</p>
</a> 

<p>----------------------------</p>
@endforeach

<p>------joining events------</p>
@foreach($joining_events as $joining_event)
<p>{{$joining_event->title}}</p>
<p>{{$joining_event->date}}</p>
{{$joining_event->id}}

<a href = "{{route ('review.get', [$joining_event->id, $user->id]) }}">
    <p>完了</p>
</a> 
<p>----------------------------</p>
@endforeach

<p>------Arranged Events History------</p>
@foreach($arrnged_histories as $arrnged_history)
<p>{{$arrnged_history->title}}</p>
<p>{{$arrnged_history->date}}</p>
<p>----------------------------</p>
@endforeach

<p>------Joined Events History------</p>
@foreach($joined_histories as $joined_history)
<p>{{$joined_history->title}}</p>
<p>{{$joined_history->date}}</p>
<p>----------------------------</p>
@endforeach



 
@else
<a href = "{{route ('reviewhistory.get', $user->id) }}">
    <p>{{$review_round}}</p>
</a>
<p>{!!$stars!!}</p>

{{$icon}}
<p>{{$user->name}}</p>
<p>{{$user->introduction}}</p>
<p>{{$points}}ポイント</p>

<p>------arranging events------</p>
@foreach($arranging_events as $arranging_event)
<p>{{$arranging_event->title}}</p>
<p>{{$arranging_event->date}}</p>
<p>----------------------------</p>
@endforeach

<p>------joining events------</p>
@foreach($joining_events as $joining_event)
<p>{{$joining_event->title}}</p>
<p>{{$joining_event->date}}</p>
<p>----------------------------</p>
@endforeach

<p>------Arranged Events History------</p>
@foreach($arrnged_histories as $arrnged_history)
<p>{{$arrnged_history->title}}</p>
<p>{{$arrnged_history->date}}</p>
<p>----------------------------</p>
@endforeach

<p>------Joined Events History------</p>
@foreach($joined_histories as $joined_history)
<p>{{$joined_history->title}}</p>
<p>{{$joined_history->date}}</p>
<p>----------------------------</p>
@endforeach


@endif
@endsection