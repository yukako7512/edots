@extends('layouts.app')
@section('content')

<h1>Create your Event</h1>

    {!! Form::model($item,['route' => 'post.post']) !!}
    <!--<div class="form-group">-->
    <!--    {!! Form::label('user_id', 'UserID:') !!}-->
    <!--    {!! Form::text('user_id') !!}-->
    <!--</div>-->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title') !!}
    </div>
    <div class="form-group">
    {!! Form::label('category', 'Category:') !!}    
    {!! Form::select('category', ['Sports'=>'Sports', 'Arts'=>'Arts', 'Beauty'=>'Beauty','Nature'=>'Nature','Food'=>'Food','Technology'=>'Technology','Language'=>'Language','Others'=>'Others']) !!} 
    <!--{!! Form::text('category') !!}-->
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::text('content') !!}
    </div>
    <div class="form-group">    
        {!! Form::label('date', 'Date:') !!}
        {!! Form::text('date') !!}
    </div>
    <div class="form-group">    
        {!! Form::label('place', 'Place:') !!}
        {!! Form::text('place') !!}
    </div>
    <div class="form-group">    
        {!! Form::label('point', 'Point:') !!}
        {!! Form::text('point') !!}
    </div>   
    <div class="form-group">
        {!! Form::submit('Create') !!}
    </div>
    {!! Form::close() !!}
    
@endsection