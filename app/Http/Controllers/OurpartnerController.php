<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ourpartner;
use App\CustomClass\OutpartnerData;
use App\CustomClass\Path;

class OurpartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.ourpartnercompany')->with([
            'url'=>'ourpartnercompany'
        ]);
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
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/our_partner_company'),$photo_name);

          Ourpartner::create([
              'name'=>$request->get('name'),
              'photo'=>$photo_name,
          ]);
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
        $data = Ourpartner::find($id);
        $data['photo_url']=Path::$domain_url."upload/our_partner_company/".$data->photo;
        return json_encode($data);
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
        $name = $request->get('name');
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = uniqid().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('upload/our_partner_company/'),$photo_name);
            $ourpartner = Ourpartner::find($id);
            $image_path=public_path().'/upload/our_partner_company/'.$ourpartner->photo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            Ourpartner::findOrFail($id)->update([
            'name'=>$name,
            'photo'=>$photo_name
            ]);
        }else {
            Ourpartner::findOrFail($id)->update([
            'name'=>$name
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
        $ourpartner = Ourpartner::find($id);
        $image_path=public_path().'/upload/our_partner_company/'.$ourpartner->photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $ourpartner->delete();
    }

    public function get_all_ourpartner()
    {
        $ourpartners=Ourpartner::orderBy('id', 'desc')->get();
        $arr=[];
        foreach ($ourpartners as $data){
            $ourpartner_data=new OutpartnerData($data->id);
            array_push($arr,$ourpartner_data->getOurpartnerData());
        }
        return json_encode($arr);
    }
}
