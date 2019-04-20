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

$router->get('/', function () use ($router) {
    return "ok";
});

$router->post('/api/login', 'ExampleController@postLogin');
$router->post('/api/register', 'APIController@register');

$router->group(['middleware'=>"auth"],function($router){


});
$router->get('/api/list', 'APIController@getUsers');
$router->post('/api/list', 'APIController@order');
