<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\CustomClass\AboutData;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.about')->with(['url'=>'about']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->get('id');
      $phone = $request->get('phone');
      $email = $request->get('email');
      $address = $request->get('address');
      $about = $request->get('about');
      $vision = $request->get('vision');
      $mission = $request->get('mission');
      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/about/'),$photo_name);
        $about_photo = About::find($id);
        $image_path=public_path().'/upload/about/'.$about_photo->photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        About::findOrFail($id)->update([
          'about'=>$about,
          'photo'=>$photo_name,
          'vision'=>$vision,
          'mission'=>$mission,
          'phone'=>$phone,
          'email'=>$email,
          'address'=>$address
        ]);
      }else {
        About::findOrFail($id)->update([
          'about'=>$about,
          'vision'=>$vision,
          'mission'=>$mission,
          'phone'=>$phone,
          'email'=>$email,
          'address'=>$address
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_all_about(){
      $obj=new AboutData(1);
      $data=$obj->getAboutData();
        return json_encode($data);
    }
}
