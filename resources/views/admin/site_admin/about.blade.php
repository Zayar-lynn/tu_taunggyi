@extends('admin.layouts.site_admin.site_admin_design')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .imagePreview {
            width: 100%;
            height: 150px;
        }
        .upload_btn
        {
            display:block;
            border-radius:10px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>
    @endsection
@section('nav_bar_text')
<h3>About Us</h3>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <form id="update_data">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-sm-4">
                                    <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                    <img src="" alt="" id="imgs" class="imagePreview img-thumbnail" style="width: 100%;height: 200px;">
                                    <label class="btn btn-primary upload_btn">
                                        Upload<input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_photo','imgs')" id="update_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_phone"><b>Phone</b></label>
                                                <textarea name="phone" id="update_phone" class="form-control" rows="1"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_email"><b>Email</b></label>
                                                <textarea name="email" id="update_email" class="form-control" rows="1"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="update_address
                                            "><b>Address</b></label>
                                            <textarea name="address" rows="4" class="form-control" id="update_address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="update_about
                                            "><b>About</b></label><br>
                                            <textarea name="about" rows="8" class="form-control" id="update_about"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="update_vision
                                            "><b>Vision</b></label><br>
                                            <textarea name="vision" rows="8" class="form-control" id="update_vision"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="update_mission
                                            "><b>Mission</b></label><br>
                                            <textarea name="mission" rows="8" class="form-control" id="update_mission"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right" id="update_btn">Update</button>
                            </form>
                        </div>
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
          function reset(){
              $('#update_data')[0].reset();
          }
            load();

            function load(){
                $.ajax({
                  type: "POST",
                  url: "{{url('get_all_about')}}",

                  cache: false,
                  success: function(data){
                    reset();
                    var data_return=JSON.parse(data);
                    //console.log(data_return);
                    $("#imgs").attr("src", data_return['photo_url']);
                    $('#id_edit').val(data_return['id']);
                    $('#update_phone').val(data_return['phone']);
                    $('#update_email').val(data_return['email']);
                    $('#update_address').html(data_return['address']);
                    // $('#update_about').html(data_return['about']);
                    // $('#update_vision').html(data_return['vision']);
                    // $('#update_mission').html(data_return['mission']);
                    $('#update_about').summernote('code',data_return['about']);
                    $('#update_vision').summernote('code',data_return['vision']);
                    $('#update_mission').summernote('code',data_return['mission']);
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
    		            url: "{{url('update/about')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				    contentType: false,
    		            success: function(data){
                        //console.log(data);
                        toastr_success('Update data successful');
          				  	load();
          				  }
    		        });
    		        return false;
              });

              // start summernote
              $("#update_about").summernote({
                height : "150px",
                placeholder: 'About',
              });

              $("#update_vision").summernote({
                height : "150px",
                placeholder: 'Vision',
              });

              $("#update_mission").summernote({
                height : "150px",
                placeholder: 'Mission',
              });
            });
    </script>
    @endsection
