@extends('layouts.app')
@section('content')

@if (Auth::user()->id == $user->id)
<a href = "{{route ('reviewhistory.get', $user->id) }}">
    <p>{{$review_round}}</p>
</a>    
<p>{{$stars}}</p>

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

<a href = "{{route ('arrangedone.get', $arranging_event->id) }}">
    <p>arrange完了</p>
</a> 

<p>----------------------------</p>
@endforeach

<p>------joining events------</p>
@foreach($joining_events as $joining_event)
<p>{{$joining_event->title}}</p>
<p>{{$joining_event->date}}</p>
<a href = "{{route ('review.get', $joining_event->id) }}">
    <p>完了</p>
</a> 
<p>----------------------------</p>
@endforeach

<p>------History------</p>
@foreach($history_events as $history_event)
<p>{{$history_event->title}}</p>
<p>{{$history_event->date}}</p>
<p>----------------------------</p>
@endforeach



 
@else
<p>{{$review_round}}{{$stars}}</p>

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

<p>------History------</p>
@foreach($history_events as $history_event)
<p>{{$history_event->title}}</p>
<p>{{$history_event->date}}</p>
<p>----------------------------</p>
@endforeach


@endif
@endsection