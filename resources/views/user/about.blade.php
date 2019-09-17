@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','About')
@section('page_title','TU Taunggyi | About')
@section('content')
<section class="welcome_about">
<div class="container">
<div class="row">
<div class="col-md-7">
<h2>About Us</h2>
<p>{!!$about_data->about!!}</p>

</div>
<div class="col-md-5">
<img src="{{$about_data->photo_url}}" class="img-fluid" alt="#" style="width:100%; height:300px;">
</div>
</div>
</div>
</section>


<section class="welcome_about">
<div class="container">
<div class="row">
<div class="col-md-6">
<h2 class="text-center">Our Vision</h2>
<p>{!!$about_data->vision!!}</p>

</div>
<div class="col-md-6">
<h2 class="text-center">Our Mission</h2>
<p>{!!$about_data->mission!!}</p>
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

{{-- <section class="our-teachers">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Our Teachers</h2>
</div>
</div>
<div class="row">

@foreach ($teachers_arr as $teacher)
<div class="col-xs-12 col-sm-6 col-md-6">
<div class="our-teachers-block">
<img src="{{$teacher->photo_url}}" class="img-fluid teachers-img" alt="#">
<div class="teachers-description">
<p><strong>{{$teacher->name}}</strong>
<br>{{$teacher->degree}}
</p>
 <hr />
<p>Syllabus : <span>{{$teacher->position}}</span></p>
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

</div>

</div>
</section> --}}


{{-- <div id="instafeed"></div> --}}
@endsection
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
