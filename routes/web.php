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
$router->get('company', 'CompanyController@GetAllCompany');
$router->get('company/{id}', 'CompanyController@GetCompanyId');
$router->get('company/json', 'CompanyController@GetCompanyJson');
$router->post('company/post', 'CompanyController@CreateCompany');
$router->patch('company/patch/{id}', 'CompanyController@UpdateCompany');
$router->delete('company/delete/{id}', 'CompanyController@DeleteCompany');

// User routes
$router->get('user', 'UserController@GetAllUsers');
$router->post('user/post', 'UserController@CreateUser');
$router->patch('user/patch/{id}', 'UserController@UpdateUser');
$router->delete('user/delete/{id}', 'UserController@DeleteUser');

//Field routes

$router->get('field', 'FieldController@GetAllFields');
$router->post('field/post', 'FieldController@CreateField');
$router->patch('field/patch/{id}', 'FieldController@UpdateField');
$router->delete('field/delete/{id}', 'FieldController@DeleteField');


