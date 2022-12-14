<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <title>Inventory Management System </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link href="{{url('admin/assets/plugins/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css">

        <link href="{{url('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/pages.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/menu.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/responsive.css')}}" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     
        <script src="{{url('admin/assets/js/modernizr.min.js')}}"></script>
         <link href="{{url('admin/assets/css/custom.css')}}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>


    <body>

        @include('admin.layout.header')

        <div class="wrapper" >
            <div class="container-fluid" >
                <div class="leftCon">   
                @include('admin.layout.sidebar')
                </div>
                <div class="mainCon" >  
                @yield('content')

                </div>
            </div>
        </div>


        @include('admin.layout.footer')

        <!-- jQuery  -->
        <script src="{{url('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{url('admin/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('admin/assets/js/detect.js')}}"></script>
        <script src="{{url('admin/assets/js/fastclick.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{url('admin/assets/js/waves.js')}}"></script>
        <script src="{{url('admin/assets/js/wow.min.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.scrollTo.min.js')}}"></script>

        <!-- App js -->
        <script src="{{url('admin/assets/js/jquery.app.js')}}"></script>

        <!-- moment js  -->
        <script src="{{url('admin/assets/plugins/moment/moment.js')}}"></script>

        <!-- counters  -->
        <script src="{{url('admin/assets/plugins/waypoints/lib/jquery.waypoints.js')}}"></script>
        <script src="{{url('admin/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

        <!-- sweet alert  -->
        <script src="{{url('admin/assets/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>


        <!-- flot Chart -->
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.selection.js')}}"></script>
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.stack.js')}}"></script>
        <script src="{{url('admin/assets/plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>

        <!-- todos app  -->
        <script src="{{url('admin/assets/pages/jquery.todo.js')}}"></script>

        <!-- chat app  -->
        <script src="{{url('admin/assets/pages/jquery.chat.js')}}"></script>

        <!-- dashboard  -->
        <script src="{{url('admin/assets/pages/jquery.dashboard.js')}}"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
       <script src="{{url('admin/assets/js/custom.js')}}"></script>


 
 

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

        
<script>
    $(document).ready(function()    {
             @if(Session::has('message'))
             toastr.options =
             {
             "closeButton" : true,
             "progressBar" : true
             }
             toastr.success("{{ session('message') }}");
             @endif
             
             @if(Session::has('error'))
             toastr.options =
             {
             "closeButton" : true,
             "progressBar" : true
             }
             toastr.error("{{ session('error') }}");
             @endif
             
             @if(Session::has('info'))
             toastr.options =
             {
             "closeButton" : true,
             "progressBar" : true
             }
             toastr.info("{{ session('info') }}");
             @endif
             
             @if(Session::has('warning'))
             toastr.options =
             {
             "closeButton" : true,
             "progressBar" : true
             }
             toastr.warning("{{ session('warning') }}");
             @endif
    }); 
</script>
        

    </body>

<!-- Mirrored from moltran.coderthemes.com/menu_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Mar 2018 17:49:16 GMT -->
</html>