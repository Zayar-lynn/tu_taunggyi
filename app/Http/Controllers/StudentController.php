<?php

namespace App\Http\Controllers;

use App\CurrantStudent;
use Illuminate\Http\Request;
use App\FinishedStudent;

class StudentController extends Controller
{
    
    public function show_finished_student(){
        return view('admin.site_admin.finished_student')->with([
            'url'=>'finishedstudent'
        ]);
    }

    public function insert_finished_student(Request $request){
        FinishedStudent::create($request->all());
    }

    public function get_all_finished_student(){
        return json_encode(FinishedStudent::all());
    }

    public function edit_finished_student($id){
        return json_encode(FinishedStudent::find($id));
    }

    public function update_finished_student(Request $request){
        FinishedStudent::findOrFail($request->get('id'))->update([
            'degree_name'=>$request->get('degree_name'),
            'start'=>$request->get('start'),
            'end'=>$request->get('end'),
            'total'=>$request->get('total')
          ]);
    }

    public function show_currant_student(){
        return view('admin.site_admin.currant_student')->with([
            'url'=>'currantstudent'
        ]);
    }

    public function insert_currant_student(Request $request){
        CurrantStudent::create($request->all());
    }

    public function get_all_currant_student(){
        return json_encode(CurrantStudent::all());
    }

    public function edit_currant_student($id){
        return json_encode(CurrantStudent::find($id));
    }

    public function update_currant_student(Request $request){
        CurrantStudent::findOrFail($request->get('id'))->update($request->all());
    }

}
