<style>
  .active{
    border-bottom: 1px solid #fff;
  }
</style>
<div class="d-none d-lg-block d-sm-none d-xs-none">
  <header>
    <div class="container nav-menu">
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('/')}}"><img src="images/tu_logo.png" class="responsive-logo img-fluid" alt="responsive-logo"></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
              <span class="icon-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link fcolor @if($url=='home') active @endif" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fcolor @if($url=='about') active @endif" href="{{url('/about')}}">About</a>
                </li>
                
                {{-- <li class="nav-item">
                  <a class="nav-link fcolor @if($url=='research') active @endif" href="{{url('/research')}}">Research</a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="dropdown-item" href="{{url('/blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fcolor @if($url=='event') active @endif" href="{{url('/events')}}">Events</a>
                </li> --}}
                {{-- <li class="nav-item">
                  <a class="nav-link fcolor @if($url=='department') active @endif" href="{{url('/our-departments')}}">Departments</a>
                </li> --}}
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle fcolor @if($url=='department') active @endif" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Departments
                  </a>
                  <ul class="dropdown-menu">
                    @foreach ($dep_name as $data)
                      <li><a class="dropdown-item" href="{{url('/show_data_detail/'.$data->id)}}">{{$data->name}}</a></li>
                    @endforeach    
                  </ul>
                  </li>
                  
                <li class="nav-logo">
                  <a href="{{url('/')}}" class="navbar-brand"><img src="{{url('images/tu_logo.png')}}" class="img-fluid" alt="logo"></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fcolor @if($url=='academics') active @endif" href="{{url('/academics')}}">Academics</a>
                  </li>
                {{-- <li class="nav-item">
                  <a class="nav-link fcolor @if($url=='course') active @endif" href="{{url('/course')}}">Courses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fcolor @if($url=='gallery') active @endif" href="{{url('/galley')}}">Gallery</a>
                </li> --}}

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fcolor" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                  <a class="nav-link fcolor @if($url=='contact') active @endif" href="{{url('/contact')}}">Contact</a>
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
