@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Department')
@section('page_title','TU Taunggyi | Department')
@section('content')
<section class="our-teachers">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2 class="mb-5">Our Departments</h2>
</div>
</div>
@if(count($departments) > 0)
<div class="row">
@foreach ($departments as $data)

<div class="col-xs-12 col-sm-6 col-md-6">
<div class="our-teachers-block">
  <a href="{{url('/show_data_detail/'.$data['id'])}}">
    <img src="{{$data['photo_url']}}" class="img-fluid teachers-img" alt="#">
  </a>
<div class="teachers-description">
<p><strong><a href="{{url('/show_data_detail/'.$data['id'])}}">{{$data['name']}}</a></strong>
</p>
<hr>
<p>{{str_limit($data['description'],40)}}</p>
<div class="social-icons">
<ul>
<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
@endforeach
 @else
 <div class="row">
  <div class="col-md-10 offset-md-1">
    <h3 class="text-center">DOES NOT EXIST</h3>
  </div>
 </div>
 </div>
 @endif
</div>
</section>

@endsection
