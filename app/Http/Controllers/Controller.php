<?php

namespace App\Http\Controllers;

use App\CustomClass\IntroData;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Support\Facades\Session;

use App\Course;
use App\Blog;
use App\Event;
use App\Teacher;
use App\About;
use App\CurrantStudent;
use App\CustomClass\AboutData;
use App\CustomClass\CourseData;
use App\CustomClass\BlogData;
use App\CustomClass\EventData;
use App\CustomClass\TeacherData;
use App\CustomClass\Path;
use App\CustomClass\GalleryData;
use App\Gallery;
use App\CustomClass\DepartmentData;
use App\Department;
use App\Research;
use App\CustomClass\ResearchData;
use App\Department_post;
use App\CustomClass\DepartmentpostData;
use App\CustomClass\StudentsCount;
use App\DepartmentVideo;
use App\Intro;
use App\Ourpartner;
use App\CustomClass\OutpartnerData;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

// login start

    function show_login(){
      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.login')->with([
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>''
      ]);
    }

    function login(Request $request){
    	  $email=$request->get('email');
        $password=$request->get('password');

        //return json_encode($request->all());
        if (Auth::attempt(['email' => $email, 'password' => $password])) {  //yyk
            $account=Auth::user();

            $account_type=$account->type;
            // $data_id=$account->data_id;

            // $request->session()->put('login_id', $data_id);
            if($account_type=="admin"){
                return redirect('home');
            }else{
              return redirect('major/event');
            }

        }
        else{
            // return "no acccount";
            return redirect('/login')->with('error_msg','Login Fail!');
        }

    }
    // login end

    public function index(){
      $courses=Course::orderBy('id', 'desc')->limit(4)->get();
      $course_arr=[];
      foreach ($courses as $data){
          $course_data=new CourseData($data->id);
          array_push($course_arr,$course_data->getCourseData());
      }

      $events=Event::where('date', '>=', date('Y-m-d'))->orderBy('date')->limit(3)->get();
      $event_arr=[];
      foreach ($events as $data){
          $event_data=new EventData($data->id);
          array_push($event_arr,$event_data->getEventData());
      }

      $blogs=Blog::orderBy('id', 'desc')->limit(3)->get();
      $blog_arr=[];
      foreach ($blogs as $data){
          $blog_data=new BlogData($data->id);
          array_push($blog_arr,$blog_data->getBlogData());
      }

      $blog_data_one=Blog::orderBy('id','desc')->limit(1)->get();
      $blog_one_arr=[];
      foreach($blog_data_one as $data){
        $blog_obj = new BlogData($data->id);
        array_push($blog_one_arr,$blog_obj->getBlogData());
      }

      // $blog_data_two=Blog::skip(1)->take(1)->first();
      // $blog_obj2 = new BlogData($blog_data_two->id);
      // $blog_two = $blog_obj2->getBlogData();

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
      }

      //$intro_text = Intro::where('id',1)->get();
        $intro_obj=new IntroData(1);
        $intro_data=$intro_obj->getIntroData();

        $dep_name = Department::all();

        $gallery_arr=array();
        $gallerys=Gallery::orderBy('created_at','Desc')->paginate(9);
        foreach($gallerys as $gallery){
            $obj=new GalleryData($gallery->id);
            array_push($gallery_arr,$obj->getGalleryData());
        }

        $teacher_count = Teacher::count();
        $course_count = Course::count();

        // students count
        $obj=new StudentsCount();
        $total =  $obj->students_count();

        //return substr(date('Y-m-d H:i:s'),0,4);

        $ourpartners=Ourpartner::orderBy('id', 'desc')->get();
        $ourpartner_arr=[];
        foreach ($ourpartners as $data){
            $ourpartner_data=new OutpartnerData($data->id);
            array_push($ourpartner_arr,$ourpartner_data->getOurpartnerData());
        }

      return view('user.index')->with([
        'courses'=>$course_arr,
        'events'=>$event_arr,
        'blogs'=>$blog_arr,
        'blog_ones'=>$blog_one_arr,
        // 'blog_two'=>$blog_two,
        'researchs'=>$research_arr,
        'intro_data'=>$intro_data,
        'dep_name'=>$dep_name,
        'gallerys'=>$gallery_arr,
        'teacher_count'=>$teacher_count,
        'course_count'=>$course_count,
        'students_count'=>$total,
        'ourpartners'=>$ourpartner_arr,
        'url'=>'home'
      ]);
    }

    public function galleryData(){
      $gallery_arr=array();
      $gallerys=Gallery::orderBy('created_at','Desc')->paginate(9);
      foreach($gallerys as $gallery){
        $obj=new GalleryData($gallery->id);
        array_push($gallery_arr,$obj->getGalleryData());
      }

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      //return response()->json($gallery_arr);
      return view('user.gallery')->with([
        'gallery_arr'=>$gallery_arr,
        'paginate'=>$gallerys,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'gallery'
      ]);
    }

    public function showDepartment(){
      $departments=Department::orderBy('created_at','Desc')->get();
      $department_data=DepartmentData::getAllDepartmentData($departments);

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

      return view('user.our-departments')->with([
        'departments' => $department_data,
        'researchs'=>$research_arr,
        'url'=>'department'
      ]);
    }

    public function showDepartDetail($id){
      $depart=Department::find($id);
      $related_teacher=[];
      foreach($depart->teachers as $data){
        $obj=new TeacherData($data->id);
        array_push($related_teacher,$obj->getTeacherData());
      }
      $obj=new DepartmentData($depart->id);

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
      }

      $depart_name = $depart->name;
      $department_video = DepartmentVideo::where('department_name',$depart_name)->get();
      $department_path = Path::$domain_url.'upload/department_video/'.$department_video['0']['department_video'];

      $dep_name = Department::all();
      //return $department_path;
      return view('user.department-single')->with([
        'department' => $obj->getDepartmentData(),
        'teachers' => $related_teacher,
        'researchs'=>$research_arr,
        'department_video'=>$department_path,
        'dep_name'=>$dep_name,
        'url'=>'department'
      ]);
    }

    // teacher
    public function singleTeacher($id){
      $obj=new TeacherData($id);

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.teacher-single')->with([
        'teacher' => $obj->getTeacherData(),
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'department'
      ]);
    }

    public function about(){
      $obj=new AboutData(1);
      $about_data=$obj->getAboutData();

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

       $gallery_arr=array();
        $gallerys=Gallery::orderBy('created_at','Desc')->paginate(9);
        foreach($gallerys as $gallery){
            $obj=new GalleryData($gallery->id);
            array_push($gallery_arr,$obj->getGalleryData());
        }

        $teacher_count = Teacher::count();
        $course_count = Course::count();

        // students count
        $obj=new StudentsCount();
        $total =  $obj->students_count();

      return view('user.about')->with([
        'about_data'=>$about_data,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'gallerys'=>$gallery_arr,
        'teacher_count'=>$teacher_count,
        'course_count'=>$course_count,
        'students_count'=>$total,
        'url'=>'about'
      ]);
    }

    public function research(){
      $research_1=Research::orderBy('id', 'desc')->get();
       $research_arr1=[];
       foreach ($research_1 as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr1,$research_data->getResearchData());
       }

       $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.research')->with([
        'researchs1'=>$research_arr1,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'research'
      ]);
    }

    public function contact(){
      $obj=new AboutData(1);
      $about_data=$obj->getAboutData();

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.contact')->with([
        'about_data'=>$about_data,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'contact'
      ]);
    }

    public function dep_post_detail($dep_post_id){
      $dep_post_obj = new DepartmentpostData($dep_post_id);
      $dep_post_detail = $dep_post_obj->getDepartmentpostData();

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.departmentpost_detail')->with([
        'dep_post_detail'=>$dep_post_detail,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'department'
      ]);
    }

    public function our_teacher()
    {
      $dep_name = Department::all();

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

      $professor = Teacher::where('role','professor')->first();
      $associate_professor = Teacher::where('role','associate professor')->first();
      $department_leader = Teacher::where('role','department leader')->get();

      $department_name = Department::all();

      return view('user.our_teacher')->with([
        'url'=>'our_teacher',
        'dep_name'=>$dep_name,
        'researchs'=>$research_arr,
        'professor'=>$professor,
        'associate_professor'=>$associate_professor,
        'department_leader'=>$department_leader,
        'department_name'=>$department_name
      ]);
    }
}
