@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Gallery')
@section('page_title','TU Taunggyi | Gallery')
@section('content')
<div class="gallery-wrap">
<div class="container">
<div class="row">
<div class="col-md-12">
<h3><i>Our Gallery</i></h3><hr>
</div>
</div>
<div class="row">

@foreach ($gallery_arr as $gallery)
<div class="col-md-4">
  <a href="{{$gallery->photo_url}}" class="grid image-link" data-fancybox="gallery">
    <figure class="effect-bubba gallery-img-wrap">
      <img src="{{$gallery->photo_url}}" class="img-fluid" alt="#" style="width:100%;height:250px">
      <figcaption>
        {{--<p><i class="fa fa-search-plus fa-2x" aria-hidden="true"></i></p>--}}
      </figcaption>
    </figure>
  </a>
</div>
@endforeach

</div>
<!-- Pagination -->
        <div class="pagiWrap">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="showreslt">Showing 1-9</div>
            </div>
            <div class="col-md-8 col-sm-6">
              {{$paginate->links()}}
            </div>
          </div>
        </div>
<br>
<br>


</div>
</div>
@endsection
