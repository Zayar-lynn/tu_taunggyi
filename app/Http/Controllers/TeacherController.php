<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Department;
use App\CustomClass\TeacherData;
use App\CustomClass\DepartmentData;
use App\CustomClass\Path;

class TeacherController extends Controller
{
    public function index()
    {
        $deparments=Department::orderBy('created_at','Desc')->pluck('name','id');
        return view('admin.site_admin.teacher')->with([
          'url'=>'teacher',
          'departmaents' => $deparments
        ]);
    }

    public function store(Request $request)
    {
      $photo = $request->file('photo');
      if ($request->hasFile('photo')){
        $image_name=uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/teacher/'),$image_name);
      }
          Teacher::create([
              'name'=>$request->get("name"),
              'phone'=>$request->get("phone"),
              'email'=>$request->get("email"),
              'address'=>$request->get("address"),
              'position'=>$request->get("position"),
              'degree'=>$request->get("degree"),
              'detail'=>$request->get("detail"),
              'department_id'=>$request->get("department"),
              'photo'=>$image_name,
              'role'=>$request->get("role"),
              'fb_link'=>$request->get('fb_link')
          ]);
        return response()->json(true);
    }

    public function edit($id)
    {
      $data = Teacher::find($id);
      $data['photo_url']=Path::$domain_url."upload/teacher/".$data->photo;
      return json_encode($data);
    }

    public function update(Request $request)
    {
      $update_teacher=Teacher::find($request->get('id'));
      $photo=$request->file('photo');
      if(isset($photo)){
        if(file_exists(public_path('upload/teacher/'.$update_teacher->photo))){
            unlink(public_path('upload/teacher/'.$update_teacher->photo));
        }
            $photo_ori_name=$photo->getClientOriginalName();
            $photo_name=time().'_'.$photo_ori_name;
            $photo->move(public_path('upload/teacher/'),$photo_name);
            $update_teacher->photo=$photo_name;
      }
    $update_teacher->name=$request->get("name");
    $update_teacher->phone=$request->get("phone");
    $update_teacher->email=$request->get("email");
    $update_teacher->address=$request->get("address");
    $update_teacher->position=$request->get("position");
    $update_teacher->degree=$request->get("degree");
    $update_teacher->detail=$request->get("detail");
    $update_teacher->department_id=$request->get("department");
    $update_teacher->role=$request->get("role");
    $update_teacher->fb_link=$request->get("fb_link");
    $res=$update_teacher->update();
    if($res){
      return response()->json(true);
    }else{
      return response()->json(false);
    }
    }

    public function destroy($id)
    {
      $teacher = Teacher::find($id);
      $image_path=public_path().'/upload/teacher/'.$teacher->photo;
      if(file_exists($image_path)){
          unlink($image_path);
      }
      $teacher->delete();
    }

    public function get_all_teacher(){
       $teachers=Teacher::orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($teachers as $data){
           $teacher_data=new TeacherData($data->id);
           array_push($arr,$teacher_data->getTeacherData());
       }
        return json_encode($arr);
    }

    public function detail_teacher($id){
      $teacher_obj = new TeacherData($id);
      $teacher_detail = $teacher_obj->getTeacherData();
      return view('admin.site_admin.teacher_detail')->with(['detail'=>$teacher_detail,'url'=>'teacher']);
    }

    public function show_teacher(){
      $teachers=Teacher::orderBy('id', 'desc')->get();
      $teacher_arr=[];
      foreach ($teachers as $data){
          $teacher_data=new TeacherData($data->id);
          array_push($teacher_arr,$teacher_data->getTeacherData());
      }

      return view('user.our-teachers')->with([
        'teachers'=>$teacher_arr
      ]);
    }

    public function show_teacher_detail($teacher_id){
      $teacher_obj = new TeacherData($teacher_id);
      $tacher_detail = $teacher_obj->getTeacherData();
      return view('user.teachers-single')->with(['tacher_detail'=>$tacher_detail]);
    }
}
