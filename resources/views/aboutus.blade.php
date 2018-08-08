<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Progate</title>
    <link rel="stylesheet" href="{{ asset('aboutus/aboutus.css') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
    
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

    

  </head>
  <body>
       <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    
                </button>
                <a href="{{route('index.get')}}"><img src="{{ asset("images/whitelogoxxxs.png") }}" alt="Share"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li><a>{{$points}}pt</a></li>
                        <li>
                            <a href="{{ route('post.get') }}">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Post
                             </a>
                        </li>
                    
                        <li><a href="{{ route('usershow.get', Auth::user()->id) }}">My Page</a></li>
                        <li><a href="{{ route('logout.get') }}">Log out</a></li>
                    @else
                        <li><a href="{{ route('aboutus.get') }}">About Us</a></li>   
                        <li><a href="{{ route('signup.get') }}">Sign Up</a></li>
                        <li><a href="{{ route('login') }}">Log in</a></li>
                        
                    @endif
                </ul>
                    @if (Auth::check())
                <div class="collapse navbar-collapse" id="navbarEexample">
			       <ul class="nav navbar-nav navbar-right">
				      <li class="dropdown active">
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">通知 
					@if($notification['unread_count'])
					   {{$notification['unread_count']}}
					@endif<span class="caret"></span></a>
					
					@if($notification['unread_count'])   
				    <ul class="dropdown-menu" role="menu">
				    @foreach($notification['unread_events'] as $unread_event)
						<li>{{$unread_event->name}}さんが{{$unread_event->title}}にリクエストしました。</li>
						<li class = 'divider'></li>
				    @endforeach
				            <a class="btn btn-default btn-xs" href="{{route('notification.read')}}" role="button">OK</a>
				    @endif
				    </ul>
				   </ul>
				</div>
				    @endif
            </div>
        </div>
    </nav>
    
    <div class="top-wrapper">
      <!--<div class="container">-->
        <!--<h1>WELCOME TO LINKDOTS.</h1>-->
        <h1>ようこそ、ここは</h1>
        <h1>二子玉のスクランブル交差点<span>.</span></h1>
        <!--</div>-->
      </div>
   
    <div class="lesson-wrapper">
      <!--<div class="container">-->
        <div class="heading">
          <h2>OUR MISSION</h2>
          <hr>
        </div>
         <p>同期の中にはいろんな才能や経験を持つ人がいる。</p>
         <p>その「存在」に、近くにある「学びの可能性」に、気づいてるのに一歩を踏み出せない。そんな密かな悩みを解決したい。</p>
         <p>そんな思いから、みんなが学べる・発見できる場所をつくりました。</p>
         <p>誰かの才能を、そして何より、あなたの才能を。ここで見つけてみませんか。</p>
        </div>
      </div>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="team-wrapper">
    <!--<div class='container'>-->
      <div class="heading">
          <h2>　OUR TEAM <a href="http://yamino-nicknamemaker.herokuapp.com"><img src="{{ asset('images/dragonicon.png') }}" alt=''></a></h2> 
          <hr>
          
          <div class="card">
  <!--<img src="{{ asset('aboutus/jay.jpg') }}" alt="John" style="width:100%">-->
  <h2>Saki Ishihara</h2>
  <p>石原咲希</p>
  
</div>
<div class="card">
  <!--<img src="{{ asset('aboutus/jay.jpg') }}" alt="John" style="width:100%">-->
  <h2>Takashi One</h2>
  <p>大根崇志</p>
  
</div>
<div class="card">
  <!--<img src=src="{{ asset('aboutus/jay.jpg') }}" alt="John" style="width:100%">-->
  <h2>Aki Sakurada</h2>
  <p>櫻田明希</p>
 
</div>
<div class="card">
  <!--<img src=src="{{ asset('aboutus/jay.jpg') }}" alt="John" style="width:100%">-->
  <h2>Kanai Daisuke</h2>
  <p>金井大輔</p>
 
</div>
<div class="card">
  <!--<img src=src="{{ asset('aboutus/jay.jpg') }}" alt="John" style="width:100%">-->
  <h2>Yukako Steph</h2>
  <p>西山由佳子</p>
 
</div>
<div class="card">
  <!--<img src=src="{{ asset('aboutus/jay.jpg') }}" alt="John" style="width:100%">-->
  <h2>Edward Cao</h2>
  <p>曹亦可</p>
 
</div>

  </div>
  </div>
</div>
    
   
    </div>
  </body>
</html>