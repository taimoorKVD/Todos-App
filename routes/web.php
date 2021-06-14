<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
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

Route::group([ 'prefix' => 'todos', 'as' => 'todo.'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'TodosController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'TodosController@create']);
    Route::get('/show/{todo}', ['as' => 'show', 'uses' => 'TodosController@show']);
    Route::post('/store', ['as' => 'store', 'uses' => 'TodosController@store']);
    Route::get('/edit/{todo}', ['as' => 'edit', 'uses' => 'TodosController@edit']);
    Route::post('/update/{todo}', ['as' => 'update', 'uses' => 'TodosController@update']);
    Route::get('/delete/{todo}', ['as' => 'delete', 'uses' => 'TodosController@destroy']);
    Route::get('/markAsCompleted/{todo}', ['as' => 'markAsCompleted', 'uses' => 'TodosController@markAsCompleted']);
});
