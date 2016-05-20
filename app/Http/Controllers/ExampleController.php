<?php

namespace App\Http\Controllers;

use DB;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function getuser()
    {

       // $r = ['user'=>'Liying','name'=>'李莹'];

        $res = DB::table('bqsync_retail_info')
                ->where('RNO','1100000008')
                ->first();

        return json_encode($res);     
    }
   
}
