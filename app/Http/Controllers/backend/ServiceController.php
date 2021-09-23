<?php

namespace App\Http\Controllers\backend;

use Request;
use App\Models\Service;
use App\Category;
use Auth;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $service = Service::all();

      return view('backend.service.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = Request::all();
      $validation = Validator::make($input,
       [
       'title' => 'required',
       'body' => 'required',
       'image' => 'required',
       ]);
      if( $validation->fails() ) {
       return redirect('admin/service/create')->withErrors($validation->errors());
     }
     else
     {

       $imageFiles = Input::file('image');

       if(isset($imageFiles))
       {
         $name=str_random(6).'_'.$imageFiles->getClientOriginalName();
         $imageFiles->move(public_path().'/backend/images/service/',$name);  
         $imagedata = $name;  

       }else{
         $imagedata = ''; 
       }
       $dataArray = array(
        "user_id"     =>   Auth::user()->id,
        "title"     =>   $input['title'],
        "body"   =>      $input['body'],
        "slug"      =>   str_slug($input['title']),
        "image"   =>      $imagedata
        );


       Service::create($dataArray);
       Session::flash('success','Insert record successfully.');
       return redirect('admin/service');
     }
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $service = Service::find($id);

      return view('backend.service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $service = Service::findOrFail($id);

      return view('backend.service.edit',compact('service'));
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
     $service = Service::findOrFail($id);
     $input = Request::all();

     $validation = Validator::make($input,
       [
       'title' => 'required',
       'body' => 'required',
       ]);

     if( $validation->fails() ) {
       return redirect('/admin/service/'.$id.'/edit')->withErrors($validation->errors());
     }
     else
     {

      
          $imageFiles = $input->file('image');

      if($imageFiles){
        $name=str_random(6).'_'.$imageFiles->getClientOriginalName();
        $imageFiles->move(public_path().'/backend/images/service/',$name);   

        $service->image=$name;
      }
      


      $service->title =$input['title'];
      $service->slug =str_slug($input['title']);
      $service->body=$input['body'];
      $service->updated_at=Carbon::now();
      $service->save();

      Session::flash('success','Update record successfully.');
      return redirect('admin/service');
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
      $service = Service::findOrFail($id);
      $service->delete();
      Session::flash('success','Successfully deleted.');
      return redirect('admin/service');
    }
  }
