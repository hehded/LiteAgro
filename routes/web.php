<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


use Illuminate\Support\Facades\Route;



// $router->/*get('/products', 'ProductController@index');


// $router->get('/products/{id}', 'ProductController@show');


// $router->post('/products/create', 'ProductController@store');


// $router->post('/products/update/{id}', 'ProductController@update');


// $router->delete('/products/delete/{id}', 'ProductController@destroy');*/

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/


// Company routes
$router->get('company', ['middleware'=>'auth', 'uses'=>'CompanyController@all']);
$router->get('company/{id}', 'CompanyController@id');
$router->get('company/json', 'CompanyController@GetCompanyJson');
$router->post('company/post', 'CompanyController@create');
$router->patch('company/patch/{id}', 'CompanyController@update');
$router->delete('company/delete/{id}', 'CompanyController@delete');

// User routes
$router->get('user', 'UserController@all');
$router->post('user/post', 'UserController@create');
$router->patch('user/patch/{id}', 'UserController@update');
$router->delete('user/delete/{id}', 'UserController@delete');

//Field routes

$router->get('field', 'FieldController@all');
$router->post('field/post', 'FieldController@create');
$router->patch('field/patch/{id}', 'FieldController@update');
$router->delete('field/delete/{id}', 'FieldController@delete');


