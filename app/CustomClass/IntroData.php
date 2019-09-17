<?php


namespace App\CustomClass;


use App\Intro;

class IntroData
{

    private $id;
    private $intro_data;

    function __construct($intro_id) {
        $intro=Intro::where('id',$intro_id)->first();
        $this->id=$intro->id;
        $this->setIntroData($intro);
    }

    /**
     * @return mixed
     */
    public function getIntroData()
    {
        $this->intro_data['photo_url']=Path::$domain_url.'upload/intro/'.$this->intro_data['sign_photo'];
        return $this->intro_data;
    }

    /**
     * @param mixed $blog_data
     */
    private function setIntroData($intro_data)
    {
        $this->intro_data = $intro_data;
    }

}