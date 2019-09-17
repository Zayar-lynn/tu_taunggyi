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
<h3>Finished Students List</h3>
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
                                            Degree Name
                                        </th>
                                        <th>
                                            Start Date
                                        </th>
                                        <th>
                                          End date
                                        </th>
                                        <th>
                                            Total
                                        </th>
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
                        <h4 class="modal-title">Create Finished Student</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form id="insert_finished_student" enctype="multipart/form-data" class="md-form">
                              {{csrf_field()}}

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="dergree_name">Degree Name</label>
                                          <input type="text" name="degree_name" class="form-control" id="dergree_name">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="s_date">Start Date</label>
                                        <input type="date" name="start" class="form-control" id="s_date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="e_date">End Date</label>
                                        <input type="date" name="end" class="form-control" id="e_date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="total">Total</label>
                                        <input type="text" name="total" class="form-control" id="total">
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
                                <h4 class="modal-title">Edit Finished Student</h4>
                                <button data-dismiss="modal" class="close">&times;</button>
                            </div>
                            <div class="modal-body">


                                <form id="update_data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" id="id_edit">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="dergree_name">Degree Name</label>
                                                <input type="text" name="degree_name" class="form-control" id="update_dergree_name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="s_date">Start Date</label>
                                              <input type="date" name="start" class="form-control" id="update_s_date">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="e_date">End Date</label>
                                              <input type="date" name="end" class="form-control" id="update_e_date">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="total">Total</label>
                                              <input type="text" name="total" class="form-control" id="update_total">
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
                  url: "{{url('get_all_finished_student')}}",

                  cache: false,
                  success: function(data){
                    var data_return=JSON.parse(data);
                    console.log(data_return);
                    t.clear();
                    var no = 1;
                    for(var i = 0;i<data_return.length;i++){
                     // var link=window.location.href+"/detail/"+data_return[i]['id'];
                        t.row.add( [
                            no++,
                            data_return[i]['degree_name'],
                            data_return[i]['start'],
                            data_return[i]['end'],
                            data_return[i]['total'],
                            // '<a href="'+link+'" class="btn btn-primary btn-sm">Detail</a>',
                            '<button class="btn btn-info btn-sm" onclick="edit_data('+data_return[i]['id']+')" data-target="#edit_modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Edit</button>',
                            // '<button class="btn btn-danger btn-sm" onclick="delete_data('+data_return[i]['id']+')">Delete</button>'
                        ] ).draw( false );
                    }

                      $('#insert_finished_student')[0].reset();

                  }
                });
            }

            $('#insert_finished_student').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('insert/finish_student')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                    //console.log(data);
                    $('#modalBox').modal('hide');
                    toastr_success('Insert finished student successful');
                    load();
                  }
                });
                return false;
            });

            // delete_data=function(id){
            // if(confirm('Are you sure You want to delete!')==true){
            //     $.ajax({
            //             type: "POST",
            //             url: "../delete/department_post/"+id,

            //             cache: false,
            //             success: function(data){
            //                 toastr_success('Delete department post data successful');
            //                 load();
            //             }
            //         });
            //     }else{
            //         return false;
            //     }
            // }

            edit_data=function(id){

                $.ajax({
                  type: "POST",
                  url: "../edit/finished_student/"+id,

                  cache: false,
                  success: function(data){
                    reset();
                    var finish_student=JSON.parse(data);

                    //console.log(finish_student);
                    $('#id_edit').val(finish_student['id']);
                    $('#update_dergree_name').val(finish_student['degree_name']);
                    $('#update_s_date').val(finish_student['start']);
                    $('#update_e_date').val(finish_student['end']);
                    $('#update_total').val(finish_student['total']);

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
    		            url: "{{url('update/finished_student')}}",
    		            data:updateData,
    		            cache:false,
    		            processData: false,
        				    contentType: false,
    		            success: function(data){
                        //console.log(data);
                        //alert(data);
    		            $('#edit_modalBox').modal('hide');
                            toastr_success('Update department post data successful');
          				  	load();
          				  }
    		        });
    		        return false;
              });
            });
    </script>
    @endsection
