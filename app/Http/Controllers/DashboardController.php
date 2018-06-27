<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Post;
use App\Map;
use App\Category;
use App\Team;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data = [];
        $data['posts']      = Post::latest()->limit(6)->get();
        $data['maps']       = Map::latest()->limit(6)->get();
        $data['categories'] = Category::orderBy('title')->limit(10)->get();
        $data['authors']    = Team::orderBy('name')->limit(6)->get();

        return view('dashboard.index', $data);
    }

}
