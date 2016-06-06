<?php

namespace App\Http\Controllers;
use Dingo\Api\Routing\Helpers;

use DB;

class ExampleController extends Controller
{

     use Helpers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // $this->middleware('oauth');
        // $this->middleware('oauth-user');
        //  //$this->scopes('read_user_data');
          //$this->scopes('read_user_data', 'auth');
           $this->middleware('api.auth');
    }


    public function getuser()
    {

        $user = $this->auth->user();

        return $user;

       // $r = ['user'=>'Liying','name'=>'李莹'];

        $res = DB::table('bqsync_retail_info')
                ->where('RNO','1100000008')
                ->get();


        //$res = new Date();
        $res = Date('Y-m-d h:i:s');

        return $res;     
    }

    public function getauth()
    {
        $res = DB::table('bqsync_retail_info')
                ->where('RNO','1100000008')
                ->get();
        return $res;     
    }


    public function getuser2()
    {

       // $r = ['user'=>'Liying','name'=>'李莹'];

        $res = ["version"=>'v2'];

        return $res;     
    }
   
}
