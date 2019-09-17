<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Department_post;
use App\CustomClass\Path;
use App\CustomClass\DepartmentData;
use App\CustomClass\DepartmentpostData;

class DepartmentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departments=Department::orderBy('id', 'desc')->get();
      $arr=[];
      foreach ($departments as $data){
          $obj=new DepartmentData($data->id);
          array_push($arr,$obj->getDepartmentData());
      }

        return view('admin.site_admin.department_post')->with([
          'url'=>'department_post',
          'departments'=>$arr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $title = $request->get('title');
      $description = $request->get('des');
      $deparment_type = $request->get('deparment_type');
      $photo = $request->file('photo');
      $photo_name = uniqid().'_'.$photo->getClientOriginalName();
      $photo->move(public_path('upload/department_post'),$photo_name);

          Department_post::create([
              'title'=>$title,
              'photo'=>$photo_name,
              'description'=>$description,
              'department_name'=>$deparment_type
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $obj=new DepartmentpostData($id);
      return json_encode($obj->getDepartmentpostData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->get('id');
      $title = $request->get('title');
      $description = $request->get('des');
      $deparment_type = $request->get('deparment_type');
      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/department_post/'),$photo_name);
        $dep_post = Department_post::find($id);
        $image_path=public_path().'/upload/department_post/'.$dep_post->photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        Department_post::findOrFail($id)->update([
          'title'=>$title,
          'photo'=>$photo_name,
          'description'=>$description,
          'department_name'=>$deparment_type
        ]);
      }else {
        Department_post::findOrFail($id)->update([
          'title'=>$title,
          'description'=>$description,
          'department_name'=>$deparment_type
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $department_post = Department_post::find($id);
      $image_path=public_path().'/upload/department_post/'.$department_post->photo;
      if(file_exists($image_path)){
          unlink($image_path);
      }
      $department_post->delete();
    }

    public function get_all_department_post(){
      $dep_post=Department_post::orderBy('id', 'desc')->get();
      $arr=[];
      foreach ($dep_post as $data){
          $dep_post_data=new DepartmentpostData($data->id);
          array_push($arr,$dep_post_data->getDepartmentpostData());
      }
       return json_encode($arr);
    }

    public function detail_department_post($id){
      $dep_post_obj = new DepartmentpostData($id);
      $dep_post_detail = $dep_post_obj->getDepartmentpostData();
      return view('admin.site_admin.department_post_detail')->with(['detail'=>$dep_post_detail,'url'=>'department_post']);
    }
}
