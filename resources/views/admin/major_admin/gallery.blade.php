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
  Gallery
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary row">
                         <div class="col-md-8"></div>
                         <div class="col-md-4">
                         <form enctype="multipart/form-data" id="upload_image">
                           <label for="image" class="btn btn-info btn-sm float-left">Choose Image</label>
                           <input id="image" name="photo[]" type="file" multiple style="display:none" required>
                           <input type="submit" class="btn btn-sm btn-success rounded-0 float-right" value="Upload">
                        </form>
                         </div>
                        </div>
                        <div class="card-body row image_data">
                           <!-- image data show -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Edit modal -->
    <div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="editImageTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editImageTitle">Edit Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                            <form enctype="multipart/form-data" id="image_update">
                              {{csrf_field()}}
                              <input type="hidden" name="id" class="hidden_id">
                              <div class="row">
                                <div class="col-md-8 offset-md-2">
                                  <div class="form-group">
                                    <img src="{{asset('images/default.jpg')}}" class="img-thumbnail event_input_photo" id="image_id" style="width: 100%;height: 200px;">
                                    <label class="btn btn-sm btn-primary container-fluid m-0 rounded-0" for="photo">Upload</label>
                                    <input type="file" id="photo" name="photo" class="form-control error_input_photo" onchange="displaySelectedPhoto('photo','image_id')">
                                        <span id="error_photo">
                                          
                                        </span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-8 offset-md-2">
                                  <button type="submit" class="btn btn-outline-info btn-md rounded-0 container-fluid"><i class="fas fa-plus"></i>&nbsp; Change</button>
                                </div>
                              </div>
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

        // image upload data
        function imageUpload(){
                $(".image_data").empty();
                $.ajax({
                      url : "{{ url('admin/gallery_data') }}",
                      type : "get",
                      dataType : "json"
                  }).done(function(response){
                  if(response.length == 0){
                      let id=response.id;
                      $(".image_data").html("<h3 class='ml-5'>IMAGE DOES NOT EXIST!");
                      }else{
                      $.each(response,function(index,data){
                        let id=data.id;
                        let image=data.photo_url
                        $(".image_data").append('<div class="col-md-3 upload_image" data-id="'+id+'"><div class="card"><img src="'+image+'" class="rounded imagePreview" style="width:100%;height:200px;" alt="...">'+
                        '<div class="row action_'+id+'" style="display:none;"><div class="col-md-6"><button class="btn btn-outline-info btn-sm rounded-0 image_edit" data-toggle="modal" data-target="#editImage" data-id="'+id+'">Edit</button></div>'+
                        '<div class="col-md-6"><button data-id="'+id+'" class="btn btn-danger rounded-0 float-right btn-sm image_delete">Delete</button></div></div></div></div>');
                      });
                  }
                  }).fail(function(){
                      console.log('failture');
                  });
            }
    $(function(){
              imageUpload(); // image data show
              // image store
            $(document).on('submit',"#upload_image",function(event){
                event.preventDefault();
                let image_upload=new FormData(this);
                $.ajax({
                    url : "{{url('image_upload')}}",
                    type : "post",
                    data : image_upload,
                    dataType : "json",
                    contentType : false,
                    processData : false
                }).done(function(response){
                    if(response){
                      toastr_success("Add Image Successful!");
                      imageUpload();
                    }
                }).fail(function(error){
                  console.log(error);
                });
            });

            // image edit and delete design
            $(document).on('mouseover','.upload_image',function(event){
              let id=$(this).data('id');
              $(".action_"+id).animate({opacity: '1'}, "slow").show();
            });

            $(document).on('mouseout','.upload_image',function(event){
              let id=$(this).data('id');
              $(".action_"+id).animate({opacity: '1'}, "slow").hide();
            });

            // image edit
            $(document).on('click','.image_edit',function(event){
              event.preventDefault();
              let id=$(this).data('id');
              $.ajax({
                      url : "{{ url('gallery/edit') }}/"+id,
                      type : "get",
                      dataType : "json"
                  }).done(function(response){
                    $("#image_id").attr('src',response.photo_url);
                    $(".hidden_id").val(response.id);
                  }).fail(function(error){
                    console.log(error);
              });
            });

            // image update
            $(document).on('submit','#image_update',function(event){
                event.preventDefault();
                let image_upload=new FormData(this);
                $.ajax({
                    url : "{{url('image_upload/update')}}",
                    type : "post",
                    data : image_upload,
                    dataType : "json",
                    contentType : false,
                    processData : false
                }).done(function(response){
                   if(response){
                     toastr_success("Change Image Successful!");
                     $("#editImage").modal("hide");
                   }
                }).fail(function(error){
                  console.log(error);
                });
            });

          // image delete image_delete
          $(document).on('click','.image_delete',function(event){
              event.preventDefault();
              let id=$(this).data('id');
              if(confirm("Are you sure?")){
                $.ajax({
                  url : "{{url('image/delete')}}/"+id,
                  type : "post",
                  data : {"_method" : "delete"},
                }).done(function(response){
                  if(response){
                    toastr_success("Delete Image Successful!");
                    imageUpload(); // image load
                  }
                }).fail(function(error){
                  console.log(error);
                });
              }
            });
    });
    </script>
@endsection
