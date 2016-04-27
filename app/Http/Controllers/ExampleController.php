<?php

namespace App\Http\Controllers;

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
        $r = ['user'=>'Liying','name'=>'李莹'];
        echo json_encode($r);     
    }
   
}
