@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Event')
@section('page_title','TU Taunggyi | Event')
@section('content')
<section class="events">
<div class="container">
<div class="row">
<div class="col-md-4">
<h2 class="event-title">Events</h2>
</div>
<div class="col-md-8">

<ul class="nav nav-tabs" role="tablist">
<li class="nav-item nav-tab1">
<a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events" role="tab">Upcoming events </a>
</li>
<li class="nav-item nav-special-br">
<a class="nav-link tab-list" data-toggle="tab" href="#completed-events" role="tab">Completed events </a>
</li>
{{-- <li class="nav-item"> <a class="nav-link tab-list" data-toggle="tab" href="#calander-view" role="tab"> Calander view </a>
</li> --}}
</ul>
</div>
</div>
<br>
<div class="row">

<div class="tab-content">
<div class="tab-pane active" id="upcoming-events" role="tabpanel">

@foreach($events as $event)
<div class="col-md-12" id="event_detail{{$event->id}}">
<div class="row">
<div class="col-md-2">
<div class="event-date">
<h4>{{substr($event->date,8)}}</h4>
<span>
  @php
    $date = $event->date;
                $year = substr($date,0,4);
				 				$month = substr($date,5,3);

				 				switch ($month) {
				 					case '01-':
				 						echo "January ".$year;
				 						break;

				 					case '02-':
				 						echo "Febuary ".$year;
				 						break;

				 					case '03-':
				 						echo "March ".$year;
				 						break;

				 					case '04-':
				 						echo "April ".$year;
				 						break;

				 					case '05-':
				 						echo "May ".$year;
				 						break;

				 					case '06-':
				 						echo "June ".$year;
				 						break;

				 					case '07-':
				 						echo "July ".$year;
				 						break;

				 					case '08-':
				 						echo "August ".$year;
				 						break;

				 					case '09-':
				 						echo "September ".$year;
				 						break;

				 					case '10-':
				 						echo "October ".$year;
				 						break;

				 					case '11-':
				 						echo "Novenber ".$year;
				 						break;

				 					case '12-':
				 						echo "December ".$year;
				 						break;

				 					default:

				 						break;
				 				}
  @endphp
</span>
</div>
<span class="event-time">{{$event->timing}}</span>
</div>
<div class="col-md-10">
<div class="event-heading">
<h3>{{$event->title}}</h3>
<p>{!!$event->description!!}</p>
</div>
<div id="event{{$event->id}}" class="panel-collapse collapse in">
<div class="panel-body">
<div class="event-hilights">
<h5>Event Highlights Photos</h5>
</div>
 <div class="row">
<div class="col-md-12">
	<div class=row>
			@foreach(unserialize($event->photo) as $imgs)
				<div class="col-md-4">
						<img src="{{asset('/upload/event/'.$imgs)}}" class="img-fluid" alt="event-img" style="width:100%;height:203px">
				</div>
			@endforeach
	</div>
</div>
</div>
</div>
</div><br>
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" class="event-toggle" data-parent="#accordion" href="#event{{$event->id}}">Show Details</a>
</h4>
</div>
</div>
</div>
<hr class="event-underline">
</div>
@endforeach

{{-- <div class="col-md-12 text-center">
<a href="#" class="btn btn-default btn-courses my-5">Show More</a>
</div> --}}
</div>
<div class="tab-pane" id="completed-events" role="tabpanel">

  @foreach($events_complete as $event)
  <div class="col-md-12">
  <div class="row">
  <div class="col-md-2">
  <div class="event-date">
  <h4>{{substr($event->date,8)}}</h4> <span>
    @php
      $date = $event->date;
                  $year = substr($date,0,4);
  				 				$month = substr($date,5,3);

  				 				switch ($month) {
  				 					case '01-':
  				 						echo "January ".$year;
  				 						break;

  				 					case '02-':
  				 						echo "Febuary ".$year;
  				 						break;

  				 					case '03-':
  				 						echo "March ".$year;
  				 						break;

  				 					case '04-':
  				 						echo "April ".$year;
  				 						break;

  				 					case '05-':
  				 						echo "May ".$year;
  				 						break;

  				 					case '06-':
  				 						echo "June ".$year;
  				 						break;

  				 					case '07-':
  				 						echo "July ".$year;
  				 						break;

  				 					case '08-':
  				 						echo "August ".$year;
  				 						break;

  				 					case '09-':
  				 						echo "September ".$year;
  				 						break;

  				 					case '10-':
  				 						echo "October ".$year;
  				 						break;

  				 					case '11-':
  				 						echo "Novenber ".$year;
  				 						break;

  				 					case '12-':
  				 						echo "December ".$year;
  				 						break;

  				 					default:

  				 						break;
  				 				}
    @endphp
  </span>
  </div>
  <span class="event-time">{{$event->timing}}</span>
  </div>
  <div class="col-md-10">
  <div class="event-heading">
  <h3>{{$event->title}}</h3>
  {{-- <p>{{$event->description}}</p> --}}
  <p>{!!$event->description!!}</p>
  </div>
  <div id="event{{$event->id}}" class="panel-collapse collapse in">
  <div class="panel-body">
  <div class="event-hilights">
  <h5>Event Highlights Photos</h5>
  </div>
   <div class="row">
  <div class="col-md-4">
  <img src="{{$event->photo_url}}" class="img-fluid" alt="event-img">
  </div>
  </div>
  </div>
  </div><br>
  <div class="panel-heading">
  <h4 class="panel-title">
  <a data-toggle="collapse" class="event-toggle" data-parent="#accordion" href="#event{{$event->id}}">Show Details</a>
  </h4>
  </div>
  </div>
  </div>
  <hr class="event-underline">
  </div>
  @endforeach

</div>
{{-- <div class="tab-pane" id="calander-view" role="tabpanel">
<div class="container">
<div class="row">
<div class="col-md-12">
<div id='calendar'></div>
</div>
</div>
</div>
</div> --}}
</div>
</div>
</div>
</section>


{{-- <div id="instafeed"></div> --}}
@endsection
