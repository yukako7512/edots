<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{route('index.get')}}"><img src="{{ secure_asset("images/logo.png") }}" alt="Share"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('post.get') }}">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Post
                             </a>
                        </li>
                        <li>
                            {{$points}}pt
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('usershow.get', Auth::user()->id) }}">My Page</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout.get') }}">Log out</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('signup.get') }}">Sign Up</a></li>
                        <li><a href="{{ route('login') }}">Log in</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>