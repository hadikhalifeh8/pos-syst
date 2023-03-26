<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/moltran/layouts/green-vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Apr 2022 11:29:39 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Chocco Caffee</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
 
        
<!-- DataTable --> 
<link href="{{asset('assets/css/dtb/jquery.dataTables.min.css')}}" rel="stylesheet" media="screen">

 
 <!-- Plugins css-->
        <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>
    

    <body>

    <body>




    

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                   

                    <li class="dropdown notification-list d-none d-md-inline-block">
                        <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                            <i class="mdi mdi-crop-free noti-icon"></i>
                        </a>
                    </li>
                   
                    
    
  

 


   


              
              
       


                


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                        <a href="index.html" class="logo text-center logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="assets/images/logo-sm.png" alt="" height="25">
                            </span>
                        </a>

                        <a href="index.html" class="logo text-center logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="assets/images/logo-sm.png" alt="" height="25">
                            </span>
                        </a>
                    </div>

                <!-- LOGO -->
  

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->
        
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                    <div class="slimscroll-menu">
    
                        <!--- Sidemenu -->
                        <div id="sidebar-menu">
    
                           
    
                            <ul class="metismenu" id="side-menu">
                            @if(Route::has('login'))
       @auth
       @if(Auth::user()->utype ==='ADM')
                  <li class="login-form"> <a href="{{route('register')}}" title="Register">MY Account (Admin)</a></li>
    

                            <!-- <li>
                                    <a href="index.html" class="waves-effect">
                                        <i class="mdi mdi-home"></i>
                                        <span> Dashboard </span>
                                    </a>
                                </li> -->
    
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-email"></i>
                                        <span> Categories </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{route('categories.index')}}">add category</a></li>
                                    </ul>
                                </li>


                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-email"></i>
                                        <span> Items </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{route('items.index')}}">add item</a></li>
                                    </ul>
                                </li>



                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-email"></i>
                                        <span> Orders </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{url('index')}}">View Orders</a></li>
                                    </ul>

                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{url('gettodayorder')}}">today Order</a></li>
                                    </ul>
                                </li>





                                <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-home"></i>Logout</a></li>

                                @elseif(Auth::user()->utype==='usr')
        <li> <a href="javascript: void(0);" class="waves-effect">
       <i class="fa fa-user"></i>
       <span> My Acount: {{Auth::user()->name}}  </span>
                                        <span class="menu-arrow"></span>  
                </a>
               
                <ul class="nav-second-level" aria-expanded="false">
              

                                        

                            
                            <li><a href="{{route('pos.index')}}">POS </a></li>
                            <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        </ul>
                </li>
                @endif

<form id ="logout-form" method="Post" action="{{route('logout')}}" style="display: non">
    @csrf
</form>




@else

   <li class="login-form"> <a href="{{route('login')}}" title="Login">Login</a></li>
@endif

@endif 
                               
                            </ul>
    
                        </div>
                        <!-- End Sidebar -->
    
                        <div class="clearfix"></div>
    
                    </div>
                    <!-- Sidebar -left -->
    
                </div>
                <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
           
            @yield('content')
                </div>
            </div>

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2023 -  &copy; Chocco <a href="#">Caffee </a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
              

            

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            
        </div>
        <!-- END wrapper -->

        


        <!-- Right bar overlay-->
       

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-scrollto/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        
        <!-- Chat app -->
        <script src="{{asset('assets/js/pages/jquery.chat.js')}}"></script>

        <!-- Todo app -->
        <script src="{{asset('assets/js/pages/jquery.todo.js')}}"></script>

        <!-- flot chart -->
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.js')}}"></script>
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.time.js')}}"></script>
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('assets/libs/flot-charts/jquery.flot.crosshair.js')}}"></script>

        <!-- Dashboard init JS -->
        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <!-- DataTable --> 
        <script type="text/javascript" src="{{asset('assets/js/dtb/jquery.dataTables.min.js')}}"></script>
       
       <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>


    </body>


<!-- Mirrored from coderthemes.com/moltran/layouts/green-vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Apr 2022 11:30:32 GMT -->
</html>