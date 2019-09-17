<?php


namespace App\CustomClass;

 use App\DepartmentVideo;

 class Department_videoData {

    private $id;
    private $departmentVideo_data;

     function __construct($departmentVideo_id) {
         $departmentVideo=DepartmentVideo::where('user_id',$departmentVideo_id)->first();
         $this->id=$departmentVideo->id;
         $this->setDepartmentVideoData($departmentVideo);
     }

     /**
      * @return mixed
      */
     public function getDepartmentVideoData()
     {
         $this->departmentVideo_data['video_url']=Path::$domain_url.'upload/department_video/'.$this->departmentVideo_data['department_video'];
         return $this->departmentVideo_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setDepartmentVideoData($departmentVideo_data)
     {
         $this->departmentVideo_data = $departmentVideo_data;
     }





 }
