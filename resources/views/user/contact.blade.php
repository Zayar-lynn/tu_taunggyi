@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Contact')
@section('page_title','TU Taunggyi | Contact')
@section('content')
<section class="contact">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="contact-title">
<h2>Contact Details</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="contact-form">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6 contact-option">
<div class="contact-option_rsp">
<h3>Leave a message</h3>
<form action="{{url('/insert_contact')}}" method="post" id="phpcontactform">
  {{csrf_field()}}
<div class="form-group">
<input type="text" class="form-control" placeholder="Name" name="name" required>
</div>

<div class="form-group">
<input type="email" class="form-control" placeholder="Email" name="email" required>
</div>

<div class="form-group">
<input type="text" class="form-control" placeholder="Phone" name="phone" required>
</div>

<div class="form-group">
<textarea placeholder="Message" class="form-control" name="message" required rows="5"></textarea>
</div>

<button type="submit" class="btn btn-default btn-submit" id="js-contact-btn">SUBMIT</button>
<div id="js-contact-result" data-success-msg="Success, Your message has been sent" data-error-msg="Oops! Something went wrong"></div>

</form>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6">
<div class="contact-address">
<h3>Location</h3>
<div class="contact-details">
<i class="fa fa-user-o" aria-hidden="true"></i>
<h6>Address :</h6>
<p>{{$about_data->address}}</p>
</div>
<br>
<div class="contact-details">
<i class="fa fa-envelope-o" aria-hidden="true"></i>
<h6>Email :</h6>
<p><a class="text-white" href="http://tumkn@gmail.com" >{{$about_data->email}}</a>
</p>
</div>
<br>
<div class="contact-details">
<i class="fa fa-phone" aria-hidden="true"></i>
<h6>phone :</h6>
<p>{{$about_data->phone}}</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<p class="contact-center">OR</p>
</div>
</div>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59686.112699760255!2d96.95571827411455!3d20.775826400653635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ce85fee8a71a2b%3A0x1bd4d356785e4943!2z4YCU4YCK4YC64YC44YCV4YCK4YCs4YCQ4YCA4YC54YCA4YCe4YCt4YCv4YCc4YC6ICjhgJDhgLHhgKzhgIThgLrhgIDhgLzhgK7hgLgp!5e0!3m2!1smy!2smm!4v1552624983067" width="1500" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>


{{-- <div id="instafeed"></div> --}}
@endsection
