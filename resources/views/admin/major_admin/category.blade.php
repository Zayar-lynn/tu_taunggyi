@extends('admin.layouts.site_admin.site_admin_design')

@section('nav_bar_text')
    Company Profile
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add New Category
                    </div>
                    <form class="card-body" action="" method="post">
                        <div class="form-group">
                            <label for="categroy_name" class="bmd-label-floating">Category Name</label>
                            <input type="text" class="form-control" id="categroy_name">
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" onclick="hide_main_category()" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                Main Category
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" onclick="show_main_category()" name="optionsRadios" id="optionsRadios2" value="option2">
                                Sub Category
                            </label>
                        </div>
                        <div id="main_option" style="display: none" class="form-group">
                            <label for="exampleSelect1" class="bmd-label-floating">Select Main Category</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>AA</option>
                                <option>BB</option>
                                <option>CC</option>
                                <option>DD</option>
                                <option>EE</option>
                            </select>
                        </div>
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-raised">Submit</button>
                    </form>
                </div>
               </div>
               <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-5 card">
                            <div class="">
                                <div>
                                    <h3>
                                        &nbsp;Main Category
                                    </h3>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="cursor: pointer;" title="Click to view" data-tooltip="tooltip">
                                                <td>ABCD</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <tr style="cursor: pointer;" title="Click to view" data-tooltip="tooltip">
                                                <td>ABCD</td>
                                                <td><a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                            </tr>


                                            <tr style="cursor: pointer;" title="Click to view" data-tooltip="tooltip">
                                                <td>ABCD</td>
                                                <td><a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        </tbody>



                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 card ml-2">
                            <div class="">
                                <div>
                                    <h3>
                                        &nbsp;Sub Category
                                    </h3>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Control</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr style="cursor: pointer;" title="Click to view" data-tooltip="tooltip">
                                            <td>ABCD</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <tr style="cursor: pointer;" title="Click to view" data-tooltip="tooltip">
                                            <td>ABCD</td>
                                            <td><a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                        </tr>


                                        <tr style="cursor: pointer;" title="Click to view" data-tooltip="tooltip">
                                            <td>ABCD</td>
                                            <td><a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        </tbody>



                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function show_main_category() {
            var main=document.getElementById('main_option');
            main.style.display="block";
        }

        function hide_main_category() {
            var main=document.getElementById('main_option');
            main.style.display="none";
        }

        $("[data-tooltip='tooltip']").tooltip();
    </script>
    @endsection
