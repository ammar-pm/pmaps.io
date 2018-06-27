<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Lang;
use Session;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['records'] = Category::paginate(20);

        return view('layouts.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($request->hasFile('icon')) {
        
            $this->uploadFile($request, $input);

            $input['icon'] = $this->file;

        }

        $record = Category::create($input);
    
        Session::flash('flash_message', Lang::get('common.saved'));
        
        return back();
    }

    public function show($id)
    {
        $data = [];
        $data['record'] = Category::findOrFail($id);
        $data['title']  = $data['record']->title;

        return view('layouts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['record'] = Category::findOrFail($id);
        $data['title'] = $data['record']->title;

        return view('layouts.edit', $data);
    }



    public function update(Request $request, $id)
    {
        $input = $request->all();

        $record = Category::find($id);

        if($request->hasFile('icon')) {
        
            $this->uploadFile($request, $input);

            $input['icon'] = $this->file;

        }

        $record->update($input);
        
        Session::flash('flash_message', Lang::get('common.updated'));
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        Session::flash('flash_message', Lang::get('common.deleted'));
        return redirect('categories');
    }

    private function uploadFile($request, $input)
    {
        $file = $request->file('icon')->getClientOriginalName();

        $request->file('icon')->storeAs('icons', $file, 'public');

        $this->file = $file;

        return $file;
    }

}