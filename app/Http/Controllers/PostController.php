<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use Session;
use App\Post;
use App\Map;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Post $post)
    {
        $data = [];

        $data['records'] = Post::orderBy('title')->paginate(20);

        if($request->filter == 'community'){
            $data['records'] = Post::community()->orderBy('title')->paginate(20);
        }

        if($request->filter == 'myteam'){
            $data['records'] = Post::myteam()->orderBy('title')->paginate(20);
        }

        $data['maps'] = Map::pluck('title', 'id');

        return view('posts.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = Post::create($request->all());

        $record->maps()->attach($request->maps);
        
        Session::flash('flash_message', Lang::get('common.saved'));
        
        return redirect('posts/'.$record->id.'/edit');
    }

    public function show($id)
    {
        $data = [];
        $data['record'] = Post::findOrFail($id);

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
        $data['maps'] = Map::pluck('title', 'id');
        $data['record'] = Post::findOrFail($id);

        return view('layouts.edit', $data);
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

        $record = Post::find($id);

        $record->update($request->all());

        $record->maps()->detach();
        $record->maps()->sync($request->maps);
        
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
        Post::find($id)->delete();
        Session::flash('flash_message', Lang::get('common.deleted'));
        return redirect('posts');
    }
}