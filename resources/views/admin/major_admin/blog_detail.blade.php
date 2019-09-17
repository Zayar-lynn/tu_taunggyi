@extends('admin.layouts.major_admin.site_admin_design')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    @endsection
@section('nav_bar_text')
Blog Detail
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                          <div class="table-responsive">
                                  <table class="table table-hovered">
                                    <tbody>
                                      <tr>
                                          <td><b>Photo</b></td>
                                          <td>
                                              <img src="{{$detail->photo_url}}" width="200px;" alt="">
                                          </td>
                                      </tr>
                                      <tr>
                                        <td><b>Title</b></td>
                                        <td>{{$detail->title}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Author</b></td>
                                        <td>{{$detail->account_name}}</td>
                                      </tr>
                                      <tr>
                                        <td><b>Description</b></td>
                                        <td>{!!$detail->description!!}</td>
                                      </tr>

                                    </tbody>
                                  </table>
                                </div>
                          </div>
                        </div>
                  </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    @endsection
