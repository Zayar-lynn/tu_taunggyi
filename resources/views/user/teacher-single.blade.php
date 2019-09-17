@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Teacher Detail')
@section('page_title','TU Taunggyi | Teacher Detail')
@section('content')
<div class="teachers-single">
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="teachers-img_block">
<img src="{{$teacher['photo_url']}}" class="img-fluid" style="height:200px;" alt="#">
<div class="teachers-title_block">
<h4><strong>{{$teacher['name']}}</strong></h4>
<h6>Phone : {{$teacher['phone']}}</h6>
<h6>Email : {{$teacher['email']}}</h6>
<h6>Position : {{$teacher['position']}}</h6>
<ul>
<li><a href="{{$teacher['fb_link']}}" target="blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
{{-- <li><i href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></i></li>
<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li> --}}
</ul>
</div>
</div>
</div>
<div class="col-md-8">
<div class="row">
<div class="col-md-12">
<div class="teacher-profile_block qualification_detaile">
<h4>Degree</h4>
  {{$teacher['degree']}}
</div>
<div class="teacher-profile_block qualification_detaile">
<h4>Department</h4>
  {{$teacher['department']['name']}}
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
{{$teacher['detail']}}
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
<h4 class="mt-4">Address</h4>
<div class="personal">
<address class="">
  {{$teacher['address']}}
</address>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
