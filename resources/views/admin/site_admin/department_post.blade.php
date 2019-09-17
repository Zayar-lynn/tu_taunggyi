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
            /* box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2); */
        }
        .upload_btn
        {
            display:block;
            border-radius:10px;
            /* box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2); */
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>
    @endsection
@section('nav_bar_text')
<h3>Department Post</h3>
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
                                            Title
                                        </th>
                                        <th>
                                          Department
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th></th>
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
                        <h4 class="modal-title">Create New Department Post</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="insert_department_post" enctype="multipart/form-data" class="md-form">
                              {{csrf_field()}}

                              <div class="row">
                                  <div class="col-sm-6 imgUp">
                                      <img src="{{asset('images/default.jpg')}}" id="image" class="imagePreview img-thumbnail">
                                      <label class="btn btn-primary upload_btn">
                                          Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('upload_photo','image')" id="upload_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" required>
                                      </label>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <textarea name="title" id="title" class="form-control" required rows="1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <select name="deparment_type" id="" class="form-control">
                                                  <option value="">Department Type</option>
                                                  @foreach($departments as $department)
                                                      <option value="{{$department['name']}}">{{$department['name']}}</option>
                                                  @endforeach
                                              </select>
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          {{-- <label for="des">Description</label> --}}
                                          <textarea name="des" rows="8" class="form-control" id="summernote" required></textarea>
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
                                <h4 class="modal-title">Edit Department Post</h4>
                                <button data-dismiss="modal" class="close">&times;</button>
                            </div>
                            <div class="modal-body">


                                <form id="update_data">
                                    {{csrf_field()}}

                                    <div class="row">
                                      <div class="col-sm-6">
                                        <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                        <img src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="" id="imgs" class="imagePreview" style="width: 100%;height: 150px;">
                                        <label class="btn btn-primary upload_btn">
                                            Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_photo','imgs')" id="update_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="update_title">Title</label>
                                                    <textarea name="title" id="update_title" class="form-control" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <select name="deparment_type" id="update_department" class="form-control">
                                                      <option value="">Department Type</option>
                                                      @foreach($departments as $department)
                                                          <option value="{{$department['name']}}">{{$department['name']}}</option>
                                                      @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{-- <label for="update_des
                                                ">Description</label> --}}
                                                <textarea name="des" rows="8" class="form-control" id="update_des"></textarea>
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
                  url: "{{url('get_all_department_post')}}",

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
                            data_return[i]['title'],
                            data_return[i]['department_name'],
                            //data_return[i]['description'].substr(0,100),
                            data_return[i]['description'].replace(/(<([^>]+)>)/ig,"").length > 40 ? data_return[i]['description'].replace(/(<([^>]+)>)/ig,"").substring(0,40)+'.....' : data_return[i]['description'],
                            '<a href="'+link+'" class="btn btn-primary btn-sm">Detail</a>',
                            '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>',
                            '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                        ] ).draw( false );
                    }

                      $('#insert_department_post')[0].reset();
                      $('#image').attr('src','{{asset('images/default.jpg')}}');

                  }
                });
            }

            $('#insert_department_post').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('insert/department_post')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                    //alert(data);
                    $("#summernote").summernote('reset');
                    $('#modalBox').modal('hide');
                    toastr_success('Insert department post data successful');
                    load();
                  }
                });
                return false;
            });

            delete_data=function(id){
            if(confirm('Are you sure You want to delete!')==true){
                $.ajax({
                        type: "POST",
                        url: "../delete/department_post/"+id,

                        cache: false,
                        success: function(data){
                            toastr_success('Delete department post data successful');
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
                  url: "../edit/department_post/"+id,

                  cache: false,
                  success: function(data){
                    reset();
                    var dep_post=JSON.parse(data);

                    //console.log(blog);
                    $("#imgs").attr("src", dep_post['photo_url']);
                    $('#id_edit').val(dep_post['id']);
                    $('#update_title').val(dep_post['title']);
                    //$('#update_des').html(dep_post['description']);
                    $('#update_des').summernote({
                        height : "150px",
                        toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['style','bold', 'italic', 'underline', 'clear','fontname','fontsize','paragraph']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['view', ['fullscreen', 'codeview', 'help']],
                    ],
                    });
                    $('#update_des').summernote('code',dep_post['description']);
                    $('#update_department').val(dep_post['department_name']);

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
    		            url: "{{url('update/department_post')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				    contentType: false,
    		            success: function(data){
                        //console.log(data);
                        //alert(data);
                        $("#summernote").summernote('reset');
    		            $('#edit_modalBox').modal('hide');
                            toastr_success('Update department post data successful');
          				  	load();
          				  }
    		        });
    		        return false;
              });

              // start summernote
              $("#summernote").summernote({
                height : "150px",
                placeholder: 'Description',
              });

              $(document).on('click','.note-btn',function(){
                $(".note-group-select-from-files label").text("Upload image");
                $(".note-group-select-from-files label").attr('class','btn btn-primary');
                $(".note-group-select-from-files label").attr("for","photo_summernote");
                $(".note-group-select-from-files input:file").attr("id","photo_summernote");
              });
            });
    </script>
    @endsection
