@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Our Teachers')
@section('page_title','TU Taunggyi | Our Teachers')
@section('content')
<section class="blog-wrap">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="blog-single-item">
            <div class="blog-img_block">
                <img src="{{asset('/upload/teacher/'.$professor->photo)}}" class="img-fluid" alt="blog-img" style="width:350px;; height:200px;">
            </div>
            <div class="blog-tiltle_block">
            <h4><a href="#">Professor</a></h4>
            <h6> <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>{{$professor->name}}</span> </a> | <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>{{$professor->degree}}</span></a></h6>
            {{$professor->detail}}
            </div>
            </div>
        <hr>
        

            <div class="blog-single-item">
            <div class="blog-img_block">
                <img src="{{asset('/upload/teacher/'.$associate_professor->photo)}}" class="img-fluid" alt="blog-img" style="width:350px;; height:200px;">
            </div>
            <div class="blog-tiltle_block">
            <h4><a href="#">Associate Professor</a></h4>
            <h6> <a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>{{$associate_professor->name}}</span> </a> | <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>{{$associate_professor->degree}}</span></a></h6>
            {{$associate_professor->detail}}
            </div>
            </div>
        <hr>
</div>
        <div class="col-md-4">
        {{-- <form action="search.php" method="post">
        <input type="text" placeholder="Search" name="search" class="blog-search">
        <button type="submit" name="submit" class="btn btn-warning btn-blogsearch">SEARCH</button>
        </form> --}}
         <div class="blog-category_block">
        <h3>ALL Department</h3>
        <ul>
            @foreach ($department_name as $data)
                <li><a href="{{url('/show_data_detail/'.$data->id)}}">{{$data->name}}<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
            @endforeach
        </ul>
        </div>

        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-3 text-center">Department Leaders</h2>
        </div>
    </div>

    <br>

    <div class="row">
        @foreach ($department_leader as $data)
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="our-teachers-block">
                <a href="{{url('/teachers-single/'.$data->id)}}"><img src="{{asset('/upload/teacher/'.$data->photo)}}" class="img-fluid teachers-img" width="210px" height="310" alt="#"></a>
                    <div class="teachers-description">
                    <p><a href="{{url('/teachers-single/'.$data->id)}}"><strong>{{$data->name}}</a></strong>
                    <br> {{$data->head_of_department}}
                    </p>
                    <hr>
                    <p>Syllabus : <a href=""><span>
                        {{substr($data->detail,0,50)}}
                        {{strlen($data->detail) > 50 ? '...' : '' }}
                    </span></a></p>
                    <div class="social-icons">
                    <ul>
                    <li><a href="{{$data->fb_link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    </ul>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>


{{-- <div id="instafeed"></div> --}}
@endsection
