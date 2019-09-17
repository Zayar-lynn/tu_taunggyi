@extends('admin.layouts.site_admin.site_admin_design')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    @endsection
@section('nav_bar_text')

@endsection
@section('content')
    <div class="content">
      <h3>Teacher Detail</h3>
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                          <div class="table-responsive">
                                  <table class="table table-hovered table-bordered">
                                    <tbody>
                                      <tr>
                                          <td><b>Photo</b></td>
                                          <td>
                                              <img src="{{$detail->photo_url}}" width="200px;" alt="">
                                          </td>
                                      </tr>
                                      <tr>
                                        <td><b>Name</b></td>
                                        <td>{{$detail->name}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Phone</b></td>
                                        <td>{{$detail->phone}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Email</b></td>
                                        <td>{{$detail->email}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Address</b></td>
                                        <td>{{$detail->address}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Position</b></td>
                                        <td>{{$detail->position}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Degree</b></td>
                                        <td>{{$detail->degree}}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Deparment</b></td>
                                          <td>{{$detail->department->name}}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Detail</b></td>
                                          <td>{{$detail->detail}}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Address</b></td>
                                          <td>{{$detail->address}}</td>
                                      </tr>

                                    </tbody>
                                  </table>
                                </div>
                  </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    @endsection
