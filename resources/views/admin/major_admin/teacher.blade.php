@extends('admin.layouts.site_admin.site_admin_design')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .imagePreview {
            width: 100%;
            height: 200px;
            background-position: center center;
            background:url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        
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
Teacher
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
                                            Photo
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>
                                          Degree
                                        </th>
                                        <th>
                                            Department
                                        </th>
                                        <th>Action</th>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Insert Form</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="insert_teacher" enctype="multipart/form-data" class="md-form">
                              {{csrf_field()}}

                                <div class="row">
                                  <div class="col-sm-4 imgUp">
                                      <img id="image" class="imagePreview">
                                        <label for="upload_photo" class="btn btn-primary rounded-0 text-white btn-md m-0 container-fluid" id="image_id">Upload</label>
                                        <input type="file" name="photo" onchange="displaySelectedPhoto('upload_photo','image')" style="display:none;" id="upload_photo" required>
                                  </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" required>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="degree">Phone</label>
                                                    <input type="number" name="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="degree">Degree</label>
                                                    <input type="text" name="degree" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="degree">Position</label>
                                                    <input type="text" name="position" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="detail">Department</label>
                                          <select class="form-control" name="department">
                                                    @if(count($departmaents)>0)
                                                      @foreach($departmaents as $key=>$data)
                                                        <option value="{{$key}}">{{$data}}</option>
                                                      @endforeach
                                                    @endif
                                              </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="detail">Detail</label>
                                          <textarea name="detail" rows="4" class="form-control" id="detail" required></textarea>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="address">Address</label>
                                          <textarea name="address" rows="4" class="form-control" id="address" required></textarea>
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-success rounded-0 pull-right">Add</button>
                              <div class="clearfix"></div>
                          </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
                <div class="modal fade" id="edit_modalBox">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Form</h4>
                                <button data-dismiss="modal" class="close">&times;</button>
                            </div>
                            <div class="modal-body">
                            <form id="update_data" enctype="multipart/form-data" class="md-form">
                              {{csrf_field()}}
                                <input type="hidden" name="id" class="hidden_id">
                                <div class="row">
                                  <div class="col-sm-4 imgUp">
                                      <img id="image_edit" class="imagePreview">
                                        <label for="upload_edit_photo" class="btn btn-primary rounded-0 text-white btn-md m-0 container-fluid" id="image_edit">Upload</label>
                                        <input type="file" name="photo" onchange="displaySelectedPhoto('upload_edit_photo','image_edit')" style="display:none;" id="upload_edit_photo">
                                  </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control edit_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree">Email</label>
                                                <input type="email" name="email" id="email" class="form-control edit_email" required>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="degree">Phone</label>
                                                    <input type="number" name="phone" class="form-control edit_phone">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="degree">Degree</label>
                                                    <input type="text" name="degree" class="form-control edit_degree">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="degree">Position</label>
                                                    <input type="text" name="position" class="form-control edit_position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="detail">Department</label>
                                          <select class="form-control edit_department" name="department">
                                                    @if(count($departmaents)>0)
                                                      @foreach($departmaents as $key=>$data)
                                                        <option value="{{$key}}">{{$data}}</option>
                                                      @endforeach
                                                    @endif
                                              </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="detail">Detail</label>
                                          <textarea name="detail" rows="4" class="form-control edit_detail" id="detail" required></textarea>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="address">Address</label>
                                          <textarea name="address" rows="4" class="form-control edit_address" id="address" required></textarea>
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-outline-info rounded-0 pull-right">Change</button>
                              <div class="clearfix"></div>
                          </form>
                            </div>
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
            var t=$("#datatable").DataTable({
                "ordering": false,
                // "paging": false,
                "bInfo" : false,
                // "bPaginate": false,
                "bLengthChange": false
                // "bFilter": true,
                // "bAutoWidth": false
            });

          function load(){
                $.ajax({
                  type: "get",
                  url: "{{url('get_all_teacher')}}",

                  cache: false,
                  success: function(data){
                    var data_return=JSON.parse(data);
                    //console.log(data);
                    t.clear();
                    var no = 1;
                    for(var i = 0;i<data_return.length;i++){
                      var link=window.location.href+"/detail/"+data_return[i]['id'];
                        t.row.add( [
                            no++,
                            '<img src="'+data_return[i]['photo_url']+'" alt="" style="width:100px;height:100px">',
                            data_return[i]['name'],
                            data_return[i]['email'],
                            data_return[i]['address'],
                            data_return[i]['degree'],
                            data_return[i]['department']['name'],
                            '<a href="'+link+'" class="btn btn-primary btn-sm">Detail</a>',
                            '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>',
                            '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                        ] ).draw( false );
                    }

                      $('#insert_teacher')[0].reset();
                      $('#image').attr('src','http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');

                  }
                });
            }
        $(document).ready( function () {
            function reset(){
                $('#update_data')[0].reset();
            }

            load();
            $(document).on('submit','#insert_teacher',function(event){
                event.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('insert/teacher')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                    toastr_success("Teacher add successful");
                    $("#insert_teacher")[0].reset();
                    $("#image_id").attr('src',"{{asset('images/default.jpg')}}");
                    load();
                  }
                }).fail(function(error){
                    console.log(error);
                });
            });

            delete_data=function(id){
            if(confirm('Are you sure You want to delete!')){
                $.ajax({
                        type: "POST",
                        url: "{{url('delete/teacher')}}/"+id,
                        data : { "_method" : "delete"} ,
                        cache: false,
                        success: function(data){
                            toastr.success('Teacher data delete successful');
                            load();
                        }
                    });
                }
            }

            edit_data=function(id){
                $.ajax({
                  type: "get",
                  url: "{{url('/edit/teacher/')}}/"+id,
                  cache: false,
                  success: function(data){
                    var department=JSON.parse(data);
                    // console.log(department);
                    //console.log(blog);
                    $("#image_edit").attr("src", department['photo_url']);
                    $('.hidden_id').val(department['id']);
                    $('.edit_name').val(department['name']);
                    $(".edit_position").val(department['position']);
                    $(".edit_email").val(department['email']);
                    $(".edit_address").val(department['address']);
                    $(".edit_phone").val(department['phone']);
                    $('.edit_degree').val(department['degree']);
                    $('.edit_department').val(department['department_id']);
                    $('.edit_detail').val(department['detail']);
                    // console.log(department['detail']);
                    $('.edit_address').val(department['address']);
                    $('#edit_modalBox').modal('show');
                  }
                }).fail(function(error){
                    console.log(error);
                });
            }

            $('#update_data').on('submit',function (e)
            {
                e.preventDefault();
                var updateData = new FormData(this);
                $.ajax
    		        ({
    		            type: 'POST',
    		            url: "{{url('update/teacher')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				    contentType: false,
    		            success: function(data){
    		            $('#edit_modalBox').modal('hide');
                        toastr_success("Teacher data change successful");
          				load();
          				}
    		        }).fail(function(error){
                        console.log(error);
                    });
              });
            });
    </script>
    @endsection
