<style>
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
        <a href="{{url('/')}}"><img src="{{asset('images/tu_logo.png')}}" class="responsive-logo img-fluid" alt="responsive-logo" style="width: 20%"></a>
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
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle @if($url=='department') active @endif" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Departments
                  </a>
                  <ul class="dropdown-menu">
                    @foreach ($dep_name as $data)
                      <li><a class="dropdown-item" href="{{url('/show_data_detail/'.$data->id)}}">{{substr($data['name'],14)}}</a></li>
                    @endforeach    
                  </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link @if($url=='academics') active @endif" href="{{url('/academics')}}">Academics</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Pages
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{url('/our_teacher')}}">Our Teachers</a></li>
                        <li><a class="dropdown-item" href="{{url('/research')}}">Research</a></li>
                        <li><a class="dropdown-item" href="{{url('/blog')}}">Blog</a></li>
                        <li><a class="dropdown-item" href="{{url('/events')}}">Events</a></li>
                        <li><a class="dropdown-item" href="{{url('/course')}}">Courses</a></li>
                        <li><a class="dropdown-item" href="{{url('/galley')}}">Gallery</a></li>
                      </ul>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link @if($url=='contact') active @endif" href="{{url('/contact')}}">Contact</a>
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
                {{-- <li class="nav-item">
                  <a class="nav-link @if($url=='contact') active @endif" href="{{url('/contact')}}">Contact</a>
                </li> --}}
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
{{-- banner --}}
  <img src="{{url('images/slider_1.jpg')}}" alt="" class="img-fluid">
{{-- banner --}}
