@extends('admin.layouts.site_admin.site_admin_design')
@section('css')    
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
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <span style="font-size:20px;">Department Page</span><button type="button" name="button" class="btn btn-success rounded-0 pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <table class="table" id="depart_paginate">
                                   <thead class=" text-primary">
                                        <th>
                                           No
                                        </th>
                                        <th>
                                           Photo
                                        </th>
                                        <th>
                                           Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Head of Department
                                        </th>
                                        {{-- <th>
                                            Location
                                        </th> --}}
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                   </thead>
                               </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Insert modal depart  -->
        <div class="modal fade" id="modalBox">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Department</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="insert_department" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                                <input type="hidden" name="id" class="depart_hidden">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                  <div class="form-group">
                                    <img src="{{asset('images/default.jpg')}}" class="img-thumbnail" id="image_id" style="width: 100%;height: 150px;">
                                    <label class="btn btn-sm btn-primary container-fluid" for="photo">Upload</label>
                                    <input type="file" accept="image/png,image/jpeg,image/jpg" id="photo" name="photo" required class="form-control error_input_photo" onchange="displaySelectedPhoto('photo','image_id')">
                                        <span id="error_photo">

                                        </span>
                                  </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="department_leader">Head Of Department</label>
                                          <input type="text" name="head_of_department" id="department_leader" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                          {{-- <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="location">Location</label>
                                      <input type="text" name="location" id="location" class="form-control" required>
                                  </div>
                              </div>
                          </div> --}}
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" name="email" id="email" class="form-control" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="" id="password"  class="form-control" required>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="phone">Phone</label>
                                      <input type="number" name="phone" id="phone" class="form-control" required>
                                  </div>
                              </div>
                          </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="detail">Detail</label>
                                          <textarea name="description" rows="7" class="form-control" id="detail" required></textarea>
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-success rounded-0 pull-right" id="btn_submit">Create</button>
                              <div class="clearfix"></div>
                          </form>
                    </div>
                </div>
            </div>
        </div>

                <!-- Edit modal depart  -->
        <div class="modal fade" id="edit_modal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Department</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="update_department" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}
                                <input type="hidden" name="id" class="hidden_id">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                  <div class="form-group">
                                    <img src="{{asset('images/default.jpg')}}" class="img-thumbnail" id="image_edit_id" style="width: 100%;height: 150px;">
                                    <label class="btn btn-sm btn-primary container-fluid" for="photo_edit">Upload</label>
                                    <input type="file" accept="image/png,image/jpeg,image/jpg" id="photo_edit" name="photo" class="form-control error_input_photo" onchange="displaySelectedPhoto('photo_edit','image_edit_id')">
                                        <span id="error_photo">

                                        </span>
                                  </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control depart_name" required>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="department_leader">Head Of Department</label>
                                          <input type="text" name="head_of_department" id="department_leader" class="form-control depart_department" required>
                                      </div>
                                  </div>
                              </div>
                          {{-- <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="location">Location</label>
                                      <input type="text" name="location" id="location" class="form-control depart_location" required>
                                  </div>
                              </div>
                          </div> --}}
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" name="email" id="email" class="form-control depart_email" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="phone">Phone</label>
                                      <input type="number" name="phone" id="phone" class="form-control depart_phone" required>
                                  </div>
                              </div>
                          </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="detail">Description</label>
                                          <textarea name="description" rows="7" class="form-control depart_description" id="detail" required></textarea>
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-md btn-outline-info rounded-0 pull-right" id="btn_submit">Change</button>
                              <div class="clearfix"></div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function load(){
                let table=$('#depart_paginate').DataTable();
                table.clear();
                $.ajax({
                  type: "get",
                  url: "{{url('get_all_department')}}",
                  cache: false,
                  dataType : "json",
                  success: function(data){
                    if(data.length == 0){
                      let table=$('#depart_paginate').DataTable();
                      table.clear().draw();
                      }else{
                      $.each(data,function(index,depart){
                          let no=index+1;
                          let id=depart.id;
                          console.log(depart.name);
                          let name=depart.name;
                          let photo=depart.photo_url;
                          let email=depart.email;
                          //let location=depart.location;
                          let description=depart.description.length > 40 ? depart.description.substr(0,40)+"....." : depart.description;
                          let head_of_depart=depart.head_of_department;
                          let image='<img src="'+photo+'" style="width:70px;height:70px" class="img-thumbnail">';
                          let table=$('#depart_paginate').DataTable();
                          let td_generate='<a href="#" onclick="edit_depart('+id+')" data-target="#edit_modal" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="btn btn-sm btn-outline-info rounded-0 edit_depart">Edit</a>'+
                          '<button class="btn btn-sm rounded-0 btn-danger" onclick="delete_depart('+id+')" data-id="'+id+'">Delete</button>';
                          table.row.add([no,image,name,email,head_of_depart,description,td_generate]).draw();
                      });
                  }
                  }
                });
        }

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

            load(); // load data

            $('#insert_department').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('insert/department')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                    toastr_success("Department add successful");
                    $("#insert_department")[0].reset();
                    $("#image_id").attr('src',"{{asset('images/default.jpg')}}");
                    load();
                  }
                }).fail(function(error){
                    console.log(error);
                });
            });

            delete_depart=function(id){
                if(confirm("Are you sure")){
                    $.ajax({
                    type: "post",
                    url: "{{url('delete/department')}}/"+id,
                    DataType: "json",
                    data : { "_method" : "delete"} ,
                    cache: false,
                    success: function(data){
                      if(data){
                          toastr_success('Delete department data successful');
                          load();
                      }
                    }
                }).fail(function(error){
                    console.log(error);
                });
                }
            }

            edit_depart=function(id){
                $.ajax({
                  type: "Get",
                  url: "{{url('edit/department')}}/"+id,
                  DataType: "json",
                  cache: false,
                  success: function(data){
                    $(".hidden_id").val(data.id);
                    $(".depart_name").val(data.name);
                    $(".depart_email").val(data.email);
                    $(".depart_phone").val(data.phone);
                    $(".depart_location").val(data.location);
                    $("#image_edit_id").attr('src',data.photo_url);
                    $(".depart_description").val(data.description);
                    $(".depart_department").val(data.head_of_department);
                  }
                }).fail(function(error){
                    console.log(error);
                });
            }

            $('#update_department').on('submit',function (e)
            {
                e.preventDefault();
                var updateData = new FormData(this);
                $.ajax
    		        ({
    		            type: 'POST',
    		            url: "{{url('update/department')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				contentType: false,
    		            success: function(data){
                           if(data){
                                toastr_success("Department data change successful");
                                load();
                                $("#edit_modal").modal('hide');
                           }
          				}
    		        }).fail(function(error){
                        console.log(error);
                    });
              });
            });
    </script>
    @endsection
