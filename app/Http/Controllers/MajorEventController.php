<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\CustomClass\EventData;
use App\CustomClass\Path;
use Illuminate\Support\Facades\Auth;

class MajorEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.major_admin.event')->with(['url'=>'event']);
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
      $date = $request->get('date');
      $timing = $request->get('timing');
      $photo = $request->file('photo');
      $photo_name = uniqid().'_'.$photo->getClientOriginalName();

      //return $description;
      $photo->move(public_path('upload/event'),$photo_name);
      
          Event::create([
              'title'=>$title,
              'photo'=>$photo_name,
              'description'=>$description,
              'date'=>$date,
              'timing'=>$timing,
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
      $data = Event::find($id);
      $data['photo_url']=Path::$domain_url."upload/event/".$data->photo;
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
      $date = $request->get('date');
      $timing = $request->get('timing');
      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/event/'),$photo_name);
        $event = Event::find($id);
        $image_path=public_path().'/upload/event/'.$event->photo;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        Event::findOrFail($id)->update([
          'title'=>$title,
          'photo'=>$photo_name,
          'description'=>$description,
          'date'=>$date,
          'timing'=>$timing
        ]);
      }else {
        Event::findOrFail($id)->update([
          'title'=>$title,
          'description'=>$description,
          'date'=>$date,
          'timing'=>$timing
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
      $event = Event::find($id);
      $image_path=public_path().'/upload/event/'.$event->photo;
      if(file_exists($image_path)){
          unlink($image_path);
      }
      $event->delete();
    }

    public function get_all_major_event(){
       $user = Auth::user();
       $user_id = $user->id;
       $events=Event::where('account_id',$user_id)->orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($events as $data){
           $event_data=new EventData($data->id);
           array_push($arr,$event_data->getEventData());
       }
        return json_encode($arr);
    }

    public function detail_event($id){
      $event_obj = new EventData($id);
      $event_detail = $event_obj->getEventData();
      return view('admin.major_admin.event_detail')->with(['detail'=>$event_detail,'url'=>'event']);
    }

}
