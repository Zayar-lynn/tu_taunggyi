@extends('user.layout.master')
@section('title','Department Post Detail')
@section('page_title','TU Taunggyi | Department Post Detail')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title')
  {{$dep_post_detail->title}}
@endsection
@section('content')
<section class="blog-wrap">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="">
<img src="{{$dep_post_detail->photo_url}}" class="img-fluid" alt="blog-img" width="70%">
{{-- <div class="blog-date">
<span>{{substr($blog_detail->created_at,0,10)}}</span>
</div> --}}
</div>
<div>
  <br>
<h4>{{$dep_post_detail->title}}</h4>
<span class="text-muted">Date : {{substr($dep_post_detail->created_at,0,10)}}</span>
{{-- <h6> <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>admin</span> </a> | <a href="#"><i class="fa fa-tags" aria-hidden="true"></i><span>Education</span></a></h6> --}}
<p>{!!$dep_post_detail->description!!}</p>
</div>
{{-- <blockquote class="blogpost-quotes">
<span><i class="fa fa-quote-left" aria-hidden="true"></i></span>
<p>Many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose. </p>
<span class="quote-right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
</blockquote> --}}
{{-- <div class="blog-tiltle_block">
<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>
<span class="blogpost_list">Cras sed ante sagittis, imperdiet purus non, molestie nisi.</span>
<br>
<span class="blogpost_list">Quisque pellentesque ligula sed augue euismod, sit amet accumsa</span>
<br>
<span class="blogpost_list">Sed varius velit sit amet tortor interdum tincidunt.</span>


<ul class="nav nav-tabs blogpost-tab-wrap" role="tablist">
<li class="nav-item blogpost-nav-tab">
<a class="nav-link active" data-toggle="tab" href="#comments" role="tab">Comments</a>
</li>
<li class="nav-item blogpost-nav-tab">
<a class="nav-link" data-toggle="tab" href="#write-comment" role="tab">Write a Comment</a>
</li>
</ul>
<div class="clearfix"></div>
<div class="blogpost-tabs">

<div class="tab-content">
<div class="tab-pane active" id="comments" role="tabpanel">
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-2">
<div class="blodpost-tab-img">
<img src="{{url('images/admission-detail/admission_testi-img.jpg')}}" alt="#">
</div>
</div>
<div class="col-md-10">
<div class="blogpost-tab-description">
<h6>Hanna Gover</h6>
<p>Hey, Great Article, i have read it so many times and felt in love with it Sunt in culpa qui officia deserunt mollit anim id est laborum</p>
<p class="blogpost-rply"><a href="#">Reply</a> <span>few hours ago</span></p>
</div>
<hr>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-2">
<div class="blodpost-tab-img">
<img src="{{url('images/admission-detail/admission_testi-img.jpg')}}" alt="#">
</div>
</div>
<div class="col-md-10">
<div class="blogpost-tab-description">
<h6>Hanna Gover</h6>
<p>Hey, Great Article, i have read it so many times and felt in love with it Sunt in culpa qui officia deserunt mollit anim id est laborum</p>
<p class="blogpost-rply"><a href="#">Reply</a> <span>March 28</span> </p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="write-comment" role="tabpanel">
<form action="#">
<div class="row">
<div class="col-6">
<div class="form-group">
<label>Full Name</label>
<input type="text" class="form-control" placeholder="Full Name">
</div>

</div>
<div class="col-6">
<div class="form-group">
<label>Email ID</label>
<input type="email" class="form-control" placeholder="Email ID">
</div>

</div>
<div class="col-12">
<div class="form-group">
<label>Your Comments</label>
<textarea class="form-control" rows="6"> </textarea>
</div>

</div>
<div class="col-12">
<input type="submit" value="Submit Comment" class="btn btn-warning" />
</div>

</div>
</form>
</div>
</div>
</div>
</div> --}}
</div>
<div class="col-md-4">
{{-- <form>
<input type="text" placeholder="Search" class="blog-search">
<a href="#" class="btn btn-warning btn-blogsearch">SEARCH</a>
</form> --}}
{{-- <div class="blog-category_block">
<h3>Category</h3>
<ul>
<li><a href="#">Vivamus elementum elit<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
<li><a href="#">Maecenas ut dui at lorem <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
<li><a href="#">Quisque quis libero quis augue <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
<li><a href="#">Curabitur consequat odio<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
<li><a href="#">Aliquam tristique turpis<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
</ul>
</div> --}}
{{-- <div class="blog-featured_post">
<h3>Featured Post</h3>
<div class="blog-featured-img_block">
<img src="{{url('images/blog/blogpost-img_01.jpg')}}" class="img-fluid" alt="blog-featured-img">
<h5>Heading</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typeset</p>
</div>
<hr>
</div>
<div class="blog-featured_post">
<div class="blog-featured-img_block">
<img src="{{url('images/blog/blogpost-img_02.jpg')}}" class="img-fluid" alt="blog-featured-img">
<h5>Heading</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typeset</p>
</div>
<hr>
</div>
<div class="blog-featured_post">
<div class="blog-featured-img_block">
<img src="{{url('images/blog/blogpost-img_03.jpg')}}" class="img-fluid" alt="blog-featured-img">
<h5>Heading</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typeset</p>
</div>
</div> --}}
{{-- <div class="blog-tags_wrap">
<div class="row">
<div class="col-md-12">
<h3>Tags</h3>
</div>
<a href="#" class="blog-tags">
<span>Education</span>
</a>
<a href="#" class="blog-tags">
<span>Calass</span>
</a>
<a href="#" class="blog-tags">
<span>Seat</span>
</a>
<a href="#" class="blog-tags">
<span>Teachers</span>
</a>
<a href="#" class="blog-tags">
<span>Library</span>
</a>
<a href="#" class="blog-tags">
<span>Food</span>
</a>
</div>
</div> --}}
</div>
</div>
</div>
</section>


{{-- <div id="instafeed"></div> --}}
@endsection
