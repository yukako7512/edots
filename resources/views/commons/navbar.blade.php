<header>
    
     <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    
                </button>
               <a href="{{route('index.get')}}"><img src="{{ secure_asset("images/whitelogoxxxs.png") }}" alt="Share"></a>
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
</header>
