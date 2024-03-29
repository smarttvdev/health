<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PTI Health | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/iCheck/square/blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <script src="{{asset('public/library/html5shiv.3.7.3.min.js')}}"></script>
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}

    <script src="{{asset('public/library/respond.1.4.2min.js')}}"></script>
    <![endif]-->

    <!-- Google Font -->
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">--}}

    <link rel="stylesheet" href="{{asset('public/library/Source_Sans_Pro_300_400_600_700_Italic.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    {{--<div class="login-logo">--}}
        {{--<a href="../../index2.html"><b>Admin</b>LTE</a>--}}
    {{--</div>--}}
    <!-- /.login-logo -->
    <div class="login-box-body">
        {{--<p class="login-box-msg">Sign in to start your session</p>--}}
        <img src="{{asset('public/admin/admin login logo.png')}}" style="width:200px;height:auto;margin:20px auto;display:block;margin-top:10px">
        @if (count($errors))
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <style>
                div.g-recaptcha{
                    margin-top:15px !important;
                    /*margin-left:-75px !important;*/
                    margin-bottom:20px;
                }
            </style>
            <div class="form-group" style="margin-bottom:0px">
                {!! Recaptcha::render() !!}
            </div>

            <span class="invalid-captcha" style="color:red;margin-top:3px; marin-left:3px;display:none">
                        <strong>Captcha invalid</strong>
            </span>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>



        </form>



        {{--<a href="#">I forgot my password</a><br>--}}


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('public/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('public/admin/plugins/iCheck/icheck.min.js') }}"></script>
<script>

    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });

    window.onload = function() {
        var $recaptcha = document.querySelector('#g-recaptcha-response');
        if($recaptcha) {
            $recaptcha.setAttribute("required", "required");
        }
        $recaptcha.oninvalid = function(e) {
            $('.invalid-captcha').show();
        }
    };

</script>
</body>
</html>
