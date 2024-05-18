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
                    <li class="nav-item">
                        <form class="search-form" method="GET" action="{{ route('product.search') }}">
                            <input type="text" name="query" id="search-input" class="search-input" placeholder="Search..." required="">
                            <button class="btn nav_search-btn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                                    <title>Search</title>
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                </svg>
                            </button>
                            <div id="suggestions" class="suggestions"></div>
                        </form>
                    </li>
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
       .search-form {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            position: absolute;
            top: 100%;
            right: 0;
            width: 100%;
            max-height: 0;
            opacity: 0;
            transition: max-height 0.4s ease, opacity 0.4s ease, padding 0.4s ease;
            padding: 0 10px;
            border: 1px solid #d10f0f;
            border-radius: 5px;
            background-color: #ffffff;
            color: #000000;
            outline: none;
            z-index: 10;
        }

        .search-input:focus {
            max-height: 40px;
            opacity: 1;
            width: 200px;
            padding: 5px 10px;
        }

        .nav_search-btn {
            background: none;
            border: none;
            color: inherit;
            padding: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .ionicon {
            width: 24px;
            height: 24px;
        }

        .form-inline {
            display: flex;
            align-items: center;
        }

        .nav-item {
            list-style: none;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .suggestions {
            position: absolute;
            top: 40px;
            left: 0;
            width: 200%;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 10;
            display: none;
        }

        .suggestions a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .suggestions a:hover {
            background-color: #f0f0f0;
        }
    </style>
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle input focus
        $('.nav_search-btn').on('click', function() {
            $('#search-input').focus();
        });

        // Handle input for suggestions
        $('#search-input').on('input', function() {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: '{{ route("product.search") }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        var suggestions = $('#suggestions');
                        suggestions.empty();
                        if (data.length > 0) {
                            data.forEach(function(product) {
                                suggestions.append('<a href="/product/' + product.id + '">' + product.title + '</a>');
                            });
                            suggestions.show();
                        } else {
                            suggestions.hide();
                        }
                    }
                });
            } else {
                $('#suggestions').hide();
            }
        });

        // Hide suggestions on clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('.search-form').length) {
                $('#suggestions').hide();
            }
        });
    });
</script>
