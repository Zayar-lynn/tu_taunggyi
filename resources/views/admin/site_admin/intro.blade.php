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
<h3>Intro Text</h3>
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
                                    <div class ="col-md-4 offset-4">
                                        <img src="" alt="" id="imgs" class="imagePreview img-thumbnail" style="width: 100%;height: 100px;">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="file" accept="image/png,image/jpeg,image/jpg" onchange="displaySelectedPhoto('update_photo','imgs')" id="update_photo" name="sign_photo" class="uploadFile img" value="Upload Photo">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" id="id_edit" name="id">
                                            <textarea name="text" rows="8" class="form-control" id="summernote"></textarea>
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
                  url: "{{url('get_intro_text')}}",

                  cache: false,
                  success: function(data){
                    reset();
                    var data_return=JSON.parse(data);
                    //console.log(data_return);
                    $('#id_edit').val(data_return['id']);
                    //$('#summernote').html(data_return['text']);
                    $('#imgs').attr("src", data_return['photo_url']);
                    $('#summernote').summernote({
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
                    $('#summernote').summernote('code',data_return['text']);
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
    		            url: "{{url('update/intro_text')}}",
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
