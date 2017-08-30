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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api/', 'middleware' => 'cors'], function ($app) {
    $app->options('/', 'TodoController@options'); //get all the routes
    $app->options('/{id}/', 'TodoController@options'); //get all the routes
    $app->get('/', 'TodoController@index'); //get all the routes
    $app->post('/', 'TodoController@store'); //store single route
    $app->get('/{id}/', 'TodoController@show'); //get single route
    $app->put('/{id}/', 'TodoController@update'); //update single route
    $app->delete('/{id}/', 'TodoController@destroy'); //delete single route
});
