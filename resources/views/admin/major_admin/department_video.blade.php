@extends('admin.layouts.major_admin.site_admin_design')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <style>
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
    </style> --}}
    @endsection
@section('nav_bar_text')
<h3>Upload Videos</h3>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <video controls id="update_dep_video">
                                        <source src="" type="video/mp4">
                                    </video>
                                </div>
                                <form id="update_data" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" id="id_edit" name="id">
                                    <div class="col-md-12">
                                        <input type="file" name="department_video" accept="video/mp4">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" id="update_btn">Update</button>
                                    </div>
                                </form>
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
                  url: "{{url('get_department_video')}}",

                  cache: false,
                  success: function(data){
                    reset();
                    var data_return=JSON.parse(data);
                    console.log(data_return);
                    $('#id_edit').val(data_return['id']);
                    $('#update_dep_video').attr("src", data_return['video_url']);
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
    		            url: "{{url('major/update/department_video')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				    contentType: false,
    		            success: function(data){
                        console.log(data);
                        //alert(data);
                            toastr_success('Update video successful');
          				  	load();
          				}
    		        });
    		        return false;
              });
            });
    </script>
    @endsection
