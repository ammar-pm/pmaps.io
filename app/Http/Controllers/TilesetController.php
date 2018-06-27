<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Tileset;
use Auth;
use View;
use Lang;

class TilesetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['records'] = Tileset::paginate(20);

        return view('tilesets.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tileset::create($request->all());
        
        Session::flash('flash_message', Lang::get('common.saved'));
        
        return back();
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
        $data['record'] = Tileset::findOrFail($id);

        return view('tilesets.edit', $data);
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
        $record = Tileset::find($id);
		
        $record->update($request->all());
        
        Session::flash('flash_message', Lang::get('common.updated'));

        
        return back();
    }

    public function preview(Request $request)
    {
        $data = [];

        $data['record'] = (object) $request->all();

        return View::make('previews.tileset', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tileset::find($id)->delete();
        Session::flash('flash_message', Lang::get('common.deleted'));
        return redirect('tilesets');
    }
}
