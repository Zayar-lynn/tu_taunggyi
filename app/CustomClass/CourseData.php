<?php


namespace App\CustomClass;

 use App\Course;

 class CourseData {

    private $id;
    private $course_data;

     function __construct($course_id) {
         $course=Course::findOrFail($course_id);
         $this->id=$course->id;
         $this->setCourseData($course);
     }

     /**
      * @return mixed
      */
     public function getCourseData()
     {
         $this->course_data['photo_url']=Path::$domain_url.'/upload/course/'.$this->course_data['course_photo'];
         return $this->course_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setCourseData($course_data)
     {
         $this->course_data = $course_data;
     }





 }
