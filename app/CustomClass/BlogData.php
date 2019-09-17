<?php


namespace App\CustomClass;

 use App\Blog;
 use App\User;

 class BlogData {

    private $id;
    private $blog_data;

     function __construct($blog_id) {
         $blog=Blog::findOrFail($blog_id);
         $this->id=$blog->id;
         $this->setBlogData($blog);
     }

     /**
      * @return mixed
      */
     public function getBlogData()
     {
         $this->blog_data['photo_url']=Path::$domain_url.'/upload/blog/'.$this->blog_data['photo'];

         $account_id = $this->blog_data['account_id'];
        $account = User::findOrFail($account_id);
        $this->blog_data['account_name']=$account->name;

         return $this->blog_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setBlogData($blog_data)
     {
         $this->blog_data = $blog_data;
     }





 }
