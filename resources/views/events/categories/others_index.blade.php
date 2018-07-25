
@extends('layouts.app')  
@section('content')

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dots.</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ secure_asset('categorydetail/categorydetailcss/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="{{ secure_asset('categorydetail/categorydetailcss/css/3-col-portfolio.css') }}" rel="stylesheet">-->

  </head>

  <body>
      
    


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Others Index.
      </h1>
  
      <div class="row">
          @foreach($events as $event)
<?php
$id = $event->id;
if($id%5==0){
        $icon="others/others1.jpeg";
    }if($id%5==1){
        $icon="others/others2.jpeg";
    }if($id%5==2){
        $icon="others/others3.jpeg";
    }if($id%5==3){
        $icon="others/others4.jpeg";
    }if($id%5==4){
        $icon="others/others5.jpeg";
    };
$attendee_number=\App\UserEvent::where('event_id', $event->id)->count();
?>
        <div class="col-lg-4 col-sm-6 portfolio-event">
          <div class="card h-100">
            <a href="{{route ('eventshow.get', $event->id) }}"><img class="card-img-top" src="/images/{{$icon}}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                   <p>{{$event->title}}</p>
                   </a>
              </h4>
               <p class="card-time">時間:　{{$event->date}}</p>
              <p class="card-place">場所:　{{$event->place}}</p>
              <p class="card-point">ポイント:　{{$event->point}}</p>
              <p class="card-max_capacity">参加人数:　{{$attendee_number}}/{{$event->max_capacity}} <a class="btn btn-info" href = "{{route ('eventshow.get', $event->id) }}">詳細</a></p>
            </div>
          </div>
        </div>
@endforeach
    </div>

  </body>

</html>

@endsection

