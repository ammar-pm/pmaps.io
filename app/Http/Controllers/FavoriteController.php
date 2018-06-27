<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use Session;
use Auth;
use App\Map;

class FavoriteController extends Controller
{

    public function index()
    {
        $data = [];
        $data['records'] = Auth::user()->favorites()->get();
        $data['title']   = Lang::get('common.favoritemaps');

        return view('favorites.index', $data);
    }

    public function favorite($id)
    {
        $record = Map::find($id);

        if ($record->favorites()->get()->count()) {
            $record->favorites()->detach();
             Session::flash('flash_message', Lang::get('common.removedfromfavorites'));
            return back();
        } else {
            $record->favorites()->attach([Auth::user()->id]);
            Session::flash('flash_message', Lang::get('common.addedtofavorites'));
            return back();
        }
    }
}
