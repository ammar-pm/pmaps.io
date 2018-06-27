<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TrashController extends Controller
{
    public function index()
    {
    	$data = new Collection;

        $classes = ['Map', 'Dataset', 'Post'];

        foreach ($classes as $key => $class) {

            $modelName = "App\\".$class;

            foreach ($modelName::onlyTrashed()->get() as $record) {
                $coll = new Collection;
                $coll->id = $record->id;
                $coll->title = $record->title;
                $coll->type = $class;
                $coll->trash_by = $record->deleter->email;
                $coll->trash_date = $record->deleted_at;
                $data->push($coll);
            }
        }

        return view('trash.index', ['records' => $data]);
    }

    public function restore($type, $id)
    {
        $this->do_restore($type, $id);

        return redirect('trash');
    }

    public function delete($type, $id)
    {
        $this->do_delete($type, $id);

        return redirect('trash');
    }

    public function selected_trash(Request $request)
    {
        if (isset($request->delete)) {
            foreach ($request->ids as $class => $ids) {
                foreach ($ids as $id) {
                    $this->do_delete($class, $id);
                }
            }
        }

        if (isset($request->restore)) {
            foreach ($request->ids as $class => $ids) {
                foreach ($ids as $id) {
                    $this->do_restore($class, $id);
                }
            }
        }
        
        return redirect('trash');
    }

    private function do_restore($type, $id)
    {
        $modelName = "App\\".$type;

        $record = $modelName::withTrashed()->find($id);

        $record->restore();
    }

    private function do_delete($type, $id)
    {
        $modelName = "App\\".$type;

        $record = $modelName::withTrashed()->find($id);

        $record->forcedelete();
    }

}
