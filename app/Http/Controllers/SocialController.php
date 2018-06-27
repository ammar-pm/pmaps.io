<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function index()
    {
        return view('social.index', ['title' => 'Social']);
    }

}