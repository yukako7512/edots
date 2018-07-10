@extends('layouts.app')
@section('content')

    {!! Form::model($introduction,['route' => 'profileedit.post']) !!}
    <p>Please edit your profile:</p>
    <div class="form-group">
    {!! Form::textarea('introduction') !!}
    </div>
    
    <a href = "{{route ('user.get')}}">
    <p>Submit</p>
    </a>

@endsection