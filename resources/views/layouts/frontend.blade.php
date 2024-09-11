<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <style>
      .bg-image {
          background-image: url('https://www.lioncarrental.com/images/front-page/background3.jpg');
          background-size: cover; /* Đảm bảo hình nền phủ đầy khu vực */
         
          height: 500px; /* Chiều cao của phần hình nền */
          display: flex;
          align-items: center;
          justify-content: center;
      }
      
      .bg-image .container {
          position: relative;
          z-index: 1; /* Đảm bảo văn bản nằm trên hình nền */
          text-align: center; /* Căn giữa văn bản */
      }
      
      .bg-image h1, .bg-image p {
          margin: 0; /* Loại bỏ margin mặc định để căn chỉnh tốt hơn */
      }
      </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
  <body>
    <div id="app">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
          <a class="navbar-brand" href="{{route('homepage')}}">Tứ Đại Cơm Tấm Store</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{route('homepage')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact</a>
              </li>
            </ul>
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
          </div>
        </div>
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
    <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
    <!-- Core theme JS-->
    
        <script src="{{ asset('frontend/js/scripts.js') }}"></script>
</body>
</html>
