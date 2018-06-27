<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Session;
use App\Map;
use App\Dataset;
use App\Tileset;
use App\Category;
use App\User;
use Auth;
use View;
use Lang;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Map $record)
    {
        $data = [];
        $data['records'] = Map::orderBy('title')->paginate(20);

        if($request->filter == 'community'){
            $data['records'] = Map::community()->orderBy('title')->paginate(20);
        }

        if($request->filter == 'myteam'){
            $data['records'] = Map::myteam()->orderBy('title')->paginate(20);
        }
        
        $data['datasets_list']        = Dataset::pluck('title', 'id');
        $data['tilesets_list']        = Tileset::pluck('title', 'id');
        $data['categories_list']      = Category::pluck('title', 'id');
        $data['categories']           = Category::all();

        return view('maps.index', $data);
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

        $input['team_id'] = Auth::user()->currentTeam->id;

        $record = Map::create($input);

        if ($request->datasets) {
            $record->datasets()->attach($request->datasets);
        }

        if ($request->tilesets) {
            $record->tilesets()->attach($request->tilesets);
        }

        if ($request->categories) {
            $record->categories()->attach($request->categories);
        }

        if ($request->map_legend) {
            $record->legends()->createMany($request->map_legend);
        }
        
        Session::flash('flash_message', Lang::get('common.saved'));
        
        return redirect('maps/'.$record->id.'/edit');
    }


    public function show($id)
    {

        $data = [];
        $data['record']     = Map::findOrFail($id);
        $data['tags']       = explode(',', $data['record']->tags);
        $data['legends']    = $data['record']->legends()->orderBy('sort', 'ASC')->get();


        $dataArray = [];

        foreach ($data['record']->datasets as $key => $dataset) {

            if ($dataset) {

                   if (in_array($dataset->file_type, config('pmaps.csv'))) {
                        $file_data    = json_decode($dataset->file_data, true);
                        $file_data[0] = str_replace("longitude", "lng", str_replace("latitude", "lat", $file_data[0]));
                        $file_data[0] = str_replace("Longitude", "lng", str_replace("Latitude", "lat", $file_data[0]));
                        $csv = "";

                        foreach($file_data as $csvdata) {
                            $csv .= implode(",", $csvdata) . ";";
                        }
                
                        $dataset->file_data = addslashes($csv);
                    }

                $dataArray[$key] =  $dataset;

            }
        }

        $data['datasets'] = collect($dataArray);

        if(count($data['record']->tilesets)) {
            $data['tilesets'] = $data['record']->tilesets;
        } else {
            $data['tilesets'] = collect([ (object) config('pmaps.map.tileset') ]);
        }
        
        return view('maps.show', $data);
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
        $data['record']     = Map::findOrFail($id);
        $data['datasets_list']   = Dataset::pluck('title', 'id');
        $data['tilesets_list']   = Tileset::pluck('title', 'id');
        $data['categories_list'] = Category::pluck('title', 'id');
        $data['tags']       = explode(',', $data['record']->tags);
        $data['legends']    = $data['record']->legends()->orderBy('sort', 'ASC')->get();

        $dataArray = [];

        foreach ($data['record']->datasets as $key => $dataset) {

            if ($dataset) {

                   if (in_array($dataset->file_type, config('pmaps.csv'))) {
                        $file_data    = json_decode($dataset->file_data, true);
                        $file_data[0] = str_replace("longitude", "lng", str_replace("latitude", "lat", $file_data[0]));
                        $file_data[0] = str_replace("Longitude", "lng", str_replace("Latitude", "lat", $file_data[0]));
                        $csv = "";

                        foreach($file_data as $csvdata) {
                            $csv .= implode(",", $csvdata) . ";";
                        }
                
                        $dataset->file_data = addslashes($csv);
                    }

                $dataArray[$key] =  $dataset;

            }
        }

        $data['datasets'] = collect($dataArray);

        if(count($data['record']->tilesets)) {
            $data['tilesets'] = $data['record']->tilesets;
        } else {
            $data['tilesets'] = collect([ (object) config('pmaps.map.tileset') ]);
        }
        
        return view('maps.edit', $data);
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
        $datasets  = [];
        $legendorder = json_decode($request->legendorder);

        $record = Map::find($id);

        $record->update($request->all());

        $record->datasets()->detach();
        if ($request->datasets) {
            $record->datasets()->attach($request->datasets);
        }

        $record->tilesets()->detach();
        if ($request->tilesets) {
            $record->tilesets()->attach($request->tilesets);
        }

        $record->categories()->detach();
        if ($request->categories) {
            $record->categories()->attach($request->categories);
        }

        $record->legends()->delete();
        if ($request->map_legend) {
            $record->legends()->createMany($request->map_legend);
        }

        Session::flash('flash_message', Lang::get('common.updated'));
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function preview(Request $request)
    // {
    //     $data = [];

    //     $data['record'] = Map::find($request->id);
        
    //     $dataArray = [];

    //     foreach ($data['record']->datasets as $key => $dataset) {

    //         if ($dataset) {

    //                if (in_array($dataset->file_type, config('pmaps.csv'))) {
    //                     $file_data    = json_decode($dataset->file_data, true);
    //                     $file_data[0] = str_replace("longitude", "lng", str_replace("latitude", "lat", $file_data[0]));
    //                     $file_data[0] = str_replace("Longitude", "lng", str_replace("Latitude", "lat", $file_data[0]));
    //                     $csv = "";

    //                     foreach($file_data as $csvdata) {
    //                         $csv .= implode(",", $csvdata) . ";";
    //                     }
                
    //                     $dataset->file_data = addslashes($csv);
    //                 }

    //             $dataArray[$key] =  $dataset;

    //         }
    //     }

    //     $data['datasets'] = collect($dataArray);

    //     if(count($data['record']->tilesets)) {
    //         $data['tilesets'] = $data['record']->tilesets;
    //     } else {
    //         $data['tilesets'] = collect([ (object) config('pmaps.map.tileset') ]);
    //     }

    //     return View::make('previews.map', $data);
    // }

    public function destroy($id)
    {
        Map::find($id)->delete();
        Session::flash('flash_message', Lang::get('common.deleted'));
        return redirect('maps');
    }
}