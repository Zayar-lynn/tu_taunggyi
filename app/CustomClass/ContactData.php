<?php


namespace App\CustomClass;

 use App\Contact;

 class ContactData {

    private $id;
    private $contact_data;

     function __construct($contact_id) {
         $contact=Contact::findOrFail($contact_id);
         $this->id=$contact->id;
         $this->setContactData($contact);
     }

     /**
      * @return mixed
      */
     public function getContactData()
     {
         return $this->contact_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setContactData($contact_data)
     {
         $this->contact_data = $contact_data;
     }





 }
