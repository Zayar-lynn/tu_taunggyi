<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CustomClass\CourseData;
use App\CustomClass\Path;
use Illuminate\Support\Facades\Auth;
use App\Research;
use App\CustomClass\ResearchData;
use App\Department;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.course')->with(['url'=>'course']);
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

    public function get_all_course(){
       $courses=Course::orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($courses as $data){
           $course_data=new CourseData($data->id);
           array_push($arr,$course_data->getCourseData());
       }
        return json_encode($arr);
    }

    public function show_course(){
      $courses=Course::orderBy('id', 'desc')->get();
      $course_arr=[];
      foreach ($courses as $data){
          $course_data=new CourseData($data->id);
          array_push($course_arr,$course_data->getCourseData());
      }

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.course')->with([
        'courses'=>$course_arr,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'course'
      ]);
    }

    public function show_course_detail($course_id){
      $course_obj = new CourseData($course_id);
      $course_detail = $course_obj->getCourseData();

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.course-detail')->with([
        'course_detail'=>$course_detail,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'course'
      ]);
    }
}
