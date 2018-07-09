@extends('layouts.app')
@section('content')

<h1>You have created a new event successfully!!!</h1>

<!--<a href='#'>Back to current category</a>-->

<a href = "{{route ('index.get') }}" class="btn btn-default">Back to Categories</a>


@endsection