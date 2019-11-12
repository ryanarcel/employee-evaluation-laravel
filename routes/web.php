<?php

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
Route::get('/dash', function () {
    return view('defaultdashboard');
})->name('admindashboard');


Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admindashboard');


// ================= evaluation 
Route::get('/evaluation/pick', function () {
    return view('admin.pick-evaluation');
})->name('pick-evaluation');


//==================Evaluation Tool ===================
Route::get('/tools/pick', 'ToolController@getTools')->name('pick-tool');
Route::get('/tools/{id}', 'ToolController@getItems')->name('showTool');
Route::post('/storeItem', 'ToolController@storeItem')->name("storeItem");
Route::post('/updateItem/{id}', 'ToolController@updateItem')->name("updateItem");
Route::get('/deleteItem/{id}', 'ToolController@deleteItem')->name("deleteItem");

//=================Evaluee===============//

Route::resource('evaluees', 'EvalueeController');

Route::resource('teacherTools', 'ToolItemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
