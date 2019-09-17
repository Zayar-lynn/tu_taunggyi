@extends('admin.layouts.site_admin.site_admin_design')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    @endsection
@section('nav_bar_text')
    Company List
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Pending Company</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Country
                                        </th>
                                        <th>
                                            City
                                        </th>
                                        <th>
                                            Salary
                                        </th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice
                                        </td>
                                        <td>
                                            Niger
                                        </td>
                                        <td>
                                            Oud-Turnhout
                                        </td>
                                        <td class="text-primary">
                                            $36,738
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Minerva Hooper
                                        </td>
                                        <td>
                                            Curaçao
                                        </td>
                                        <td>
                                            Sinaai-Waas
                                        </td>
                                        <td class="text-primary">
                                            $23,789
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            Sage Rodriguez
                                        </td>
                                        <td>
                                            Netherlands
                                        </td>
                                        <td>
                                            Baileux
                                        </td>
                                        <td class="text-primary">
                                            $56,142
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            Philip Chaney
                                        </td>
                                        <td>
                                            Korea, South
                                        </td>
                                        <td>
                                            Overland Park
                                        </td>
                                        <td class="text-primary">
                                            $38,735
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            Doris Greene
                                        </td>
                                        <td>
                                            Malawi
                                        </td>
                                        <td>
                                            Feldkirchen in Kärnten
                                        </td>
                                        <td class="text-primary">
                                            $63,542
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            6
                                        </td>
                                        <td>
                                            Mason Porter
                                        </td>
                                        <td>
                                            Chile
                                        </td>
                                        <td>
                                            Gloucester
                                        </td>
                                        <td class="text-primary">
                                            $78,615
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title mt-0"> Company List</h4>
                                    <p class="card-category"> Here is a subtitle for this table</p>
                                </div>
                                <div class="col-md-8">
                                    <input type="radio" value="all" checked>All Companies List
                                    <input type="radio" value="all">Top Companies List
                                    <input type="radio" value="all">Paid Companies List
                                    <input type="radio" value="all">Free Companies List
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover">
                                    <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Salary
                                    </th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice
                                        </td>
                                        <td>
                                            Niger
                                        </td>
                                        <td>
                                            Oud-Turnhout
                                        </td>
                                        <td>
                                            $36,738
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Minerva Hooper
                                        </td>
                                        <td>
                                            Curaçao
                                        </td>
                                        <td>
                                            Sinaai-Waas
                                        </td>
                                        <td>
                                            $23,789
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice
                                        </td>
                                        <td>
                                            Niger
                                        </td>
                                        <td>
                                            Oud-Turnhout
                                        </td>
                                        <td>
                                            $36,738
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Minerva Hooper
                                        </td>
                                        <td>
                                            Curaçao
                                        </td>
                                        <td>
                                            Sinaai-Waas
                                        </td>
                                        <td>
                                            $23,789
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice
                                        </td>
                                        <td>
                                            Niger
                                        </td>
                                        <td>
                                            Oud-Turnhout
                                        </td>
                                        <td>
                                            $36,738
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Minerva Hooper
                                        </td>
                                        <td>
                                            Curaçao
                                        </td>
                                        <td>
                                            Sinaai-Waas
                                        </td>
                                        <td>
                                            $23,789
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Dakota Rice
                                        </td>
                                        <td>
                                            Niger
                                        </td>
                                        <td>
                                            Oud-Turnhout
                                        </td>
                                        <td>
                                            $36,738
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Minerva Hooper
                                        </td>
                                        <td>
                                            Curaçao
                                        </td>
                                        <td>
                                            Sinaai-Waas
                                        </td>
                                        <td>
                                            $23,789
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            Sage Rodriguez
                                        </td>
                                        <td>
                                            Netherlands
                                        </td>
                                        <td>
                                            Baileux
                                        </td>
                                        <td>
                                            $56,142
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            Philip Chaney
                                        </td>
                                        <td>
                                            Korea, South
                                        </td>
                                        <td>
                                            Overland Park
                                        </td>
                                        <td>
                                            $38,735
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            Doris Greene
                                        </td>
                                        <td>
                                            Malawi
                                        </td>
                                        <td>
                                            Feldkirchen in Kärnten
                                        </td>
                                        <td>
                                            $63,542
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            6
                                        </td>
                                        <td>
                                            Mason Porter
                                        </td>
                                        <td>
                                            Chile
                                        </td>
                                        <td>
                                            Gloucester
                                        </td>
                                        <td>
                                            $78,615
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-warning">Edit</button>
                                            <button class="btn btn-sm btn-success">Activate</button>
                                            <button class="btn btn-sm btn-outline-danger">Ban</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
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
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
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
        } );
    </script>
    @endsection
