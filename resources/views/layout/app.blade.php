<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav>
        <a href="/" class="logo">
            <img src="{{ asset('images/KFC_logo_1.webp') }}" alt="Logo" />
        </a>
           
        @guest
                <!-- Show Login and Register only for guests -->
                <a href="{{ url('login') }}">Login</a>
                <a href="{{ url('register') }}">Register</a>
                <a href="{{ url('/book-table/{table_id}') }}">TableCHECK</a>
                
            @else
                <!-- Show Logout for authenticated users -->
                <a href="{{ url('/order/confirm') }}">All Orders</a>
                
                <a href="{{ url('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
            
        </nav>
    </header>

    <main>
    @yield('contents')
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Restaurant Management System</p>
    </footer>
</body>
</html>
