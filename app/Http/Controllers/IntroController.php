<?php

namespace App\Http\Controllers;

use App\CustomClass\Department_videoData;
use App\CustomClass\IntroData;
use App\DepartmentVideo;
use App\Intro;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.intro')->with(['url'=>'intro']);
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
        if($request->hasFile('sign_photo')){
        $sign_photo= $request->file('sign_photo');
        $sign_photo_name = uniqid().'_'.$sign_photo->getClientOriginalName();
        $sign_photo->move(public_path('upload/intro/'),$sign_photo_name);
        $photo = Intro::find($request->get('id'));
        $image_path=public_path().'/upload/intro/'.$photo->sign_photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $updated = Intro::where('id',$request->get('id'))->update([
            'text'=>$request->get('text'),
            'sign_photo'=>$sign_photo_name
        ]);
        return $updated?'success':'fail';
    }
        $updated = Intro::where('id',$request->get('id'))->update([
            'text'=>$request->get('text')
        ]);
        return $updated?'success':'fail';
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

    public function get_intro_text(){

        $obj=new IntroData(1);
        $data=$obj->getIntroData();
        return json_encode($data);
    }
}
