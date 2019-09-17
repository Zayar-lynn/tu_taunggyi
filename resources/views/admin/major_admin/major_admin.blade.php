@extends('admin.layouts.site_admin.site_admin_design')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .imagePreview {
            width: 100%;
            height: 150px;
            background-position: center center;
            background:url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        .upload_btn
        {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>
    @endsection
@section('nav_bar_text')
Major Register
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- insert_model --}}
        <div class="modal fade" id="modalBox">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Major Register Form</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="insert_major" enctype="multipart/form-data" class="md-form">
                              {{csrf_field()}}

                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="" id="name" class="form-control" required>
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="email">Email</label>
                                          <input type="email" name="email" value="" id="email" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="password">Password</label>
                                          <input type="password" name="password" value="" id="password"  class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="">Major</label>
                                          <select class="form-control" name="major_type">
                                              <option value="">-- Select Major --</option>
                                              <option value="civil">Civil Department</option>
                                              <option value="electrical">Electrical Department</option>
                                              <option value="electrical_power">Electrical Power Department</option>
                                              <option value="mechanical_power">Mechanical Power Department</option>
                                              <option value="it">Information Technology Department</option>
                                              <option value="mining">Mining Department</option>
                                              <option value="myanmar">Myanmar</option>
                                              <option value="english">English</option>
                                              <option value="mathematics">Mathematics</option>
                                              <option value="chemistry">Chemistry</option>
                                              <option value="physic">Physic</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Create</button>
                              <div class="clearfix"></div>
                          </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
                <div class="modal fade" id="edit_modalBox">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Form</h4>
                                <button data-dismiss="modal" class="close">&times;</button>
                            </div>
                            <div class="modal-body">


                                <form id="update_data">
                                    {{csrf_field()}}


                                    <div class="row">
                                        <div class="col-md-12">
                                          <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                          <div class="form-group">
                                              <label for="update_name">Name</label>
                                              <input type="text" name="name" value="" id="update_name" class="form-control" required>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_email">Email</label>
                                                <input type="email" name="email" value="" id="update_email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Major</label>
                                                <select class="form-control" name="type" id="update_major_type">
                                                    <option value="">-- Select Major --</option>
                                                    <option value="civil">Civil Department</option>
                                                    <option value="electrical">Electrical Department</option>
                                                    <option value="electrical_power">Electrical Power Department</option>
                                                    <option value="mechanical_power">Mechanical Power Department</option>
                                                    <option value="it">Information Technology Department</option>
                                                    <option value="mining">Mining Department</option>
                                                    <option value="myanmar">Myanmar</option>
                                                    <option value="english">English</option>
                                                    <option value="mathematics">Mathematics</option>
                                                    <option value="chemistry">Chemistry</option>
                                                    <option value="physic">Physic</option>
                                                </select>
                                            </div>
                                    </div>
                                  </div>
                                    <button class=" btn btn-primary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary pull-right" id="update_btn">Update</button>

                            </form>
                        </div>
                    </div>
                </div>

    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
    $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $(document).ready( function () {
            var t=$("#datatable").DataTable({
                "ordering": false,
                // "paging": false,
                "bInfo" : false,
                // "bPaginate": false,
                "bLengthChange": false
                // "bFilter": true,
                // "bAutoWidth": false
            });

            function reset(){
                $('#update_data')[0].reset();
            }

            load();

            function load(){
                $.ajax({
                  type: "POST",
                  url: "{{url('get_all_major_admin')}}",

                  cache: false,
                  success: function(data){
                    var data_return=JSON.parse(data);
                    //console.log(data);
                    t.clear();
                    var no = 1;
                    for(var i = 0;i<data_return.length;i++){
                        t.row.add( [
                            no++,
                            data_return[i]['name'],
                            data_return[i]['email'],
                            data_return[i]['type'],
                            '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>',
                            '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                        ] ).draw( false );
                    }

                      $('#insert_major')[0].reset();
                      $('#image').attr('src','http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');

                  }
                });
            }

            $('#insert_major').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('insert/major_admin')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                    //alert(data);
                    $('#modalBox').modal('hide');
                    load();
                  }
                });
                return false;
            });

            delete_data=function(id){
            if(confirm('Are you sure You want to delete!')==true){
                $.ajax({
                        type: "POST",
                        url: "../delete/major_admin/"+id,

                        cache: false,
                        success: function(data){
                            alert('Success');
                            load();
                        }
                    });
                }else{
                    return false;
                }
            }

            edit_data=function(id){

                $.ajax({
                  type: "POST",
                  url: "../edit/major_admin/"+id,

                  cache: false,
                  success: function(data){
                    reset();
                    var major_date=JSON.parse(data);

                    //console.log(blog);
                    $('#id_edit').val(major_date['id']);
                    $('#update_name').val(major_date['name']);
                    $('#update_email').val(major_date['email']);
                    $('#update_major_type').val(major_date['type']);

                    $('#edit_modalBox').modal('show');
                  }
                });
            }

            $('#update_data').on('submit',function (e)
            {
                e.preventDefault();
                var updateData = new FormData(this);
                $.ajax
    		        ({
    		            type: 'POST',
    		            url: "{{url('update/major_admin')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				    contentType: false,
    		            success: function(data){
                        //console.log(data);
                        //alert(data);
    		            $('#edit_modalBox').modal('hide');
          				  	load();
          				  }
    		        });
    		        return false;
              });
            });
    </script>
    @endsection
