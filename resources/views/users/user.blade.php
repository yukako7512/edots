@extends('layouts.app')
@section('content')
<a href = "{{route ('profileedit.get')}}">
    <p>edit</p>
</a>
<a href = "{{route ('review.get') }}">
    <p>完了</p>
</a>    
@endsection