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

// Route::get('/', 'TodoController@index')->name('index');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@change_completed')->name('change_completed');

Route::get('/add-todo', 'HomeController@create_todo')->name('create_todo');
Route::post('/add-todo', 'HomeController@store_todo')->name('store_todo');

Route::get('/delete-todo/{todo}', 'HomeController@delete_todo')->name('delete_todo');