<?php

namespace App\CustomClass;

use App\Gallery;

class GalleryData{

    private $gallery_data;
    private $photo;

    public function __construct($gallery_id){
        $gallery=Gallery::where('id',$gallery_id)->firstOrFail();
        $this->setGalleryData($gallery);
        $this->photo=$gallery->photo;
    }

    private function setGalleryData($data){
        $this->gallery_data=$data;
    }

    public function getGalleryData(){
        $this->gallery_data['photo_url']=Path::$domain_url.'images/gallery/'.$this->photo;
        return $this->gallery_data;
    }
}