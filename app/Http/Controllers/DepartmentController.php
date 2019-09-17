<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use App\CustomClass\DepartmentData;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    public function store(Request $request)
    {
      $name = $request->get('name');
      $department = $request->get('head_of_department');
      $phone = $request->get('phone');
      $email = $request->get('email');
      $description = $request->get('description');
      $password = $request->get('password');

        if ($request->hasFile('photo')){
            $file=$request->file('photo');
            $image_name=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/department/'),$image_name);

            Department::create([
                'name'=>$name,
                'head_of_department'=>$department,
                // 'location'=>$request->get('location'),
                'phone'=>$phone,
                'email'=>$email,
                'description'=>$description,
                'photo'=>$image_name,
            ]);

            User::create([
                'name'=> $name,
                'email' => $email,
                'password' => Hash::make($password),
                'type' => strtolower("$name"),
            ]);
        }

          return response()->json(true);
    }

    public function edit($id)
    {
        $obj=new DepartmentData($id);
        return response()->json($obj->getDepartmentData());
    }

    public function update(Request $request)
    {
      $update_depart=Department::find($request->get('id'));
      $photo=$request->file('photo');
      if(isset($photo)){
        if(file_exists(public_path('upload/department/'.$update_depart->photo))){
            unlink(public_path('upload/department/'.$update_depart->photo));
        }
            $photo_ori_name=$photo->getClientOriginalName();
            $photo_name=time().'_'.$photo_ori_name;
            $photo->move(public_path('upload/department/'),$photo_name);
            $update_depart->photo=$photo_name;
      }
     $update_depart->name=$request->get('name');
     $update_depart->head_of_department=$request->get('head_of_department');
     // $update_depart->location=$request->get('location');
     $update_depart->phone=$request->get('phone');
     $update_depart->email=$request->get('email');
     $update_depart->description=$request->get('description');
     $res=$update_depart->update();
     if($res){
         return response()->json(true);
     }else{
         return response()->json(false);
     }
    }

    public function destroy($id)
    {
      $delete_depart=Department::find($id);
      if(file_exists(public_path('upload/department/'.$delete_depart->photo))){
        unlink(public_path('upload/department/'.$delete_depart->photo));
        }
      $res=$delete_depart->delete();
      $depart_email = $delete_depart->email;
      User::where('email',$depart_email)->delete();
      if($res){
          return response()->json(true);
        }else{
          return response()->json(false);
      }
    }

    public function get_all_department(){
       $departments=Department::orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($departments as $data){
           $obj=new DepartmentData($data->id);
           array_push($arr,$obj->getDepartmentData());
       }
        return response()->json($arr);
    }
}
