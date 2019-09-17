<?php


namespace App\CustomClass;

 use App\Ourpartner;
 use App\User;

 class OutpartnerData {

    private $id;
    private $ourpartner_data;

     function __construct($ourpartner_id) {
         $ourpartner=Ourpartner::findOrFail($ourpartner_id);
         $this->id=$ourpartner->id;
         $this->setOurpartnerData($ourpartner);
     }

     /**
      * @return mixed
      */
     public function getOurpartnerData()
     {
         $this->ourpartner_data['photo_url']=Path::$domain_url.'/upload/our_partner_company/'.$this->ourpartner_data['photo'];

         return $this->ourpartner_data;
     }

     /**
      * @param mixed $ourpartner_data
      */
     private function setOurpartnerData($ourpartner_data)
     {
         $this->ourpartner_data = $ourpartner_data;
     }





 }
