<?php


namespace App\CustomClass;

 use App\Teacher;

 class TeacherData {

    private $id;
    private $blog_data;

     function __construct($blog_id) {
         $blog=Teacher::findOrFail($blog_id);
         $this->id=$blog->id;
         $this->setTeacherData($blog);
     }

     /**
      * @return mixed
      */
     public function getTeacherData()
     {  
         $this->blog_data['department']=$this->blog_data->department;
         $this->blog_data['photo_url']=Path::$domain_url.'/upload/teacher/'.$this->blog_data['photo'];
         return $this->blog_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setTeacherData($blog_data)
     {
         $this->blog_data = $blog_data;
     }





 }
