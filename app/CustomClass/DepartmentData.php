<?php


namespace App\CustomClass;

 use App\Department;
 use App\CustomClass\DepartmentpostData;
 use App\Department_post;

 class DepartmentData {

    private $id;
    private $name;
    private $head_of_department;
    private $location;
    private $phone;
    private $email;
    private $description;
    private $photo_url;
    private $teacher;
    private $department_post;

     function __construct($department_id) {
         $department=Department::findOrFail($department_id);
         $this->setId($department->id);
         $this->setName($department->name);
         $this->setHeadOfDepartment($department->head_of_department);
         $this->setLocation($department->location);
         $this->setPhone($department->phone);
         $this->setEmail($department->email);
         $this->setDescription($department->description);
         $this->setPhoto($department->photo);
         $this->setDepartmentpost($department);
     }

     public function getDepartmentData(){
         $arr=[
             'id'=>$this->getId(),
             'name'=>$this->getName(),
             'head_of_department'=>$this->getHeadOfDepartment(),
             'location'=>$this->getLocation(),
             'phone'=>$this->getPhone(),
             'email'=>$this->getEmail(),
             'description'=>$this->getDescription(),
             'photo_url'=>$this->getPhoto(),
             'department_post'=>$this->getDepartmentpost(),
             ];
         return $arr;
    }

    public static function getAllDepartmentData($data_arr){
        $arr=[];
        foreach($data_arr as $data){
            $obj=new DepartmentData($data->id);
            array_push($arr,$obj->getDepartmentData());
        }
        return $arr;
    }
     /**
      * @return mixed
      */

    public function getId()
    {
         return $this->id;
    }

     /**
      * @param mixed $id
      */
     private function setId($id)
     {
         $this->id = $id;
     }

     /**
      * @return mixed
      */
     public function getName()
     {
         return $this->name;
     }

     /**
      * @param mixed $name
      */
     private function setName($name)
     {
         $this->name = $name;
     }

     /**
      * @return mixed
      */
     public function getHeadOfDepartment()
     {
         return $this->head_of_department;
     }

     /**
      * @param mixed $head_of_department
      */
     private function setHeadOfDepartment($head_of_department)
     {
         $this->head_of_department = $head_of_department;
     }

     /**
      * @return mixed
      */
     public function getLocation()
     {
         return $this->location;
     }

     /**
      * @param mixed $location
      */
     private function setLocation($location)
     {
         $this->location = $location;
     }

     /**
      * @return mixed
      */
     public function getPhone()
     {
         return $this->phone;
     }

     /**
      * @param mixed $phone
      */
     private function setPhone($phone)
     {
         $this->phone = $phone;
     }

     /**
      * @return mixed
      */
     public function getEmail()
     {
         return $this->email;
     }

     /**
      * @param mixed $email
      */
     private function setEmail($email)
     {
         $this->email = $email;
     }

     /**
      * @return mixed
      */
     public function getDescription()
     {
         return $this->description;
     }

     /**
      * @param mixed $description
      */
     private function setDescription($description)
     {
         $this->description = $description;
     }

     /**
      * @return mixed
      */
     public function getPhoto()
     {
         return $this->photo_url;
     }

     /**
      * @param mixed $photo
      */
     private function setPhoto($photo)
     {
         $photo_url=Path::$domain_url.'upload/department/'.$photo;
         $this->photo_url = $photo_url;
     }

     /**
      * @return mixed
      */
     public function getDepartmentpost()
     {
       $dep_name = $this->department_post['name'];
       $department_post = Department_post::where('department_name',$dep_name)->get();

         return $department_post;
     }

     /**
      * @param mixed $description
      */
     private function setDepartmentpost($department_post)
     {
       $this->department_post = $department_post;
     }

 }
