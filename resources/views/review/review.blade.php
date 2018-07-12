@extends('layouts.app')
@section('content')

    {!! Form::open(['url' => 'reviewdone/'.$id])!!}
    <p>Please rate this event:</p>
    <div class="form-group">
    {!! Form::label('rating', 'Rating:') !!}    
    {!! Form::select('rating', ['1'=>'★', '2'=>'★★', '3'=>'★★★','4'=>'★★★★','5'=>'★★★★★']) !!} 
    </div>
    
    <p>Please make a comment about this event:</p>
    <div class="form-group">
    <!--{!! Form::label('comment', '') !!}-->・
    {!! Form::textarea('comment') !!}
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}   
    
    
    <!--1 2 3 4 5-->
    
@endsection