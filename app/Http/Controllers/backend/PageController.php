<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('backend.pages.index');
 }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPages(Request $request, Page $page)
    {
        $data = $page->getData();

        return \DataTables::of($data)

        ->addColumn('Created_at', function($data) {

            return $date = date('d M Y', strtotime($data->created_at));
        })

        ->addColumn('Actions', function($data) {


            return ' <a href="'.action('App\Http\Controllers\backend\PageController@edit', $data->id).'" class="btn btn-warning btn-xs edit-btn">Edit</a> 
            <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeletePageModal" class="btn btn-danger btn-xs" id="getDeleteId">Delete</button>';
        })

        ->rawColumns(['Created_at','Actions'])

        ->make(true);
    }

    public function create()
    {
      return view('backend.pages.create');
  }


  public function store(Request $request, Page $page)
  {

      $validation = \Validator::make($request->all(),
         [
           'title' => 'required',
           'description' => 'required',

       ]);
      if( $validation->fails() ) {
         return redirect('admin/pages/create')->withErrors($validation->errors());
     }
     else
     {
        $page->storeData($request->all());

        Session::flash('success','Insert record successfully.');
        return redirect('admin/pages');
    }
}

public function edit($id)
{
  $pages = Page::findOrFail($id);
  return view('backend.pages.edit',compact('pages'));
}


public function update(Request $request, $id)
{
    $validator = \Validator::make($request->all(), [
        'title' => 'required',
        'description' => 'required',
    ]);

    if ($validator->fails()) {
     return redirect('/admin/pages/')->withErrors($validation->errors());
 }
 else
 {
     $page = new Page;
     $page->updateData($id, $request->all());

     Session::flash('success','Update record successfully.');
     return redirect('admin/pages');
 }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = new Page;
        $page->deleteData($id);

        return response()->json(['success'=>'Article deleted successfully']);
    }
}