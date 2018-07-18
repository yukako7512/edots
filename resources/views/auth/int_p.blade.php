@extends('layouts.app')
@section('cover')

<p>ご登録ありがとうございます。</p>
<p>1000ptをGET!</p>

@if($exist_or_not)
<a>得ている</a>
@else
<a href="{{route('firstindex.get')}}">
    <p>得る</p>
<a>
@endif
@endsection