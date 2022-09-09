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
$router->get('company/create', 'CompanyController@CreateCompany');
$router->get('company/update/{id}', 'CompanyController@UpdateCompany');
$router->get('company/delete/{id}', 'CompanyController@DeleteCompany');

// User routes
$router->get('user', 'UserController@GetAllUsers');
$router->get('user/create', 'UserController@CreateUser');
$router->get('user/update/{id}', 'UserController@UpdateUser');
$router->get('user/delete/{id}', 'UserController@DeleteUser');

//Field routes

$router->get('field', 'FieldController@GetAllFields');
$router->get('field/create', 'FieldController@CreateField');
$router->get('field/update/{id}', 'FieldController@UpdateField');
$router->get('field/delete/{id}', 'FieldController@DeleteField');


