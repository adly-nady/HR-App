<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"/> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('css')
    {{-- Alirt Extintions --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- CSS only -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">@yield('Contact')</a>
                </li>
            </ul>
            {{-- Search Here --}}
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ url('dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item ">
                    <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        تسجيل خروج</a>

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
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('Dashboard') }}" class="brand-link text-center">
                {{-- <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light"> HR System</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        {{-- Users App : Title 0 --}}
                        <li class="nav-item section1">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                    المستخدمين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Users.View') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>إدارة المستخدمين</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Atte-machine-config : Title 1 --}}
                        <li class="nav-item section2">
                            <a href="#" class="nav-link">
                                <i class="fa fa-podcast" aria-hidden="true"></i>
                                <p>
                                    جهاز الحضور
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Machine_config.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>تعريفات الجهاز</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Atte-Setting : Title 2 --}}
                        <li class="nav-item section3">
                            <a href="#" class="nav-link">
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <p>
                                    الورديات
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Shift.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>مواعيد الورديات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Employees : Title 3 --}}
                        <li class="nav-item section4">
                            <a href="#" class="nav-link">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <p>
                                    الموظفين
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Employee_view') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>أضافة موظف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('All_Employee') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>كل الموظفين</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الاقسام & المؤهلات</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('department_view') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>الاقسام</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('qualifications_view') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p> المؤهلات </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        {{-- Attendance : Title 4 --}}
                        <li class="nav-item section5">
                            <a href="#" class="nav-link">
                                <i class="fa fa-id-badge" aria-hidden="true"></i>
                                <p>
                                    الحضور و الانصراف
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Attendance_view') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>اعدادات الحضور و الانصراف</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('display_Days_Off_Statement') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الاجازات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('display_Work_Outside_Statement') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>المأموريات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Salaries : Title 5 --}}
                        <li class="nav-item section6">
                            <a href="#" class="nav-link">
                                <i class="fa fa-university" aria-hidden="true"></i>
                                <p>
                                    الرواتب
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Employees_Salaries_view') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>رواتب الموظفين</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Salary_Deduction_Reward_View') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> المكافآت والجزاءات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Salary_Borrow_View') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>السلف الشهرية</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Main Gate : Title 6 --}}
                        <li class="nav-item section7">
                            <a href="#" class="nav-link">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                <p>
                                    بواية الامن
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('GateWay.View') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>  تصاريح البوابة </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                <hr>
                <div class="container text-center" style="color: white">
                    <span id="hours">00</span>
                    <span>:</span>
                    <span id="minutes">00</span>
                    <span>:</span>
                    <span id="seconds">00</span>
                    <span id="session">AM</span>
                </div>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="https://adminlte.io">HR System</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-rc
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- Timer -->
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
            if ((hrs == 2 && min == 27 && sec == 10) || (hrs == 2 && min == 27 && sec == 20)) {
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

    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('dist/js/pages/dashboard.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    @if (Auth::user()->access_id == 2)
        <script>
            $(".section1").css("display", "none");
            $(".section2").css("display", "none");
            $(".section3").css("display", "none");
            $(".section4").css("display", "none");
            $(".section5").css("display", "block"); // access
            $(".section6").css("display", "none");
            $(".section7").css("display", "none");
        </script>
    @endif

    @if (Auth::user()->access_id == 3)
        <script>
            $(".section1").css("display", "none");
            $(".section2").css("display", "none");
            $(".section3").css("display", "none");
            $(".section4").css("display", "none");
            $(".section5").css("display", "none"); // access
            $(".section6").css("display", "none");
            $(".section7").css("display", "block");
        </script>
    @endif

    @yield('js')
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>
