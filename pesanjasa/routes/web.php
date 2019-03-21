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
    return $router->app->version();
});

$router->post('/pekerja','PekerjaController@create');
$router->get('/pekerja','PekerjaController@read');
$router->post('/pekerja/{id}','PekerjaController@update');
$router->delete('/pekerja/{id}','PekerjaController@delete');
$router->get('/pekerja/{id}','PekerjaController@detail');

$router->post('/bidangkerja','BidangKerjaController@create');
$router->get('/bidangkerja','BidangKerjaController@read');
$router->post('/bidangkerja/{id}','BidangKerjaController@update');
$router->delete('/bidangkerja/{id}','BidangKerjaController@delete');
$router->get('/bidangkerja/{id}','BidangKerjaController@detail');

