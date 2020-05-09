<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SliderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $tables = DB::select('SHOW TABLES');
        // foreach($tables as $key => $table){
        //     echo '<pre>';
        //     print_r($table);
        //     echo '<pre>';
        // }
        return view('admin.slider.index');
    }
}
