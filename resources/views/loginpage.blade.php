<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.homecss')
    <style>
        .header_section {
            position: relative;
            background-image: url('/images/blog-mobile-bg.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header_section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .header_main {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .header_main h1 {
            color: #fff;
            font-size: 36px;
            margin-bottom: 50px;
        }

        .header_main .menu_main {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px; 
        }

        .header_main .menu_main a {
            font-size: 24px;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            padding: 15px 30px;
            border: 2px solid #fff;
            border-radius: 5px;
            text-decoration: none;
            background-color: transparent;
            width: 100%;
            max-width: 250px;
            display: block;
            text-align: center;
        }

        .header_main .menu_main a:hover {
            background-color: #fff;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="header_section">
        <div class="header_main">
            <h1>Blog Website</h1>
            <div class="menu_main">
                @if (Route::has('login'))
                @auth
                <x-app-layout></x-app-layout>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @endauth
                @endif
            </div>
        </div>
    </div>
</body>

</html>
