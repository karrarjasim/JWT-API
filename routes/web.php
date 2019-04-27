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
    return' login :POST  https://story-bot.000webhostapp.com/api/public/api/v1/login (email , password)  
    register :POST  https://story-bot.000webhostapp.com/api/public/api/v1/register (username,email , password) 
    get User list : GET https://story-bot.000webhostapp.com/api/public/api/v1/list (authorization required)
';
});

$router->post('/api/v1/login', 'ExampleController@postLogin');
$router->post('/api/v1/register', 'APIController@register');

$router->group(['middleware'=>"auth"],function($router){
$router->get('/api/v1/list', 'APIController@getUsers');
});
$router->post('/api/list', 'APIController@order');
