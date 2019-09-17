<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/admin_image//sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{url('/')}}" target="_blank" class="simple-text logo-normal">
            {{-- @php
              echo Auth::user()->type;
            @endphp --}}
            <img src="{{asset('images/tu_logo.png')}}" style="width:50px;height:50px;" alt="">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            {{-- <li class="nav-item @if($url=="dashboard") active @endif">
                <a class="nav-link" href="{{url('home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li> --}}
            <li class="nav-item @if($url=="event") active @endif">
                <a class="nav-link" href="{{url('major/event')}}">
                    <i class="material-icons">event</i>
                    <p>Event</p>
                </a>
            </li>
            <li class="nav-item @if($url=="blog") active @endif">
                <a class="nav-link" href="{{url('major/blog')}}">
                    <i class="material-icons">view_module</i>
                    <p>Blog</p>
                </a>
            </li>
                {{-- <li class="nav-item @if($url=="teacher") active @endif">
                    <a class="nav-link" href="{{url('admin/teacher')}}">
                        <i class="material-icons">portrait</i>
                        <p>Teacher</p>
                    </a>
                </li>
                <li class="nav-item @if($url=="deparment") active @endif">
                    <a class="nav-link" href="{{url('admin/department')}}">
                        <i class="material-icons">school</i>
                        <p>Deparment</p>
                    </a>
                </li>
                <li class="nav-item @if($url=="department_post") active @endif">
                    <a class="nav-link" href="{{url('admin/department_post')}}">
                        <i class="material-icons">language</i>
                        <p>Department Post</p>
                    </a>
                </li> --}}
            <li class="nav-item @if($url=="course") active @endif">
                <a class="nav-link" href="{{url('major/course')}}">
                    <i class="material-icons">library_books</i>
                    <p>Course</p>
                </a>
            </li>
            <li class="nav-item @if($url=="department_video") active @endif">
                <a class="nav-link" href="{{url('major/department_video')}}">
                    <i class="material-icons">play_circle_outline</i>
                    <p>Video</p>
                </a>
            </li>
            {{-- <li class="nav-item @if($url=="gallery") active @endif">
                <a class="nav-link" href="{{url('admin/gallery')}}">
                    <i class="material-icons">photo_library</i>
                    <p>Gallery</p>
                </a>
            </li>
            <li class="nav-item @if($url=="contact") active @endif">
                <a class="nav-link" href="{{url('admin/contact')}}">
                    <i class="material-icons">sms</i>
                    <p>Contact</p>
                </a>
            </li>
            <li class="nav-item @if($url=="about") active @endif">
                <a class="nav-link" href="{{url('admin/about')}}">
                    <i class="material-icons">content_paste</i>
                    <p>About Us</p>
                </a>
            </li>
            <li class="nav-item @if($url=="research") active @endif">
                <a class="nav-link" href="{{url('admin/research')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Research</p>
                </a>
            </li>
            <li class="nav-item @if($url=="major_admin") active @endif">
                <a class="nav-link" href="{{url('admin/major_admin')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Add Major Admin</p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{url('logout')}}">
                    <i class="material-icons">close</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>
