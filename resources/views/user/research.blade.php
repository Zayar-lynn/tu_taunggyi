@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Research')
@section('page_title','TU Taunggyi | Research')
@section('content')
<section class="research">
<div class="container">
<div class="row">

<div class="col-md-12 table-responsive">
  <table class="table table-bordered">
    <thead>
      <th>No</th>
      <th>Name of peer</th>
      <th>Research title</th>
      <th>Author</th>
      <th>Sbject</th>
      <th>Year</th>
      <th>PDF</th>
    </thead>
    <tbody>
      @php
        $no = 1;
      @endphp
      @foreach ($researchs1 as $research)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$research->name_of_peer}}</td>
        <td>{{$research->research_title}}</td>
        <td>{{$research->author}}</td>
        <td>{{$research->subject}}</td>
        <td>{{$research->year}}</td>
        <td><a class="btn btn-primary" href="{{$research->pdf_url}}" target="_blank">PDF</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</section>








{{-- <div id="instafeed"></div> --}}
@endsection
