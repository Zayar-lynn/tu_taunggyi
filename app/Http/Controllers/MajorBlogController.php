<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\CustomClass\BlogData;
use App\CustomClass\Path;
use Illuminate\Support\Facades\Auth;

class MajorBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.major_admin.blog')->with(['url'=>'blog']);
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
      $user = Auth::user();
      $account_id = $user->id;

      $title = $request->get('title');
      $description = $request->get('des');
      $photo = $request->file('photo');
      $photo_name = uniqid().'_'.$photo->getClientOriginalName();
      $photo->move(public_path('upload/blog'),$photo_name);

          Blog::create([
              'title'=>$title,
              'photo'=>$photo_name,
              'description'=>$description,
              'account_id'=>$account_id
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
      $data = Blog::find($id);
      $data['photo_url']=Path::$domain_url."upload/blog/".$data->photo;
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
      $title = $request->get('title');
      $description = $request->get('des');
      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/blog/'),$photo_name);
        $blog = Blog::find($id);
        $image_path=public_path().'/upload/blog/'.$blog->photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        Blog::findOrFail($id)->update([
          'title'=>$title,
          'photo'=>$photo_name,
          'description'=>$description
        ]);
      }else {
        Blog::findOrFail($id)->update([
          'title'=>$title,
          'description'=>$description
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
      $blog = Blog::find($id);
      $image_path=public_path().'/upload/blog/'.$blog->photo;
      if(file_exists($image_path)){
          unlink($image_path);
      }
      $blog->delete();
    }

    public function get_all_major_blog(){
      $user = Auth::user();
      $user_id = $user->id;
       $blogs=Blog::where('account_id',$user_id)->orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($blogs as $data){
           $blog_data=new BlogData($data->id);
           array_push($arr,$blog_data->getBlogData());
       }
        return json_encode($arr);
    }

    public function detail_blog($id){
      $blog_obj = new BlogData($id);
      $blog_detail = $blog_obj->getBlogData();
      return view('admin.major_admin.blog_detail')->with(['detail'=>$blog_detail,'url'=>'blog']);
    }
}
