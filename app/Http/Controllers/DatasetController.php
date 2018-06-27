<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use View;
use Lang;
use App\Dataset;
use App\Style;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $data = [];
        $data['records'] = Dataset::orderBy('title')->paginate(20);

        if($request->filter == 'community'){
            $data['records'] = Dataset::community()->orderBy('title')->paginate(20);
        }

        if($request->filter == 'myteam'){
            $data['records'] = Dataset::myteam()->orderBy('title')->paginate(20);
        }

        return view('datasets.index', $data);
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

        $input['data'] = !empty($request->data_new) ? $request->data_new : $request->data_old;

         if($input['type'] == "upload") {
        
            $this->uploadFile($request, $input);

            $input['file_data'] = $this->file_data;

        }

 
        $record = Dataset::create($input);

        // //Styles
        // $styles = $request->except(['id', '_method', '_token', 'title', 'type', 'file_type', 'data', 'data_new', 'data_old']);
        // $styles['content'] = serialize($styles);
        
        // $styles['dataset_id'] = $record->id;
        // $style = Style::create($styles);
    
        Session::flash('flash_message', Lang::get('common.saved'));
        
        return redirect('datasets/'.$record->id.'/edit');
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
        $input = $request->all();

        $record = Dataset::find($id);

        $input['data'] = !empty($request->data_new) ? $request->data_new : $request->data_old;

        if($request->data_new) {
        
            $this->uploadFile($request, $input);

            $input['file_data'] = $this->file_data;

        }

        $record->update($input);

        //Styles
        $styles = $request->except(['id', '_method', '_token', 'title', 'type', 'file_type', 'data', 'data_new', 'data_old']);
        $styles['content'] = serialize($styles);

        if(isset($record->styles->id)) {
            $style = Style::find($record->styles->id);
            $style->update($styles);
        } else {
            $styles['dataset_id'] = $record->id;
            $style = Style::create($styles);
        }
        
        Session::flash('flash_message', Lang::get('common.updated'));
        
        return back();
    }


    private function uploadFile($request, $input)
    {
        if(in_array($request->file_type, config('pmaps.zip'))) {
            $this->file_data = null;
        }

        elseif(in_array($request->file_type, config('pmaps.csv'))) {
            $this->file_data = json_encode(array_map("str_getcsv", explode("\n", file_get_contents($request->data_new))));
        }

        elseif(in_array($request->file_type, config('pmaps.json'))){
            $this->file_data = file_get_contents($request->data_new);
        }

      return $this->file_data;

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
        $data['record'] = Dataset::findOrFail($id);
        $data['dataset'] = Dataset::findOrFail($id);

        if (!empty($record['dataset']->file_data) && in_array($data['dataset']->file_type, config('pmaps.csv'))) {

            $file_data = json_decode($data['record']->file_data, true);

            $file_data[0] = str_replace("longitude", "lng", str_replace("latitude", "lat", $file_data[0]));

            $file_data[0] = str_replace("Longitude", "lng", str_replace("Latitude", "lat", $file_data[0]));

            $csv = "";

            foreach($file_data as $csvdata) {
                $csv .= implode(",", $csvdata) . ";";
            }

            $data['csvdata'] = $csv;
        }

        $data['styles'] = unserialize($data['dataset']->styles['content']);

        if (in_array($data['dataset']->file_type, config('pmaps.csv'))) {
                $file_data    = json_decode($data['record']->file_data, true);
                $file_data[0] = str_replace("longitude", "lng", str_replace("latitude", "lat", $file_data[0]));
                $file_data[0] = str_replace("Longitude", "lng", str_replace("Latitude", "lat", $file_data[0]));
                $csv = "";

                foreach($file_data as $csvdata) {
                    $csv .= implode(",", $csvdata) . ";";
                }
        
                $data['dataset']->file_data = addslashes($csv);
        }

        return view('datasets.edit', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['record'] = Dataset::findOrFail($id);
        $data['dataset'] = Dataset::findOrFail($id);

        $data['styles'] = unserialize($data['dataset']->styles['content']);

        if (in_array($data['dataset']->file_type, config('pmaps.csv'))) {
                $file_data    = json_decode($data['dataset']->file_data, true);
                $file_data[0] = str_replace("longitude", "lng", str_replace("latitude", "lat", $file_data[0]));
                $file_data[0] = str_replace("Longitude", "lng", str_replace("Latitude", "lat", $file_data[0]));
                $csv = "";

                foreach($file_data as $csvdata) {
                    $csv .= implode(",", $csvdata) . ";";
                }
        
                $data['dataset']->file_data = addslashes($csv);
        }

        return view('datasets.show', $data);
    }

    // public function preview(Request $request)
    // {
    //     $data = [];

    //     $data['record'] = Dataset::find($request->id);

    //     $dataArray = [];
    //     $datasets[] = (object)array_merge($data['record']->toArray(), $request->all());

    //     foreach ($datasets as $key => $dataset) {

    //        if (in_array($dataset->file_type, config('pmaps.csv'))) {
    //             $file_data    = json_decode($dataset->file_data, true);
    //             $file_data[0] = str_replace("longitude", "lng", str_replace("latitude", "lat", $file_data[0]));
    //             $file_data[0] = str_replace("Longitude", "lng", str_replace("Latitude", "lat", $file_data[0]));
    //             $csv = "";

    //             foreach($file_data as $csvdata) {
    //                 $csv .= implode(",", $csvdata) . ";";
    //             }
        
    //             $dataset->file_data = addslashes($csv);
    //         }

    //         $dataArray[$key] =  $dataset;
    //     }
    //     $data['datasets'] = collect($dataArray);

    //     return View::make('previews.dataset', $data);
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dataset::find($id)->delete();
        Session::flash('flash_message', Lang::get('common.deleted'));
        return redirect('datasets');
    }

    // Edit Table
    public function table($id)
    {
        $data = [];

        $data['data'] = Dataset::find($id);

        $file_data = json_decode($data['data']->file_data, true);

        $data['title'] = $data['data']->title;

        if ($file_data) {
            $data = array_merge($data, $this->getFileData($file_data, $data['data']->file_type));
        }

        $data['file_data'] = $data['data']->file_data;

        return view('datasets.table', $data);
    }

    protected function getFileHeader($data, $type){
        
        if(in_array($type, config('pmaps.json'))){
            return $this->getJsonHeader($data['features'][0]);
        } else {
            return $data[0];
        }
    }

    protected function getFileData($file, $type){
        $data = [];

        if(in_array($type, config('pmaps.json'))){
            
            $data['headers'] = $this->getJsonHeader($file['features'][0]);
            
            $data['rows'] = $this->getJsonRows($file['features']);
            $data['total'] = count($file['features']);
            $data['header_keys'] = $this->getFileHeaderKeys($file['features'][0]);
            
        } else {
            $data['headers'] = $file[0];

            unset($file[0]);

            $data['total'] = count($file);

            $data['rows'] = $file;
        }

        return $data;
    }

    protected function getFileHeaderKeys($data){
        
        $keys = array();
        
        foreach ($data as $key => $value) {

            if (is_array($value)) {
                
                $keys[$key] = $this->getFileHeaderKeys($value);//array_merge($keys,$this->getFileHeaderKeys($value));
            } else {
                $keys[$key] = $key;
            }
        }
        
        return $keys;
    }

    protected function getJsonHeader(array $data, $parent = 0)
    {
        $keys = array();
        
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $key = ($parent ? $parent.'.': '').$key;
                $keys = array_merge($keys, $this->getJsonHeader($value, $key));
            } else {
                $keys[] = ($parent ? $parent.'.': '').$key;
            }
        }

        return $keys;
    }

    protected function getJsonRows(array $data)
    {
        $rows = array();

        foreach ($data as $key => $value) {
            $rows[] = $this->getJsonRow($value);
        }

        return $rows;
    }

    protected function getJsonRow(array $data)
    {
        $values = array();

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $values = array_merge($values, $this->getJsonRow($value));
            } else {
                $values[] = $value;
            }
        }

        return $values;
    }


    public function tableedit(Request $request)
    {
        $record       = Dataset::find($request->data_id);
        $file_data    = json_decode($record->file_data);
        $headerfields = $request->headerfields;
        $updaterow    = array_slice(json_decode($request->row), 1, -1);
        $data_key     = json_decode($request->row)[0];

        if(in_array($record->file_type, config('pmaps.json'))){

            $file_data = json_decode($record->file_data, true);
                
            $updaterow = array_combine($headerfields, array_values($updaterow)); 

            $updated = $this->formatJsonRow($updaterow);

            $file_data['features'][$data_key] = $updated;

            $json = json_encode($file_data);
        } else {
            $updated = $updaterow;
            $file_data[$data_key] = $updated;
            $json = json_encode(array_values($file_data));
        }
        
        $record->update(['file_data' => $json]);
    }

    protected function formatJsonRow($update){
        $row = [];

        foreach ($update as $key => $value){
            $keys = explode(".", $key);

            $data = $value;
            foreach (array_reverse($keys) as $key) {
                $data = array($key => $data);
            }

            $row = array_merge_recursive($row, $data);

        }
        return $row;
    }

    public function tabledelete($value)
    {
        $keyid   = explode("-", $value);
        $key     = $keyid[0];
        $id      = $keyid[1];
        $record = Dataset::find($id);

        if (in_array($record->file_type, config('pmaps.json'))) {

            return $this->tablejsondelete($record, $key);

        }

        $file_data = json_decode($record->file_data);

        if(isset($file_data[$key])){
            unset($file_data[$key]);
            $res = $record->update(['file_data' => json_encode(array_values($file_data))]);
        }

        return "true";
    }

    public function tablejsondelete($record, $key)
    {
        $file_data = json_decode($record->file_data, true);
        $features  = $file_data['features'];

        if(isset($features[$key])){

            unset($features[$key]);
        }

        $file_data['features'] = array_values($features);

        $res = $record->update(['file_data' => json_encode($file_data)]);

        return "true";
    }


}
