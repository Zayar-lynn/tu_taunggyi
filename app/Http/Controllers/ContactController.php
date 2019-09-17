<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\CustomClass\ContactData;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.contact')->with(['url'=>'contact']);
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
      $name = $request->get('name');
      $phone = $request->get('phone');
      $email = $request->get('email');
      $message = $request->get('message');
      Contact::create([
          'name' => $name,
          'email' => $email,
          'phone' => $phone,
          'message' => $message,
      ]);
      return redirect('/contact');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contact = Contact::find($id);
      $contact->delete();
    }

    public function get_all_contact(){
      $contacts=Contact::orderBy('id', 'desc')->get();
        $arr=[];
        foreach ($contacts as $data){
            $contact_data=new ContactData($data->id);
            array_push($arr,$contact_data->getContactData());
        }
         return json_encode($arr);
    }
}
