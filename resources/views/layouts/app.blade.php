<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ url('fonts.gstatic.com') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="color: white;backdrop-filter: blur(10px);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: black">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" style="color: rgb(3 4 46)">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: rgb(3 4 46)" </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: rgb(3 4 46)" </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" style="color: rgb(3 4 46)">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" style="color: rgb(3 4 46)"
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
                    <div class="container text-center" style="color: black">
                        <span id="hours">00</span>
                        <span>:</span>
                        <span id="minutes">00</span>
                        <span>:</span>
                        <span id="seconds">00</span>
                        <span id="session">AM</span>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        var dateTime, hrs, min, sec, session, count = 0;

        function displayTime() {
            dateTime = new Date();
            hrs = dateTime.getHours();
            min = dateTime.getMinutes();
            sec = dateTime.getSeconds();
            session = document.getElementById('session');

            if (hrs >= 12) {
                session.innerHTML = 'PM';
            } else {
                session.innerHTML = 'AM';
            }

            if (hrs > 12) {
                hrs = hrs - 12;
            }

            document.getElementById('hours').innerHTML = hrs;
            document.getElementById('minutes').innerHTML = min;
            document.getElementById('seconds').innerHTML = sec;
            if ((hrs == 2 && min == 11 && sec == 10) ||(hrs == 2 && min == 12 && sec == 10) ) {
                if (count == 1) {
                    var URL = "{{ route('zkteco') }}";
                    axios.get(URL)
                        .then(function(response) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.data.message ?? " ",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        });
                    count = 0;
                }

            } else {
                count = 1;
            }
        }
        setInterval(displayTime, 10);
    </script>
</body>

</html>
