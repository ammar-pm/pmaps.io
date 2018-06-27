<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Session;
use Lang;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Style;
use App\Dataset;

class StyleController extends Controller
{

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['content'] = serialize($input);

        $record = Style::find($id);
        
        $record->update($input);

        Session::flash('flash_message', Lang::get('common.saved'));
        return back();
    }

}
