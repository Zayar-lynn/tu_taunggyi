<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function show_department(){

        return view('admin.site_admin.department')->with(['url'=>'deparment']);;
    }
}
