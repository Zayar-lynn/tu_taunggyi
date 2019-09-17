<?php


namespace App\CustomClass;

 use App\About;

 class AboutData {

    private $id;
    private $about_data;

     function __construct($about_id) {
         $about=About::findOrFail($about_id);
         $this->id=$about->id;
         $this->setAboutData($about);
     }

     /**
      * @return mixed
      */
     public function getAboutData()
     {
         $this->about_data['photo_url']=Path::$domain_url.'/upload/about/'.$this->about_data['photo'];
         return $this->about_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setAboutData($about_data)
     {
         $this->about_data = $about_data;
     }





 }
