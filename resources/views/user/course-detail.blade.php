@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Course Detail')
@section('page_title','TU Taunggyi | Course')
@section('content')
<section class="admission_cources">
<div class="container">
<div class="row">
<div class="col-md-8">
<h2>{{$course_detail->course_name}}</h2>
{{-- <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p> --}}
</div>
</div>
<div class="row">
<div class="col-md-8">
<img src="{{$course_detail->photo_url}}" class="img-fluid" alt="#" width="100%">
</div>
</div>
<div class="row justify-content-md-center">
<div class="col-lg-12">
<div class="admission_discription">
<h4>{{$course_detail->course_name}}</h4>
{{-- <div class="star-rating">
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star" aria-hidden="true"></i>
<i class="fa fa-star-o" aria-hidden="true"></i>
</div> --}}

<p>{!!$course_detail->course_detail!!}</p>
</div>
{{-- <div class="admission-pdf">
<i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>
<p>course details PDF
<br>
<a href="#">DOWNLOAD</a>
</p>
<a href="#" class="btn btn-warning btn-pdf_join">Join this course</a>
</div> --}}
{{-- <div class="admission_testimonial">
 <h4>Students Testimonials</h4>
<div class="admission-testi_slider">
<div class="admission-testi_wrap">
<div class="admissiontesti-img_block">
<img src="{{url('images/admission-detail/admission_testi-img.jpg')}}" alt="#">
</div>
<div class="admissiontesti-text_block">
<p>Electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
<h6><strong>Michelle Salazar</strong><br>
<span>Biology Stusent</span></h6>
</div>
</div>
<div class="admission-testi_wrap">
<div class="admissiontesti-img_block">
<img src="{{url('images/admission-detail/admission_testi-img.jpg')}}" alt="#">
</div>
<div class="admissiontesti-text_block">
<p>Electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
<h6><strong>Maria Douglas</strong><br>
<span>Biology Stusent</span></h6>
</div>
</div>
<div class="admission-testi_wrap">
<div class="admissiontesti-img_block">
<img src="{{url('images/admission-detail/admission_testi-img.jpg')}}" alt="#">
</div>
<div class="admissiontesti-text_block">
<p>Electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
<h6><strong>Carolyn Ford</strong><br>
<span>Biology Stusent</span></h6>
</div>
</div>
</div>
</div> --}}
</div>
{{-- <div class="col-lg-4">
<ul class="admission_rating">
<li>Ratings<span>:</span></li>
<li class="admission_star">5 Star</li>
<li class="admission_star-second">Starts<span>:</span></li>
<li class="admission_star">7 January 2017</li>
<li>Duration<span>:</span></li>
<li class="admission_star">7 months</li>
<li class="admission_star-second">Timing<span>:</span></li>
<li class="admission_star">10 am - 2 pm</li>
<li>Fees<span>:</span></li>
<li class="admission_star">$ 500.00</li>
<li>Seats avilable<span>:</span></li>
<li class="admission_star">90</li>
</ul>
<div class="admission_insruction">
<h4>Instructors</h4>
<img src="{{url('images/admission-detail/instruction-img.jpg')}}" class="img-fluid" alt="#">
<p>Frank Harvey
<br>
<span>Master of Science</span></p>
</div>
<div class="admission_share-icon">
<h4>Share Course</h4>
<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
</div>
</div> --}}
</div>
</div>
</section>


{{-- <div id="instafeed"></div> --}}
@endsection
