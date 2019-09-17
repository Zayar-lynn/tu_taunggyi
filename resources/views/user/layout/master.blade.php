<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>
    <link rel="icon" type="image/jpg" href="{{asset('images/admin_image/tu_logo.png')}}">

    <script src="/cdn-cgi/apps/head/-mEFVS8y7qx5pVzWHQTCQu5gnVM.js"></script>
    <link rel="stylesheet" href="{{url('css/user_css/bootstrap.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{url('css/user_css/simple-line-icons.css')}}">

    <link rel="stylesheet" href="{{url('css/user_css/slick.css')}}">
    <link rel="stylesheet" href="{{url('css/user_css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{url('css/user_css/owl.carousel.min.css')}}">

    <link href="{{url('css/user_css/style.css')}}" rel="stylesheet">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- Toastr notification -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
    {{-- owl --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/docs.theme.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/user_css/owl.theme.default.min.css')}}">

    <style>
        .item h4{
            width: 200px;
            height: 100px;
            background-color: #ecf;
        }
        .owl-dots{
            display: none;
        }
        .owl-nav{
            text-align: center;
        }
        .owl-nav div{
            /*margin-top: 20px;*/
            margin: 20px 10px;
            border-radius: 2px;
            color: #fff;
            background-color: #afabb7;
            text-align: center;
            display: inline-block;
            width: 50px;
        }
    </style>

</head>
<body>
@include('user.layout.nav')
@yield('bunner')

@yield('content')

@include('user.layout.footer')



<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{url('js/user_js/jquery.min.js')}}"></script>
<script src="{{url('js/user_js/tether.min.js')}}"></script>
<script src="{{url('js/user_js/bootstrap.min.js')}}"></script>

<script src="{{url('js/user_js/slick.min.js')}}"></script>
<script src="{{url('js/user_js/waypoints.min.js')}}"></script>
<script src="{{url('js/user_js/counterup.min.js')}}"></script>
<script src="{{url('js/user_js/instafeed.min.js')}}"></script>
<script src="{{url('js/user_js/owl.carousel.min.js')}}"></script>
<script src="{{url('js/user_js/validate.js')}}"></script>
<script src="{{url('js/user_js/tweetie.min.js')}}"></script>
<script src="{{url('js/user_js/jquery.magnific-popup.js')}}"></script>

<script src="{{url('js/user_js/subscribe.js')}}"></script>

<script src="{{url('js/user_js/script.js')}}"></script>

<!-- Toastr notification -->
<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>

{{-- owl --}}
<script src="{{url('js/user_js/highlight.js')}}"></script>
<script src="{{url('js/user_js/app.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        load();

        function load(){
            $.ajax({
                type: "GET",
                url: "{{url('get_all_about')}}",

                cache: false,
                success: function(data){
                    var data_return=JSON.parse(data);
                    //console.log(data_return);
                    $('#phone').html(data_return['phone']);
                    $('#email').html(data_return['email']);
                    $('#address').html(data_return['address']);
                }
            });
        }

        
    });
</script>
@yield('script')
</body>
</html>
