@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
            <title>Dots.</title>
        <link rel="stylesheet" href="review_history.css">
    </head>

<body>
    <div class="row">
    <div class="col-xs-10">
       <h2>ポイント履歴</h2>
        @foreach($transactions as $transaction)
        
            
            @if($transaction->event_id==1)
        <div class="panel panel-info">
            <div class="panel-heading">
                {{$transaction->created_at}}
        	</div>
            <div class="panel-body">
                <p>初回登録</p>
                <p>{{$transaction->transactions}}ptを獲得しました！</p>
            </div>   
        </div>    
            @elseif($transaction->transactions > 0)
        <div class="panel panel-info">
            <div class="panel-heading">
                {{$transaction->created_at}}
        	</div>
            <div class="panel-body">
                <p>1名が{{$transaction->event()->value('title')}}を完了。</p>
                <p>{{$transaction->transactions}}ptを獲得しました。</p>
            </div>
        </div>
            @else
        <div class="panel panel-danger">
            <div class="panel-heading">
                {{$transaction->created_at}}
        	</div>
            <div class="panel-body">
                <p>{{$transaction->event()->value('title')}}に参加。</p>
                <p>{{$transaction->transactions*-1}}ptを支払いました。</p>
            </div>
        </div>    
            @endif
        @endforeach  
    
    </div>
    </div>
</body>
@endsection