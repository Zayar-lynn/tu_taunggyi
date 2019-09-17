<?php

namespace App\Http\Controllers;

use App\CustomClass\Department_videoData;
use App\DepartmentVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MajorDepartmentVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.major_admin.department_video')->with(['url'=>'department_video']);
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
        //
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
        //
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
        if($request->hasFile('department_video')){
            $department_video = $request->file('department_video');
            $department_video_name = uniqid().'_'.$department_video->getClientOriginalName();
            $department_video->move(public_path('upload/department_video/'),$department_video_name);
            $dep_video = DepartmentVideo::find($id);
            $image_path=public_path().'/upload/department_video/'.$dep_video->department_video;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            DepartmentVideo::findOrFail($id)->update([
            'department_video'=>$department_video_name
            ]);
                //return $department_video_name;
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
        //
    }

    public function get_department_video(){
        $user = Auth::user();
        $user_id = $user->id;
        $obj=new Department_videoData($user_id);
        $data=$obj->getDepartmentVideoData();
        return json_encode($data);
    }
}
