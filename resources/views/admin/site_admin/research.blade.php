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
<h3>Research Page</h3>
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
                                            Name of peer
                                        </th>
                                        <th>
                                            Research title
                                        </th>
                                        <th>
                                            Author
                                        </th>
                                        <th>
                                            Subject
                                        </th>
                                        <th>
                                            Year
                                        </th>
                                        <th>
                                            PDF
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
                        <h4 class="modal-title">Create New Research</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="insert_research" class="md-form" enctype="multipart/form-data">
                              {{csrf_field()}}

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="name_of_peer">Name of peer</label>
                                          <input type="text" name="name_of_peer" id="name_of_peer" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="research_title">Research Title</label>
                                          <textarea name="research_title" rows="8" class="form-control" id="research_title" required></textarea>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="author">Author</label>
                                          <input type="text" name="author" id="author" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="subject">Subject</label>
                                          <textarea name="subject" rows="8" class="form-control" id="subject" required></textarea>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="year">Year</label>
                                          <input type="text" name="year" id="year" class="form-control" required>
                                      </div>
                                  </div><br><br><br>
                                  <div class="col-md-12">
                                    <label class="btn btn-primary upload_btn">
                                        Upload PDF<input type="file" id="upload_pdf" accept="application/pdf" name="pdf" class="uploadFile img" value="Upload File" style="width: 0px;height: 0px;overflow: hidden;" required>
                                    </label>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-success pull-right" id="btn_submit">Create</button>
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
                                <h4 class="modal-title">Edit Research</h4>
                                <button data-dismiss="modal" class="close">&times;</button>
                            </div>
                            <div class="modal-body">


                                <form id="update_data">
                                    {{csrf_field()}}

                                    <div class="row">
                                        <div class="col-md-12">
                                          <input type="hidden" name="id" class="form-control" id="id_edit" value="">
                                            <div class="form-group">
                                                <label for="update_name_of_peer">Name of peer</label>
                                                <input type="text" name="name_of_peer" id="update_name_of_peer" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_research_title">Research Title</label>
                                                <textarea name="research_title" rows="8" class="form-control" id="update_research_title" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_author">Author</label>
                                                <input type="text" name="author" id="update_author" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_subject">Subject</label>
                                                <textarea name="subject" rows="8" class="form-control" id="update_subject" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="update_year">Year</label>
                                                <input type="text" name="year" id="update_year" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                          <label class="btn btn-primary upload_btn">
                                              Upload PDF<input type="file" id="update_pdf" accept="application/pdf" name="pdf" class="uploadFile img" value="Upload File" style="width: 0px;height: 0px;overflow: hidden;">
                                          </label>
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
                  url: "{{url('get_all_research')}}",

                  cache: false,
                  success: function(data){
                    var data_return=JSON.parse(data);
                    //console.log(data);
                    t.clear();
                    var no = 1;
                    for(var i = 0;i<data_return.length;i++){
                        t.row.add( [
                            no++,
                            data_return[i]['name_of_peer'],
                            data_return[i]['research_title'],
                            data_return[i]['author'],
                            data_return[i]['subject'],
                            data_return[i]['year'],
                            '<a target="_blank" class="btn btn-success" href="'+data_return[i]['pdf_url']+'">pdf</a>',
                            '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>',
                            '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                        ] ).draw( false );
                    }

                      $('#insert_research')[0].reset();
                      $('#image').attr('src','http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');

                  }
                });
            }

            $('#insert_research').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('insert/research')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                    //alert(data);
                    $('#modalBox').modal('hide');
                    toastr_success('Insert research data successful');
                    load();
                  }
                });
                return false;
            });

            delete_data=function(id){
            if(confirm('Are you sure You want to delete!')==true){
                $.ajax({
                        type: "POST",
                        url: "../delete/research/"+id,

                        cache: false,
                        success: function(data){
                            toastr_success('Delete research data successful');
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
                  url: "../edit/research/"+id,

                  cache: false,
                  success: function(data){
                    reset();
                    var research=JSON.parse(data);

                    //console.log(blog);
                    $('#id_edit').val(research['id']);
                    $('#update_name_of_peer').val(research['name_of_peer']);
                    $('#update_research_title').html(research['research_title']);
                    $('#update_author').val(research['author']);
                    $('#update_subject').html(research['subject']);
                    $('#update_year').val(research['year']);
                    $('#update_pdf').val(research['pdf_url']);

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
    		            url: "{{url('update/research')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				    contentType: false,
    		            success: function(data){
                        //console.log(data);
                        //alert(data);
    		            $('#edit_modalBox').modal('hide');
                            toastr_success('Update research data successful');
          				  	load();
          				  }
    		        });
    		        return false;
              });

              windowOpen=function(pdf_url){
                window.open("pdf_url","_blank","fullscreen=yes");return false;
              }
            });
    </script>
    @endsection
