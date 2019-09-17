@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Course')
@section('page_title','TU Taunggyi | Course')
@section('content')

  <section class="our_courses">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h2 align="center">Our Courses</h2>
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
        <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
      </div>
      <a href="{{url('/show_course_detail/'.$course->id)}}" class="course-box-content">
        <h3>
          {{substr($course->course_name,0,12)}}
          {{strlen($course->course_name) > 12 ? '...' : '' }}
        </h3>
        <p>
          {{str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($course->course_detail)),80)}}
        </p>
       </a>
     </div>
  </div>
@endforeach
  </div>
  </div>
  </section>

@endsection
