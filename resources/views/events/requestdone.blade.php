@extends('layouts.app')
@section('content')

      <br><br>
    <div align="center"><h1>リクエストを送信しました</h1></div><br>
   <div align="center"> <p>お客様のリクエストを受け付けました。</p></div>
    <div align="center"><p>確認次第、お知らせいたします。もうしばらくお待ちください。</p></div>
  </body>
  
   <div align="center">
       <a href="{{route('index.get')}}">
  <p>My page</p>
  </a>
  <a href="{{route('index.get')}}">
  <p>Homeに戻る</p>
  </a>
   </div>

@endsection