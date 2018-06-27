<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Session;
use Lang;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {   
        return view('settings.index');
    }

    public function update(Request $request)
    {

        $settings = array();

        $input = $request->all();

        foreach($input['settings'] as $key => $item){
            $setting = Setting::firstOrNew(['key' => $key]);
            $setting->value = $item;
            $setting->save();
        }
        
        Session::flash('flash_message', Lang::get('common.updated'));

        return redirect()->back();
        
    }

}