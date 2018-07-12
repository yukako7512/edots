@extends('layouts.app')
@section('content')

    {!! Form::open(['url' => 'editdone/'.$id])!!}
    <p>Please edit your profile:</p>
    <div class="form-group">
    {!! Form::textarea('introduction') !!}
    </div>
    
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

    

@endsection