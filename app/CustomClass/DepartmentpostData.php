<?php


namespace App\CustomClass;

 use App\Department_post;

 class DepartmentpostData {

    private $id;
    private $dep_post_data;

     function __construct($dep_post_id) {
         $dep_post=Department_post::findOrFail($dep_post_id);
         $this->id=$dep_post->id;
         $this->setDepartmentpostData($dep_post);
     }

     /**
      * @return mixed
      */
     public function getDepartmentpostData()
     {
         $this->dep_post_data['photo_url']=Path::$domain_url.'/upload/department_post/'.$this->dep_post_data['photo'];
         return $this->dep_post_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setDepartmentpostData($dep_post_data)
     {
         $this->dep_post_data = $dep_post_data;
     }





 }
