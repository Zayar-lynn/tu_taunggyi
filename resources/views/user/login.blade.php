@extends('user.layout.master')

@section('bunner')
@include('user.layout.banner')
@endsection

@section('title','Login')
@section('page_title','TU Taunggyi | Login')
@section('content')
  <!--Inner Content start-->
  <div class="inner-content loginWrp">
    <div class="container">
      <!--Login Start-->
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="login">
            @if(Session::has('success_msg'))
              <p style="color: green" class="col-sm-12">{{ session('success_msg') }}</p>

            @endif
            <div class="formint conForm">
              <form action="{{url('login')}}" method="post">
                {{ csrf_field() }}

                {{-- @if(!empty($company_id) && !empty($post_id))
                  <input type="hidden" value="{{$company_id}}" name="company_id">
                  <input type="hidden" value="{{$post_id}}" name="post_id">
                @endif --}}

                <div class="input-wrap">
                  <label class="">Email</label>
                  <input type="text" name="email" placeholder="User Name" class="form-control" required>
                </div>
                <div class="input-wrap">
                  <label class="">Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <br>
                <div class="sub-btn">
                  <input type="submit" class=" btn btn-success" value="Login">
                </div>
              {{-- <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="{{url('register')}}">Register Here</a></div> --}}
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>

      <!--Login End-->
  </div>
  </div>
  <!--Inner Content End-->


{{-- <div id="instafeed"></div> --}}
@endsection
@section('script')
@if(Session::has('error_msg'))
<script>
  toastr.error("{{Session('error_msg')}}");
</script>
@endif
@endsection