@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Department Detail')
@section('page_title','TU Taunggyi | Department')
@section('content')
<div class="teachers-single">

<div class="col-md-12">
  <h3 align="center">What is {{substr($department['name'],14)}}?</h3><hr>
    <video width="100%" height="300" controls id="update_dep_video">
        <source src="{{$department_video}}" type="video/mp4">
    </video>
  <h1></h1>
    <br><br><br><br>
</div>


<div class="container">
<div class="row">
<div class="col-md-4">
<div class="teachers-img_block">
<img src="{{$department['photo_url']}}" class="img-fluid" style="height:200px;" alt="#">
<div class="teachers-title_block">
<h4><strong>{{$department['name']}}</strong></h4>
<h6>Phone : {{$department['phone']}}</h6>
<h6>Email : {{$department['email']}}</h6>
<ul>
{{-- <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li> --}}
</ul>
</div>
</div>
</div>
<div class="col-md-8">
<div class="row">
<div class="col-md-12">
<div class="teacher-profile_block qualification_detaile">
<h4>Head of Department</h4>
  {{$department['head_of_department']}}
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="teacher-profile_block qualification_detaile">
<h4 class="mt-4">Detail</h4>
<div class="row">
<div class="col-md-12">
<div class="personal">
{{$department['description']}}
</div>
</div>
</div>
<hr>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="teacher-profile_block qualification_detaile">
<h4 class="mt-4">Location</h4>
<div class="personal">
<address class="">
  {{$department['location']}}
</address>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<section class="blog-wrap">
<div class="container">
<div class="row">
  <div class="col-md-12">
  {{-- <h2 class="mb-5 text-center">Post</h2> --}}
  </div>
</div>
@if(count($department['department_post']) > 0)
<div class="row">
  @foreach($department['department_post'] as $departments)
  <div class="col-md-4">
<div class="blog-single-item" style="box-shadow: 0px 0px 3px #000;">
<div class="">
<img src="{{asset('/upload/department_post/'.$departments->photo)}}" class="img-fluid" alt="blog-img" width="100%" style="max-height:175px;min-height:200px;">

</div>
<div style="padding:10px;">
<h4 style="font-size:18px;"><a href="{{url('/dep_post_detail/'.$departments->id)}}">{{$departments->title}}</a></h4>

<p>
  {{str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($departments->description)),60)}}
</p>
<a href="{{url('/dep_post_detail/'.$departments->id)}}">Read More</a>
<div>
<div class="blog-share_block">

</div>
</div>
</div>
</div>
</div>
@endforeach
</div>
@else
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <h3 class="text-center mb-4">ACTIVITY DOES NOT EXIST YET!</h3>
      </div>
    </div>
@endif

</div>
</section>

<section class="our-teachers">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2 class="mb-5">Teachers</h2>
</div>
</div>
@if(count($teachers) > 0)
<div class="row">
  @foreach($teachers as $data)
<div class="col-xs-12 col-sm-6 col-md-6">
<div class="our-teachers-block">
  <a href="{{url('/teachers-single/'.$data['id'])}}">
    <img src="{{$data['photo_url']}}" class="img-fluid teachers-img" alt="#">
  </a>
<div class="teachers-description">
  <p><strong><a href="{{url('/teachers-single/'.$data['id'])}}">{{$data['name']}}</a></strong>
  </p>
  <hr>
<p>{{str_limit($data['detail'],40)}}</p>
<div class="social-icons">
  <ul>
  <li><a href="{{$data['fb_link']}}" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
  {{-- <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> --}}
  </ul>
</div>
</div>
</div>
</div>
  @endforeach
</div>
  @else
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <h3 class="text-center mb-4">TEACHER DOES NOT EXIST YET!</h3>
      </div>
    </div>
@endif
</div>
</section>
@endsection
