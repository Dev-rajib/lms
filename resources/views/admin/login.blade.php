<!DOCTYPE html>
<html>
    
<!-- Mirrored from moltran.coderthemes.com/menu_2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Mar 2018 17:50:54 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Inventory Management System </title>

        <link href="{{url('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/pages.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/menu.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('admin/assets/css/responsive.css')}}" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            .error{
                color: red;
                font-weight: 100;
                padding:5px 10px;
                transition: 1s easy-in-out;
            }
        </style>

        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Reeyaaz</strong> </h3>
                </div> 


                <div class="panel-body">
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                      <strong>Error: </strong> {{Session::get('error')}}
                    </div>
                    @endif
                <form class="form-horizontal m-t-20" action="{{url('admin/login')}}" method="post">@csrf
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" name="email" id="email" type="text"  placeholder="Username" >
                        </div>
                        <span class="error">
                            @error('email') {{$message}} @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" name="password" id="password" type="password"  placeholder="Password" >
                        </div>
                        <span class="error">
                            @error('password') {{$message}} @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="register.html">Create an account</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="{{url('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{url('admin/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('admin/assets/js/detect.js')}}"></script>
        <script src="{{url('admin/assets/js/fastclick.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{url('admin/assets/js/waves.js')}}"></script>
        <script src="{{url('admin/assets/js/wow.min.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.app.js')}}"></script>
	
	</body>

<!-- Mirrored from moltran.coderthemes.com/menu_2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Mar 2018 17:50:54 GMT -->
</html>