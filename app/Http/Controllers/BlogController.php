<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\CustomClass\BlogData;
use App\CustomClass\Path;
use Illuminate\Support\Facades\Auth;
use App\Research;
use App\CustomClass\ResearchData;
use App\Department;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.blog')->with(['url'=>'blog']);
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

    public function get_all_blog(){
       $blogs=Blog::orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($blogs as $data){
           $blog_data=new BlogData($data->id);
           array_push($arr,$blog_data->getBlogData());
       }
        return json_encode($arr);
    }

    public function show_blog(){
      $blogs=Blog::orderBy('id', 'desc')->paginate(3);
      $blog_arr=[];
      foreach ($blogs as $data){
          $blog_data=new BlogData($data->id);
          array_push($blog_arr,$blog_data->getBlogData());
      }

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

        return view('user.blog')->with([
          'blogs'=>$blog_arr,
          'blog_pagi'=>$blogs,
          'researchs'=>$research_arr,
          'dep_name'=>$dep_name,
          'url'=>'blog'
        ]);
    }

    public function blog_detail($blog_id){
      $blog_obj = new BlogData($blog_id);
      $blog_detail = $blog_obj->getBlogData();

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
       }

       $dep_name = Department::all();

      return view('user.blog-post')->with([
        'blog_detail'=>$blog_detail,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'blog'
      ]);
    }
}
