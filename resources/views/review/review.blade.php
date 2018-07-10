@extends('layouts.app')
@section('content')


    
    
    {!! Form::model($reviews,['route' => 'review.post']) !!}
    
    <p>Please rate this event:</p>
    <div class="form-group">
    {!! Form::label('rating', 'Rating:') !!}    
    {!! Form::select('rating', ['1'=>'★', '2'=>'★★', '3'=>'★★★','4'=>'★★★★','5'=>'★★★★★']) !!} 
    </div>
    
    <p>Please make comment about this event:</p>
    <div class="form-group">
    <!--{!! Form::label('comment', '') !!}-->
    {!! Form::textarea('comment') !!}
    </div>
    
    
    
    <!--1 2 3 4 5-->
    
    

    
    
    <a href = "{{route ('reviewdone.get')}}">
    <p>Submit</p>
</a>

@endsection