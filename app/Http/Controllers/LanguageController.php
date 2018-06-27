<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LanguageController extends Controller
{
    public function index($language)
    {
    	Auth::user()->fill(['language' => $language])->save();
        return redirect()->back();
    }

}