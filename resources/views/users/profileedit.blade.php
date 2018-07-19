<!DOCTYPE html>
<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ secure_asset('myprofile/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ secure_asset('myprofile/css/resume.min.css') }}" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ secure_asset('myprofile/img/akiaki.jpg') }}" alt="">
        </span>
       
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            
   
            
          </li>
          <li class="nav-item">
            <br>
            
         

            
            
            
  </li>
          
        </ul>
      </div>
    </nav>

      <section class=" p-100 p-lg-5\ 
      " id="about">
        <div class="my-auto">
          <br>
          <br>
          <br>
         
          <br>
          <br>
          <br>
          <br>
          <h2 class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;EDIT YOUR INTRODUCTION&nbsp;
          </h2>
         
    {!! Form::open(['url' => 'editdone/'.$id])!!}
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;マイプロフィールの編集はこちらから</p>
    <div class="form-group">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! Form::textarea('introduction') !!}
    </div>
    
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
    
    <a href="{{route ('user.get') }}" class="square_btn">マイページに戻る</a>
          
          <br>
          <br>
          <br>
          <br>
          
        </div>
      </section>




        </div>

      </section>

     

  </body>

</html>
