<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Car Rental</title>
    <style>
        #wrapper {
            width: 100%;
        }

        #header {
            background-color: #f8f9fa;
            padding: 10px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .navbar-brand:hover {
            color: #0056b3;
        }

        #menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        #menu li {
            margin-right: 20px;
            position: relative;
        }

        #menu li a {
            text-decoration: none;
            font-size: 16px;
            color: #333;
            padding: 8px 15px;
            transition: color 0.3s ease;
        }

        #menu li a:hover {
            color: #0056b3;
        }

        .sub-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
            top: 100%;
            left: 0;
            display: none;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .sub-menu li {
            margin: 0;
        }

        .sub-menu li a {
            display: block;
            padding: 10px 15px;
            white-space: nowrap;
            color: #333;
        }

        .sub-menu li a:hover {
            background-color: #f8f9fa;
            color: #0056b3;
        }

        #menu li:hover>.sub-menu {
            display: block;
        }

        #menu li:nth-child(5) {
            color: #333;
            font-size: 18px;
        }
    </style>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />
</head>

<body>
    <!-- Navigation-->
    <div id="wrapper">
        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="{{ route('homepage') }}">Car Rental</a>
                    <ul id="menu">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Contact</a>
                          </li>
                        <li><a href="">Login</a></li>
                    </ul>
            </nav>
        </div>
        <!-- Header-->
        @yield('content')
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">
                    Your Website 2024
                </p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('frontend/js/scripts.js') }}"></script>
</body>

</html>
