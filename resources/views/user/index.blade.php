@extends('user.layout.master')

@section('bunner')
@include('user.layout.slider')
@endsection

@section('page_title','TU Taunggyi | Home')
@section('content')
  <section class="clearfix about">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h2>Welcome</h2>
  </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  <p>{!!$intro_data->text!!}</p>
  <img src="{{$intro_data->photo_url}}" class="img-fluid" alt="welcom-img">
  </div>
  </div>
  </div>
  </section>


  <section class="our_courses">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h2>Our Courses</h2>
  </div>
  </div>
  <div class="row">
@foreach ($courses as $course)
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
    <div class="courses_box mb-5">
      <div class="course-img-wrap">
        <img src="{{$course->photo_url}}" class="img-fluid" alt="courses-img" style="width:100%; height:200px;">
        <div class="courses_box-img">
          <div class="courses-link-wrap">
            <a href="{{url('/show_course_detail/'.$course->id)}}" class="course-link"><span>course Details </span></a>
          </div>
        </div>
      </div>
      <div class="courses_icon">
        <img src="{{asset('images/plus-icon.png')}}" class="img-fluid close-icon" alt="plus-icon">
      </div>
      <a href="{{url('/show_course_detail/'.$course->id)}}" class="course-box-content">
        <h3>
          {{substr($course->course_name,0,12)}}
          {{strlen($course->course_name) > 12 ? '...' : '' }}
        </h3>
        <p>
          {{str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($course->course_detail)),40)}}
        </p>
       </a>
     </div>
  </div>
@endforeach
  </div>
  <div class="row">
  <div class="col-md-12 text-center">
  <a href="{{url('/course')}}" class="btn btn-default btn-courses">View all courses</a>
  </div>
  </div>
  </div>
  </section>


  <section class="event">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Upcoming Events</h2>
      </div>
    
  

@foreach ($events as $event)
  <div class="col-lg-4 col-md-6">
  <div class="event-img">
  <span class="event-img_date">{{$event->date}}</span>
  <img src="{{asset('/upload/event/'.unserialize($event->photo)[0])}}" class="img-fluid" alt="event-img" style="width:100%; height:300px;">
  <div class="event-img_title">
  <a href="{{url('/events')}}">
    <h3>{{$event->title}}</h3>
  </a>
  <p>
    {{str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($event->description)),80)}}
  </p>
  </div>
  </div>
  </div>
@endforeach

</div><br>
  <div class="row">
    <div class="col-md-12 text-center">
    <a href="{{url('/events')}}" class="btn btn-default btn-courses">VIEW ALL EVENT</a>
    </div>
  </div>
  </div>
  </section>

  <section class="blog">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h2>Our Blog</h2>
  </div>
  </div>
  <div class="row">

@foreach($blog_ones as $blog_one)
  <div class="col-md-12">
  <a href="{{url('/blog_detail/'.$blog_one->id)}}" class="home_blog_link">
  <div class="blog-img_box">
  <img src="{{$blog_one->photo_url}}" class="img-fluid blog_display" alt="blog-img" style="height: 700px;">
  <div class="blogtitle">
  <h3>{{$blog_one->title}}</h3>
  <i class="fa fa-user" aria-hidden="true"></i>
  <i class="fa fa-clock-o" aria-hidden="true"></i>
  <p>{{substr($blog_one->created_at,0,10)}}</p>
  </div>
  </div>
  </a>
  </div>
@endforeach

  </div>
  <div class="row">

@foreach($blogs as $blog)
  <div class="col-md-4">
  <a href="{{url('/blog_detail/'.$blog->id)}}" class="home_blog_link">
  <div class="blog-img_box">
  <img src="{{$blog->photo_url}}" class="img-fluid blog_display" alt="blog-img" style="height: 250px; width: 350px">
  <div class="blogtitle">


  <i class="fa fa-user" aria-hidden="true"></i>
  {{-- <p>by: admin</p> --}}
  <i class="fa fa-clock-o" aria-hidden="true"></i>
  <p>{{substr($blog->created_at,0,10)}}</p>
  </div>
  </div>
  </a>
  </div>
@endforeach

  </div><br>
  <div class="row">
  <div class="col-md-12 text-center">
  <a href="{{url('/blog')}}" class="btn btn-default btn-courses">VIEW ALL BLOG</a>
  </div>
  </div>
  </div>
  </section>

  <section class="resources">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h2 class="resources-title">Our Partner Company</h2>
          </div>
        </div>
        <br><br><br><br>
      <div class="row resources-slider">
        <div class="col-md-12">
        <div class="resources-slick">
          @foreach($ourpartners as $ourpartner)
          <div class="resources-slider_wrap">
            <div class="research-testi_block">
              <img src="{{$ourpartner->photo_url}}" class="img-fluid" alt="resurces-img" style="width:200px; height:200px; border-radius:50%;">
              <h4>{{$ourpartner->name}}</h4>
                {{-- <p>uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident crambled it.</p> --}}
            </div>
          </div>
          @endforeach
          </div>
        </div>
        </div>
       </div>
      </div>
    </section>

<style>
   .aa .col-xs-12 {
  text-align: center;
  padding-bottom: 50px;
  border-right: 1px dashed white;
}

.aa .col-md-3:last-child {
  border-right: 0px solid black;
}

.aa .counter {
  animation-duration: 1s;
  animation-delay: 0s;
}

.aa i {
  font-size: 20px !Important;
}

@media (max-width: 991px) {
  .aa .col-md-3 {
    border-right: 0px dashed black;
    border-bottom: 1px dashed black;
    width: 50%;
    margin: auto auto;
  }
  
  .aa .col-xs-12:last-child {
    border-bottom: 0px dashed white;
  }
}
</style>
<div style="background-image: url('{{asset('images/BANNER.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
  <div class="container aa">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
          <h1><span class="counter text-white">{{$teacher_count}}</span></h1>
          <h3 class="text-white">Teachers</h3>
          <i class="fa fa-users text-white"></i>
        </div> 
        <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
          <h1><span class="counter text-white">{{$course_count}}</span></h1>
          <h3 class="text-white">Courses</h3>
          <i class="fa fa-desktop text-white"></i>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
          <h1><span class="counte text-white">{{$students_count}}</span></h1>
          <h3 class="text-white">All Students</h3>
          <i class="fa fa-user text-white"></i>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
          <h1><span class="counter text-white">{{substr(date('Y-m-d H:i:s'),0,4) - 2006}}</span></h1>
          <h3 class="text-white">Experience years</h3>
          <i class="fa fa-calendar text-white"></i>
        </div>
      </div>
  </div>
</div><br><br>

<div class="container">
  <div class="row">
      <div class="col-md-12">
        <h2 style="text-align: center;"><i>Gallery</i></h2>
              <div class="owl-carousel owl-theme">
                  @foreach ($gallerys as $item)
                      {{-- <div class="item"><h4>{{$item->id}}</h4></div> --}}
                      <img src="{{$item->photo_url}}" class="img-fluid" alt="#" style="width:200px;height:150px">
                  @endforeach
              </div>
      </div>
    </div>
  </div>




  @section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });

    </script>
@endsection

  {{-- <div id="instafeed"></div> --}}
@endsection
<script>
    $('.counter').counterUp({
  delay: 10,
  time: 2000
});
$('.counter').addClass('animated fadeInDownBig');
$('h3').addClass('animated fadeIn');
</script>