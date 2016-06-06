<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$api = app('Dingo\Api\Routing\Router');

// $app->get('/', function () use ($app) {
//     return $app->version();
// });

$api->version(['v1','v2'], function ($api) {
    $api->get('users/{id}', 'App\Http\Controllers\ExampleController@getuser');
});

//不同版本号
$api->version('v2.1', function ($api) {
    $api->get('users/{id}', 'App\Http\Controllers\ExampleController@getuser2');
});


// $api->version('v1', function ($api) {
//     $api->get('user/{id}', ['middleware' => 'api.throttle', 'limit' => 10, 'expires' => 5], 'App\Http\Controllers\ExampleController@getuser');
// });
$api->version('v1', function ($api) {
    $api->get('user/{id}', ['middleware' => ['api.throttle','api.auth'], 'limit' => 50, 'expires' => 1, 'scopes' => ['read_user_data', 'write_user_data'], 

    	function () {
        // Only access tokens with the "read_user_data" scope will be given access.

        return ['name'=>'liying'];
    }

    ]);
});



$api->version('v1', function ($api) {
    $api->get('auth/{id}', ['middleware' => ['api.throttle','api.auth'], 'limit' => 50, 'expires' => 1, 'scopes' => ['read_user_data', 'write_user_data'], 

    	'auth' => 'App\Http\Controllers\ExampleController@getauth'

    ]);
});


//$app->get('/getuser', 'ExampleController@getuser');