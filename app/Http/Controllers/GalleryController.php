<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\CustomClass\GalleryData;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.gallery')->with(['url'=>'gallery']);
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
        $photos=$request->file('photo');
        foreach($photos as $photo){
            $photo_ori_name=$photo->getClientOriginalName();
            $photo_name=time().'_'.$photo_ori_name;
            $photo->move(public_path('images/gallery'),$photo_name);

            Gallery::create([
                'photo' => $photo_name,
            ]);
        }
        return response()->json(true);
    }

     public function getImageData(){
        $gallerys=Gallery::orderBy('created_at','Desc')->get();
        $gallery_arrr=array();
        foreach($gallerys as $gallery){
            $obj=new GalleryData($gallery->id);
            array_push($gallery_arrr,$obj->getGalleryData());
        }

        return response()->json($gallery_arrr);
    }

    public function editImage($id){
        $obj=new GalleryData($id);
        return response()->json($obj->getGalleryData());
    }

    public function updateImage(Request $request){
        $photo=$request->file('photo');
        $update_photo=Gallery::find($request->get('id'));
        if(isset($photo)){
                if(file_exists(public_path('images/gallery/'.$update_photo->photo))){
                    unlink(public_path('images/gallery/'.$update_photo->photo));
                }
                $photo_ori_name=$photo->getClientOriginalName();
                $photo_name=time().'_'.$photo_ori_name;
                $photo->move(public_path('images/gallery'),$photo_name);
                $update_photo->photo=$photo_name;
        }else{
            $update_photo->photo=$update_photo->photo;
        }

        $res=$update_photo->update();
        if($res){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function deleteImage($id){
        $delete_image=Gallery::find($id);
            if(file_exists(public_path('images/gallery/'.$delete_image->photo))){
                unlink(public_path('images/gallery/'.$delete_image->photo));
            }
        $res=$delete_image->delete();
        if($res){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }
}
