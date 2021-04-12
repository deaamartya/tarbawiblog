
<title>{{$Gsetting->title}} @yield('sub-title')</title>
<meta name="keywords" content="{{$Seo->metakeyword}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="{{asset('Images/Favicon/'.$Gsetting->favicon)}}" type="image/x-icon">
<link rel="icon" href="{{asset('Images/Favicon/'.$Gsetting->favicon)}}" type="image/x-icon">
<link rel="stylesheet" href="{{ (asset('frontend/css/bootstrap.min.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/iconfonts.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/font-awesome.min.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/owl.carousel.min.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/owl.theme.default.min.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/magnific-popup.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/animate.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/style.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/responsive.css')) }}">
<link rel="stylesheet" href="{{ (asset('frontend/css/colorbox.css')) }}">
<script src="{{ (asset('frontend/js/html5shiv.js')) }}"></script>
<script src="{{ (asset('frontend/js/respond.min.js')) }}"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/us_US/sdk.js#xfbml=1&version=v5.0&appId=170064424339450&autoLogAppEvents=1"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<style type="text/css">
    .popUpBannerBox {
        position: fixed;
        background: rgba(0,0,0,0.9);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        color: #FFF;
        z-index: 999999;
        display: none;
    }
    .popUpBannerInner {
        max-width: 65%;
        margin: 0 auto;
    }
    .popUpBannerContent {
        position: fixed;
        top: 20px;
    }
    .closeButton {
        color: red;
        text-decoration: none;
        font-size: 18px;
    }
</style>
<style type="text/css">
    @media only screen and (max-width: 991px){
        .logoHowDef { display: none; }
        .logoHowMin { display: block; 
                      margin-left:auto;
                      margin-right:auto;
                      align-items:center;
                      padding: 8px;
                      z-index:102;
                      width: 75%;
        }
        .navigasiUtama{
            animation-name:fadeInDown;
            animation-duration: 1s;
            animation-delay: .1s;
            width:100%;
            top:0px;
            left:0px;
            right:0px;
            margin:auto;
            padding:0px;
            z-index:100;
            position: fixed;
        }
    }
    @media only screen and (min-width: 992px){
        .logoHowDef { display: block;}
        .logoHowMin { display: none; }
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{!! $Seo->code_analytics !!}