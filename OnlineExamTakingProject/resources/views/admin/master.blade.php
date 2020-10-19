<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Online Exam | </title>

    <!-- Bootstrap -->
    <link href="{{url('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('public/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public/css/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('public/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('public/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('public/css/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public/css/custom.min.css')}}" rel="stylesheet">

    @yield('style')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('/admin')}}" class="site_title"><i class="fa fa-paw"></i> <span>Admin Dashboard</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('public/images/img.jpg')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />


                @include('admin.sidebarMenu')


            </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('public/images/img.jpg')}}" alt=""> {{\Illuminate\Support\Facades\Auth::user()->name}}
                            </a>

                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="{{url('admin/profile')}}"> Profile</a>
                                <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out pull-right"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->



        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12">
                    <?php $ses_msg = Session::has('success'); ?>
                    @if (!empty($ses_msg))
                        <div class="alert alert-success alert-dismissable" style="width:100%">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <p><i class="fa fa-bell-o fa-fw"></i> <?php echo Session::get('success'); ?></p>
                        </div>
                    @endif
                    <?php $ses_msg = Session::has('error'); ?>
                    @if (!empty($ses_msg))
                        <div class="alert alert-danger alert-dismissable" style="width:100%">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <p><i class="fa fa-bell-o fa-fw"></i> <?php echo Session::get('error'); ?></p>
                        </div>
                    @endif
                </div>
            </div>

            @yield('mainContent')
        </div>
        <!-- /page content -->



        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Online Exam Authority || <a href="#">OEA</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('public/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/js/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('public/js/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('public/js/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('public/js/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('public/js/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('public/js/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset('public/js/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('public/js/jquery.flot.js')}}"></script>
<script src="{{asset('public/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('public/js/jquery.flot.time.js')}}"></script>
<script src="{{asset('public/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('public/js/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('public/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('public/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('public/js/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('public/js/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/js/jquery.vmap.j')}}s"></script>
<script src="{{asset('public/js/jquery.vmap.world.js')}}"></script>
<script src="{{asset('public/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('public/js/moment.min.js')}}"></script>
<script src="{{asset('public/js/daterangepicker.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('public/js/custom.min.js')}}"></script>

@yield('js')

</body>
</html>
