@extends('layouts.app')
@section('content')

<h1>レビュー完了しました</h1>
<a href = "{{route ('usershow.get', $user->id) }}">
    <p>Back to My page</p>
</a>

 

@endsection