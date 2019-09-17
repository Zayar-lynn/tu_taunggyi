<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\CustomClass\EventData;
use App\CustomClass\Path;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Research;
use App\CustomClass\ResearchData;
use App\Department;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.event')->with(['url'=>'event']);
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

      $photos = $request->file('photo');
      $photo_arr = [];

      foreach($photos as $photo){
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        array_push($photo_arr,$photo_name);
        $photo->move(public_path('upload/event'),$photo_name);
      }

      Event::create([
          'title'=>$request->get('title'),
          'photo'=>serialize($photo_arr),
          'description'=>$request->get('des'),
          'date'=>$request->get('date'),
          'timing'=>$request->get('timing'),
          'account_id'=>$account_id
      ]);

      // $title = $request->get('title');
      // $description = $request->get('des');
      // $date = $request->get('date');
      // $timing = $request->get('timing');
      // $photo = $request->file('photo');
      // $photo_name = uniqid().'_'.$photo->getClientOriginalName();
      // $photo->move(public_path('upload/event'),$photo_name);

      //     Event::create([
      //         'title'=>$title,
      //         'photo'=>$photo_name,
      //         'description'=>$description,
      //         'date'=>$date,
      //         'timing'=>$timing,
      //         'account_id'=>$account_id
      //     ]);
      //return $account_id;
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

    public function get_all_event(){
       $events=Event::orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($events as $data){
           $event_data=new EventData($data->id);
           array_push($arr,$event_data->getEventData());
       }
        return json_encode($arr);
    }

    public function show_event(){
      $events=Event::where('date', '>=', date('Y-m-d'))->orderBy('date')->get();
      $event_arr=[];
      foreach ($events as $data){
          $event_data=new EventData($data->id);
          array_push($event_arr,$event_data->getEventData());
      }

      $events_complete=Event::where('date', '<', date('Y-m-d'))->orderBy('date','desc')->get();
      $event_arr_complete=[];
      foreach ($events_complete as $data){
          $event_data=new EventData($data->id);
          array_push($event_arr_complete,$event_data->getEventData());
      }

      $researchs=Research::orderBy('id', 'desc')->limit(5)->get();
       $research_arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($research_arr,$research_data->getResearchData());
      }

      $dep_name = Department::all();

      return view('user.events')->with([
        'events'=>$event_arr,
        'events_complete'=>$event_arr_complete,
        'researchs'=>$research_arr,
        'dep_name'=>$dep_name,
        'url'=>'event'
      ]);
    }
}
