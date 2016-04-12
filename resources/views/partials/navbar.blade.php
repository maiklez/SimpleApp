<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    MAik.rocks
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar 
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>
                -->
                @can('admin', Auth::user())
    			<!-- The Current User Can Update The Post -->

                 <ul class="nav navbar-nav">
                    <li><a href="{{ route('ability.index') }}">Abilities</a></li>
                </ul>
                
                 <ul class="nav navbar-nav">
                    <li><a href="{{ route('user.index') }}">Users</a></li>
                </ul>
				@endcan
				
				@can('blog', Auth::user())
    			<!-- The Current User Can Update The Post -->

                 <ul class="nav navbar-nav">
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                </ul>
				@endcan
				
				
				
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('user.show', Auth::user()->id) }}"><i class="fa fa-btn fa-sign-out"></i>User Info</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>