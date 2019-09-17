<?php

namespace App\Http\Controllers;

use App\CurrantStudent;
use Illuminate\Http\Request;
use App\Department;
use App\FinishedStudent;
use App\Research;
use App\CustomClass\ResearchData;
use App\Course;
use App\CustomClass\CourseData;
use App\Gallery;
use App\CustomClass\GalleryData;

class AcademicController extends Controller
{
    
    public function index(){
        $dep_name = Department::all();

        $finishstudent = FinishedStudent::all();

        $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
        $research_arr=[];
        foreach ($researchs as $data){
            $research_data=new ResearchData($data->id);
            array_push($research_arr,$research_data->getResearchData());
        }

        $courses=Course::orderBy('id', 'desc')->limit(4)->get();
        $course_arr=[];
        foreach ($courses as $data){
            $course_data=new CourseData($data->id);
            array_push($course_arr,$course_data->getCourseData());
        }

        $gallery_arr=array();
        $gallerys=Gallery::orderBy('created_at','Desc')->paginate(9);
        foreach($gallerys as $gallery){
            $obj=new GalleryData($gallery->id);
            array_push($gallery_arr,$obj->getGalleryData());
        }

        $major_list=['IT','Civil','Electrical','Electrical Power','Mechanical Power','Mining','Total'];
        $sorted_list=[];

        foreach ($major_list as $major){
            if ($major!=="Total"){
                $data=CurrantStudent::where('major',$major)->get();
                $result=self::SortByYear($data);
            }
            else{
                $result=[
                    [
                        'male'=>CurrantStudent::where('year','First Year')->sum('male'),
                        'female'=>CurrantStudent::where('year','First Year')->sum('female')
                    ],
                    [
                        'male'=>CurrantStudent::where('year','Second Year')->sum('male'),
                        'female'=>CurrantStudent::where('year','Second Year')->sum('female')
                    ],
                    [
                        'male'=>CurrantStudent::where('year','Third Year')->sum('male'),
                        'female'=>CurrantStudent::where('year','Third Year')->sum('female')
                    ],
                    [
                        'male'=>CurrantStudent::where('year','Fourth Year')->sum('male'),
                        'female'=>CurrantStudent::where('year','Fourth Year')->sum('female')
                    ],
                    [
                        'male'=>CurrantStudent::where('year','Fifth Year')->sum('male'),
                        'female'=>CurrantStudent::where('year','Fifth Year')->sum('female')
                    ],
                    [
                        'male'=>CurrantStudent::where('year','Sixth Year')->sum('male'),
                        'female'=>CurrantStudent::where('year','Sixth Year')->sum('female')
                    ],

                ];
            }
            $arr= [
                'major'=>$major,
                'data'=>$result
            ];
            array_push($sorted_list,$arr);
        }

//        return $sorted_list;
        return view('user.academics')->with([
            'dep_name'=>$dep_name,
            'finishstudent'=>$finishstudent,
            'researchs'=>$research_arr,
            'courses'=>$course_arr,
            'gallerys'=>$gallery_arr,
            'url'=>'academics',
            'current_students'=>$sorted_list
        ]);
    }


    private static function SortByYear($arr){
        $years=['First Year','Second Year','Third Year','Fourth Year','Fifth Year','Sixth Year'];
        $sorted_data=[];
        foreach ($arr as $data){
            foreach ($years as $year){
                if ($data->year==$year){
                   array_push($sorted_data,$data);
                }
            }
        }
        return $sorted_data;
    }

}


