<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CustomClass\CourseData;
use App\CustomClass\Path;
use Illuminate\Support\Facades\Auth;

class MajorCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.major_admin.course')->with(['url'=>'course']);
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
      $user = Auth::user();
      $account_id = $user->id;

      $name = $request->get('name');
      $detail = $request->get('detail');
      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/course'),$photo_name);

        Course::create([
            'course_name'=>$name,
            'course_photo'=>$photo_name,
            'course_detail'=>$detail,
            'account_id'=>$account_id
        ]);
      }else {
        Course::create([
            'course_name'=>$name,
            'course_detail'=>$detail,
            'account_id'=>$account_id
        ]);
      }
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
      $data = Course::find($id);
      $data['photo_url']=Path::$domain_url."upload/course/".$data->course_photo;
      return json_encode($data);
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
      $name = $request->get('name');
      $detail = $request->get('detail');
      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/course/'),$photo_name);
        $course = Course::find($id);
        if (is_null($course->course_photo)) {
          Course::findOrFail($id)->update([
            'course_name'=>$name,
            'course_photo'=>$photo_name,
            'course_detail'=>$detail
          ]);
        }else {
          $image_path=public_path().'/upload/course/'.$course->course_photo;
          if(file_exists($image_path)){
              unlink($image_path);
          }
          Course::findOrFail($id)->update([
            'course_name'=>$name,
            'course_photo'=>$photo_name,
            'course_detail'=>$detail
          ]);
        }
      }else {
        Course::findOrFail($id)->update([
          'course_name'=>$name,
          'course_detail'=>$detail
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
      $course = Course::find($id);
      $image_path=public_path().'/upload/course/'.$course->course_photo;
      if(file_exists($image_path)){
          unlink($image_path);
      }
      $course->delete();
    }

    public function get_all_major_course(){
      $user = Auth::user();
      $user_id = $user->id;
       $courses=Course::where('account_id',$user_id)->orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($courses as $data){
           $course_data=new CourseData($data->id);
           array_push($arr,$course_data->getCourseData());
       }
        return json_encode($arr);
    }

    public function detail_course($id){
      $course_obj = new CourseData($id);
      $course_detail = $course_obj->getCourseData();
      return view('admin.major_admin.course_detail')->with(['detail'=>$course_detail,'url'=>'course']);
    }
}
