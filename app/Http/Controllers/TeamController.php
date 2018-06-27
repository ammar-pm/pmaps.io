<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use Session;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data['records'] = Team::orderBy('name')->paginate(20);

        return view('groups.index', $data);
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
        $data['record'] = Team::findOrFail($id);

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

        $record = Team::find($id);

        $record->update($request->all());

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
        Team::find($id)->delete();
        Session::flash('flash_message', Lang::get('common.deleted'));
        return redirect('groups');
    }
}