<style>
    @media (max-width: 767px){
        .media{
            font-size: 20px!important;
        }
    }
    @media (max-width: 991px){
        nav button{
            margin-top:25px;
        }
    }
    @media (max-width: 767px){
        nav button{
            margin-top:50px;
        }
    }
</style>
<div class="d-sm-block d-lg-none d-md-block">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{url('/')}}"><img src="images/tu_logo.png" class="responsive-logo img-fluid" alt="responsive-logo" style="width: 20%"></a>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12" style="margin-top:10px;">
                    <br>
                    <nav class="navbar navbar-toggleable-md navbar-light">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown_2">
                            <span class="fa fa-bars"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNavDropdown_2">
                            <br><br><br>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link  @if($url=='home') active @endif" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($url=='about') active @endif" href="{{url('/about')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($url=='research') active @endif" href="{{url('/research')}}">Research</a>
                                </li>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($url=='blog') active @endif" href="{{url('/blog')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($url=='event') active @endif" href="{{url('/events')}}">Events</a>
                                </li>
                                <li class="nav-logo">
                                    <a href="{{url('/')}}" class="navbar-brand"><img src="{{url('images/tu_logo.png')}}" class="img-fluid" alt="logo"></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link @if($url=='department') active @endif" href="{{url('/our-departments')}}">Departments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($url=='course') active @endif" href="{{url('/course')}}">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($url=='gallery') active @endif" href="{{url('/galley')}}">Gallery</a>
                                </li>

                                {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fcolor" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index-2.html">Home Style Two</a></li>
                                <li><a class="dropdown-item" href="index-video.html">Home Video</a></li>
                                <li><a class="dropdown-item" href="{{url('/blog')}}">Blog</a></li>
                                <li><a class="dropdown-item" href="{{url('/blog-post')}}">Blog Post</a></li>
                                <li><a class="dropdown-item" href="index-landing-page.html">Landing Page</a></li>
                                <li><a class="dropdown-item" href="{{url('/events')}}">Events</a></li>
                                <li><a class="dropdown-item" href="{{url('/course-detail')}}">Course Details</a></li>
                                 <li><a class="dropdown-item" href="{{url('/campus-life')}}">Campus Life</a></li>
                                <li><a class="dropdown-item" href="{{url('/our-teachers')}}">Our Teachers</a></li>
                                <li><a class="dropdown-item" href="{{url('/teachers-single')}}">Teachers Single</a></li>
                                <li><a class="dropdown-item" href="{{url('/gallery')}}">Gallery</a></li>
                                <li><a class="dropdown-item" href="shortcodes.html">Shortcodes</a></li>
                                <li class="dropdown">
                                <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Others Pages</a>
                                <ul class="dropdown-menu dropdown-menu1">
                                <li><a class="dropdown-item" href="notice-board.html">Notice Board</a></li>
                                <li><a class="dropdown-item" href="chairman-speech.html">Chairman Speech</a></li>
                                <li><a class="dropdown-item" href="sample-page.html">Sample Page</a></li>
                                <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                                <li><a class="dropdown-item" href="login.html">Login</a></li>
                                <li><a class="dropdown-item" href="sign-up.html">Sign Up</a></li>
                                <li><a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
                                </ul>
                                </li>
                                </ul>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link @if($url=='contact') active @endif" href="{{url('/contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center text-white">
                    <h1>@yield('title')</h1>
                </div>
            </div>
        </div>




    </header>
</div>
<div class="slider_img">
<div id="carousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carousel" data-slide-to="0" class="active"></li>
<li data-target="#carousel" data-slide-to="1"></li>
<li data-target="#carousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" role="listbox">
<div class="carousel-item active">
<img class="d-block" src="{{url('images/slider_1.jpg')}}" alt="First slide" width="100%">
<div class="carousel-caption d-md-block">
<div class="slider_title">
{{-- <h1 class="fcolor media">Technology University Taunggyi</h1> --}}
<h2><strong>@yield('title')</strong></h2>
<!-- <h4>Proactively utilize open-source users for process-centric total linkage.<br> Energistically reinvent web-enabled initiatives with premium <br>processes. Proactively drive.</h4>
<div class="slider-btn">
<a href="#" class="btn btn-default">SEE Programs</a>
<a href="#" class="btn btn-default">Learn more</a>
</div> -->
</div>
</div>
</div>
<div class="carousel-item">
<img class="d-block" src="{{url('images/slider_2.jpg')}}" alt="Second slide" width="100%">
<div class="carousel-caption d-md-block">
<div class="slider_title">
{{-- <h1 class="fcolor media">Technology University Taunggyi</h1> --}}
<h2>@yield('title')</h2>
<!-- <h4>Proactively utilize open-source users for process-centric total linkage.<br> Energistically reinvent web-enabled initiatives with premium <br>processes. Proactively drive.</h4>
<div class="slider-btn">
<a href="#" class="btn btn-default">SEE Programs</a>
<a href="#" class="btn btn-default">Learn more</a>
</div> -->
</div>
</div>
</div>
<div class="carousel-item">
<img class="d-block" src="{{url('images/slider_3.jpg')}}" alt="Third slide" width="100%">
<div class="carousel-caption d-md-block">
<div class="slider_title">
{{-- <h1 class="fcolor media">Technology University Taunggyi</h1> --}}
<h2>@yield('title')</h2>
<!-- <h4>Proactively utilize open-source users for process-centric total linkage.<br> Energistically reinvent web-enabled initiatives with premium <br>processes. Proactively drive.</h4>
<div class="slider-btn">
<a href="campus-life.html" class="btn btn-default">Campus Life</a>
</div> -->
</div>
</div>
</div>
</div>
<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
<i class="fa fa-angle-left fa-slider" aria-hidden="true"></i>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
<i class="fa fa-angle-right fa-slider" aria-hidden="true"></i>
<span class="sr-only">Next</span>
</a>
</div>
</div>
