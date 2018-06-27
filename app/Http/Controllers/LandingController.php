<?php

namespace App\Http\Controllers;

use Config;
use Session;
use Lang;
use Auth;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\Map;
use App\Category;
use App\Mail\ContactNotify;

class LandingController extends Controller
{

    public function index()
    {        
        $data = [];
        $data['hero'] = true;
        $data['type'] = 'landing';
        $data['categories'] = Category::limit(8)->get();

        return view('landing.index', $data);
    }

    public function contact()
    {
        $data = [];
        $data['hero'] = false;
        $data['title'] = 'Get in Touch';
        $data['type'] = 'page';

        return view('landing.contact', $data);
    }


    public function message(Request $message)
    {

        Mail::to(Config::get('email'))->send(new ContactNotify($message));

        Session::flash('flash_message', Lang::get('common.teamintouch'));

        return back();
    }

}
