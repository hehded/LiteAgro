<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureToken;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/company', 'App\Http\Controllers\CompanyController@all')->middleware(EnsureToken::class);
Route::get('/company/{id}', 'App\Http\Controllers\CompanyController@id')->middleware(EnsureToken::class);
Route::post('/company', 'App\Http\Controllers\CompanyController@create');
Route::patch('/company/{id}', 'App\Http\Controllers\CompanyController@update');
Route::delete('/company/{id}', 'App\Http\Controllers\CompanyController@delete');


Route::get('/task', 'App\Http\Controllers\TaskController@all');
Route::post('/task', 'App\Http\Controllers\TaskController@create');
Route::patch('/task/{id}', 'App\Http\Controllers\TaskController@update');
Route::delete('/task/{id}', 'App\Http\Controllers\TaskController@delete');
Route::get('/task/{id}', 'App\Http\Controllers\TaskController@id');

Route::get('/field', 'App\Http\Controllers\FieldController@all');
Route::post('/field', 'App\Http\Controllers\FieldController@create');
Route::patch('/field/{id}', 'App\Http\Controllers\FieldController@update');
Route::delete('/field/{id}', 'App\Http\Controllers\FieldController@delete');
Route::get('/field/{id}', 'App\Http\Controllers\FieldController@id');

Route::get('/user', 'App\Http\Controllers\UserController@all');
Route::post('/user', 'App\Http\Controllers\UserController@create');
Route::patch('/user/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/user/{id}', 'App\Http\Controllers\UserController@delete');
Route::get('/user/{id}', 'App\Http\Controllers\UserController@id');




/*$router->get('company', 'CompanyController@all');
$router->get('company/{id}', 'CompanyController@id');
$router->post('company/post', 'CompanyController@create');
$router->patch('company/patch/{id}', 'CompanyController@update');
$router->delete('company/delete/{id}', 'CompanyController@delete');*/