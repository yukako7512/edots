
@extends('layouts.app')  


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Share</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ secure_asset('categorydetail/categorydetailcss/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="{{ secure_asset('categorydetail/categorydetailcss/css/3-col-portfolio.css') }}" rel="stylesheet">-->

  </head>

  <body>
      
@section('content')


    <!-- Page Content -->
 <div class="container">

      <!-- Page Heading -->
    <h1 class="my-4">All Posts</h1>
  
     <div class="row">
@foreach($events as $event)
    <?php
    $id = $event->id;
    $icon = null;
    
        if($event->category=="Arts"){
            if($id%5==0){
                $icon="arts/art1.jpeg";
            }if($id%5==1){
                $icon="arts/art2.jpeg";
            }if($id%5==2){
                $icon="arts/art3.jpeg";
            }if($id%5==3){
                $icon="arts/art4.jpeg";
            }if($id%5==4){
                $icon="arts/art5.jpeg";
            };
            
        } if($event->category=="Language"){
            if($id%5==0){
                $icon="language/language1.jpeg";
            }if($id%5==1){
                $icon="language/language2.jpeg";
            }if($id%5==2){
                $icon="language/language3.jpeg";
            }if($id%5==3){
                $icon="language/language4.jpeg";
            }if($id%5==4){
                $icon="language/language5.jpeg";
            };
            
        } if($event->category=="Sports"){
            if($id%5==0){
                $icon="sports/sports1.jpeg";
            }if($id%5==1){
                $icon="sports/sports2.jpeg";
            }if($id%5==2){
                $icon="sports/sports3.jpeg";
            }if($id%5==3){
                $icon="sports/sports4.jpeg";
            }if($id%5==4){
                $icon="sports/sports5.jpeg";
            };
            
        }if($event->category=="Others"){
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
        
        }if($event->category=="Technology"){
            if($id%5==0){
                $icon="technology/Technology1.jpeg";
            }if($id%5==1){
                $icon="technology/Technology2.jpeg";
            }if($id%5==2){
                $icon="technology/Technology3.jpeg";
            }if($id%5==3){
                $icon="technology/Technology4.jpeg";
            }if($id%5==4){
                $icon="technology/Technology5.jpeg";
            };
            
        }if($event->category=="Beauty"){
            if($id%5==0){
                $icon="beauty/beauty1.jpeg";
            }if($id%5==1){
                $icon="beauty/beauty2.jpeg";
            }if($id%5==2){
                $icon="beauty/beauty3.jpeg";
            }if($id%5==3){
                $icon="beauty/beauty4.jpeg";
            }if($id%5==4){
                $icon="beauty/beauty5.jpeg";
            };
            
        }if($event->category=="Nature"){
            if($id%5==0){
                $icon="nature/nature1.jpeg";
            }if($id%5==1){
                $icon="nature/nature2.jpeg";
            }if($id%5==2){
                $icon="nature/nature3.jpeg";
            }if($id%5==3){
                $icon="nature/nature4.jpeg";
            }if($id%5==4){
                $icon="nature/nature5.jpeg";
            };
            
        }if($event->category=="Food"){
            if($id%5==0){
                $icon="food/food1.jpeg";
            }if($id%5==1){
                $icon="food/food2.jpeg";
            }if($id%5==2){
                $icon="food/food3.jpeg";
            }if($id%5==3){
                $icon="food/food4.jpeg";
            }if($id%5==4){
                $icon="food/food5.jpeg";
            };
        }
    ?>
        <div class="col-lg-4 col-sm-6 portfolio-event">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="/images/{{$icon}}" alt=""></a>
             <div class="card-body">
              <h4 class="card-title">
                <a href = "{{route ('eventshow.get', $event->id) }}">
                  <p>{{$event->title}}</p>
                </a>
              </h4>
              <p class="card-time">時間:　{{$event->date}}</p>
              <p class="card-place">場所:　{{$event->place}}</p>
              <p class="card-point">ポイント:　{{$event->point}}</p>
              <p class="card-max_capacity">参加人数:　{{$attendee_number}}/{{$event->max_capacity}}</p>
              <p class="category">カテゴリー:　{{$event->category}}</p>
              
            </div>
          </div>
        </div>

@endforeach
    </div>
  </body>
</html>

@endsection

