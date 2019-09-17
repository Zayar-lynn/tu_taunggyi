<?php


namespace App\CustomClass;

 use App\Research;

 class ResearchData {

    private $id;
    private $research_data;

     function __construct($research_id) {
         $research=Research::findOrFail($research_id);
         $this->id=$research->id;
         $this->setResearchData($research);
     }

     /**
      * @return mixed
      */
     public function getResearchData()
     {
       $this->research_data['pdf_url']=Path::$domain_url.'upload/pdf/'.$this->research_data['pdf'];
         return $this->research_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setResearchData($research_data)
     {
         $this->research_data = $research_data;
     }





 }
