@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Blog')
@section('page_title','TU Taunggyi | Blog')
@section('content')
<section class="blog-wrap">
<div class="container">
<div class="row">


@foreach($blogs as $blog)
        <div class="col-md-4">
<div class="blog-single-item" style="box-shadow: 0px 0px 3px #000;">
<div>
<img src="{{$blog->photo_url}}" class="img-fluid" alt="blog-img" width="100%" style="max-height: 175px;min-height: 200px;">
{{--<div class="blog-date">--}}
{{--<span>--}}
{{--@php--}}
  {{--$date = $blog->created_at;--}}
  {{--$year = substr($date,2,2);--}}
	{{--$month = substr($date,4,4);--}}
	{{--$day = substr($date,8,2);--}}
  {{--echo $day.$month.$year;--}}

{{--@endphp--}}
{{--</span>--}}
{{--</div>--}}
</div>
<div style="padding: 10px;">
<h6 style="font-size: 18px;"><a href="{{url('/blog_detail/'.$blog->id)}}">{{$blog->title}}</a></h6>
{{-- <h6> <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>admin</span> </a> | <a href="#"><i class="fa fa-tags" aria-hidden="true"></i><span>Education</span></a></h6> --}}
<p>
  {{str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($blog->description)),100)}}
</p>
<a href="{{url('/blog_detail/'.$blog->id)}}">Read More</a>

</div>
</div>
        </div>
@endforeach

</div>
<div style="margin-top:40px;">
    <nav>
        <ul class="pagination justify-content-center">
            {{$blog_pagi->links()}}
        </ul>
    </nav>
</div>
<div class="col-md-4">
{{-- <form>
<input type="text" placeholder="Search" class="blog-search">
<button type="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
</form> --}}

{{-- <div class="blog-featured_post">
<h3>Featured Post</h3>
<div class="blog-featured-img_block">
<a href="#"> <img src="images/blog/blogpost-img_01.jpg" class="img-fluid" alt="blog-featured-img">
<h5>Heading</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typeset</p>
</a>
</div>
<hr>
</div>
<div class="blog-featured_post">
<div class="blog-featured-img_block">
<a href="#"> <img src="images/blog/blogpost-img_02.jpg" class="img-fluid" alt="blog-featured-img">
<h5>Heading</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typeset</p>
</a>
</div>
<hr>
</div>
<div class="blog-featured_post">
<div class="blog-featured-img_block">
<a href="#"><img src="images/blog/blogpost-img_03.jpg" class="img-fluid" alt="blog-featured-img">
<h5>Heading</h5>
<p>Lorem Ipsum is simply dummy text of the printing and typeset</p>
</a>
</div>
</div> --}}

</div>
</div>
</div>
</section>


{{-- <div id="instafeed"></div> --}}
@endsection
