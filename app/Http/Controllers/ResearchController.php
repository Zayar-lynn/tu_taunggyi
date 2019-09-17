<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\CustomClass\ResearchData;
use App\CustomClass\Path;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.research')->with(['url'=>'research']);
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

      $name_of_peer = $request->get('name_of_peer');
      $research_title = $request->get('research_title');
      $author = $request->get('author');
      $subject = $request->get('subject');
      $year = $request->get('year');

      $pdf = $request->file('pdf');
      $pdf_name = uniqid().'_'.$pdf->getClientOriginalName();
      $pdf->move(public_path('upload/pdf'),$pdf_name);

        Research::create([
            'name_of_peer'=>$name_of_peer,
            'research_title'=>$research_title,
            'author'=>$author,
            'subject'=>$subject,
            'year'=>$year,
            'pdf'=>$pdf_name,
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
      $data = Research::find($id);
      $data['pdf_url']=Path::$domain_url."upload/pdf/".$data->pdf;
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
      $name_of_peer = $request->get('name_of_peer');
      $research_title = $request->get('research_title');
      $author = $request->get('author');
      $subject = $request->get('subject');
      $year = $request->get('year');

      if($request->hasFile('pdf')){
        $pdf = $request->file('pdf');
        $pdf_name = uniqid().'_'.$pdf->getClientOriginalName();
        $pdf->move(public_path('upload/pdf'),$pdf_name);
        $research = Research::find($id);
        $pdf_path=public_path().'/upload/pdf/'.$research->pdf;
        if(file_exists($pdf_path)){
            unlink($pdf_path);
        }
        Research::findOrFail($id)->update([
            'name_of_peer'=>$name_of_peer,
            'research_title'=>$research_title,
            'author'=>$author,
            'subject'=>$subject,
            'year'=>$year,
            'pdf'=>$pdf_name
        ]);
      }else {
        Research::findOrFail($id)->update([
          'name_of_peer'=>$name_of_peer,
          'research_title'=>$research_title,
          'author'=>$author,
          'subject'=>$subject,
          'year'=>$year
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
      $research = Research::find($id);
      $pdf_path=public_path().'/upload/pdf/'.$research->pdf;
      if(file_exists($pdf_path)){
          unlink($pdf_path);
      }
      $research->delete();
    }

    public function get_all_research(){
      $researchs=Research::orderBy('id', 'desc')->get();
       $arr=[];
       foreach ($researchs as $data){
           $research_data=new ResearchData($data->id);
           array_push($arr,$research_data->getResearchData());
       }
        return json_encode($arr);
    }
}
