<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/"><img width="250" height="60px" src="images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('shop')}}">Shop</a>
                    </li>
                    <li class="nav-item {{ Request::is('about_us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('about_us')}}">About Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact_us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('contact_us')}}">Contact Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('show_cart') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('show_cart') }}">Cart</a>
                    </li>
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li class="text-center">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-danger btn btn-block" type="submit">Logout</button>
                                </form>
                            </li>
                            <li class="text-center"><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                            <li class="text-center"><a class="dropdown-item" href="{{ url('my_orders') }}">Orders</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item mx-2">
                        <a class="btn btn-primary " href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <style>
        /* .navbar{
            box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
            border-bottom: 1px solid rgba(0, 0, 0, 0.37);
        } */
    </style>
</header>
