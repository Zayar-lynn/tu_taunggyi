@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Academic')
@section('page_title','TU Taunggyi | Academic')
@section('content')
<section class="research">
<div class="container">
<div class="row">
  <div class="col-md-12">
    <h3 align="center">Technology University ( Taunggyi )</h3>
  </div>
<div class="col-md-12">
    <h4 align="center">Finished Students List</h4>
</div>
<div class="col-md-12">
  <table class="table table-bordered">
    <thead>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Degree</th>
      <th style="text-align: center;">Year</th>
      <th style="text-align: center;">Total Students</th>
    </thead>
    <tbody>
      @php
        $no = 1;
      @endphp
      @foreach ($finishstudent as $data)
      <tr>
        <td align="center">{{$no++}}</td>
        <td align="center">{{$data->degree_name}}</td>
        <td align="center">
          ( From {{substr($data->start,0,4)}}, 
            @php
                 $month = substr($data->start,5,3);
                 switch ($month) {
				 					case '01-':
				 						echo "January ";
				 						break;

				 					case '02-':
				 						echo "Febuary ";
				 						break;

				 					case '03-':
				 						echo "March ";
				 						break;

				 					case '04-':
				 						echo "April ";
				 						break;

				 					case '05-':
				 						echo "May ";
				 						break;

				 					case '06-':
				 						echo "June ";
				 						break;

				 					case '07-':
				 						echo "July ";
				 						break;

				 					case '08-':
				 						echo "August ";
				 						break;

				 					case '09-':
				 						echo "September ";
				 						break;

				 					case '10-':
				 						echo "October ";
				 						break;

				 					case '11-':
				 						echo "Novenber ";
				 						break;

				 					case '12-':
				 						echo "December ";
				 						break;

				 					default:

				 						break;
				 				}
            @endphp
          To {{substr($data->end,0,4)}}, 
              @php
                $month = substr($data->end,5,3);
                  switch ($month) {
                    case '01-':
                      echo "January ";
                      break;

                    case '02-':
                      echo "Febuary ";
                      break;

                    case '03-':
                      echo "March ";
                      break;

                    case '04-':
                      echo "April ";
                      break;

                    case '05-':
                      echo "May ";
                      break;

                    case '06-':
                      echo "June ";
                      break;

                    case '07-':
                      echo "July ";
                      break;

                    case '08-':
                      echo "August ";
                      break;

                    case '09-':
                      echo "September ";
                      break;

                    case '10-':
                      echo "October ";
                      break;

                    case '11-':
                      echo "Novenber ";
                      break;

                    case '12-':
                      echo "December ";
                      break;

                    default:

                      break;
                  }
            @endphp)
        </td>
        <td align="center">( {{$data->total}} ) Students</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div><hr>
<br><br>
    <div class="row">
      <div class="col-md-12">
        <h3 align="center">Technology University ( Taunggyi )</h3>
      </div>
        <div class="col-md-12">
            <h4 align="center">Current Students List</h4>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-responsive">
                <thead>
                   <tr>
                       <th> </th>
                       <th colspan="3" style="text-align: center;">FirstYear</th>
                       <th colspan="3" style="text-align: center;">SecondYear</th>
                       <th colspan="3" style="text-align: center;">ThirdYear</th>
                       <th colspan="3" style="text-align: center;">FourthYear</th>
                       <th colspan="3" style="text-align: center;">FifthYear</th>
                       <th colspan="3" style="text-align: center;">SixthYear</th>
                   </tr>
                   <tr>
                       <th style="text-align: center;"> </th>
                       <th style="text-align: center;"> Male</th>
                       <th style="text-align: center;"> Female</th>
                       <th style="text-align: center;"> Total</th>
                       <th style="text-align: center;"> Male</th>
                       <th style="text-align: center;"> Female</th>
                       <th style="text-align: center;"> Total</th>
                       <th style="text-align: center;"> Male</th>
                       <th style="text-align: center;"> Female</th>
                       <th style="text-align: center;"> Total</th>
                       <th style="text-align: center;"> Male</th>
                       <th style="text-align: center;"> Female</th>
                       <th style="text-align: center;"> Total</th>
                       <th style="text-align: center;"> Male</th>
                       <th style="text-align: center;"> Female</th>
                       <th style="text-align: center;"> Total</th>
                       <th style="text-align: center;"> Male</th>
                       <th style="text-align: center;"> Female</th>
                       <th style="text-align: center;"> Total</th>

                   </tr>
                </thead>
                <tbody>
                    @foreach($current_students as $list)
                        {{--@if($list['major']=="Total")<hr>@endif--}}
                        <tr>
                            <th style="text-align: center;"> {{$list['major']}}</th>
                            @foreach($list['data'] as $item)
                                <td align="center">   {{$item['male']}} </td>
                                <td align="center">{{$item['female']}}</td>
                                <td align="center">{{$item['male']+$item['female']}}</td>
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
<div class="row">
    <div class="col-md-12">
        <h2 align="center">Course</h2>
    </div>

    @foreach ($courses as $course)
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
    <div class="courses_box mb-5">
      <div class="course-img-wrap">
        <img src="{{$course->photo_url}}" class="img-fluid" alt="courses-img" style="width:100%; height:200px;">
        <div class="courses_box-img">
          <div class="courses-link-wrap">
            <a href="{{url('/show_course_detail/'.$course->id)}}" class="course-link"><span>course Details </span></a>
          </div>
        </div>
      </div>
      <div class="courses_icon">
        <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
      </div>
      <a href="{{url('/show_course_detail/'.$course->id)}}" class="course-box-content">
        <h3>
          {{substr($course->course_name,0,12)}}
          {{strlen($course->course_name) > 12 ? '...' : '' }}
        </h3>
        <p>
          {{str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($course->course_detail)),40)}}
        </p>
       </a>
     </div>
  </div>
@endforeach
</div>
<br><br>
<div class="row">
    <div class="col-md-12">
      <h2 style="text-align: center;"><i>Gallery</i></h2>
            <div class="owl-carousel owl-theme">
                @foreach ($gallerys as $item)
                    {{-- <div class="item"><h4>{{$item->id}}</h4></div> --}}
                    <img src="{{$item->photo_url}}" class="img-fluid" alt="#" style="width:100%;height:200px">
                @endforeach
            </div>
    </div>
</div>
</div>
</section>





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


{{-- <div id="instafeed"></div> --}}
@endsection
