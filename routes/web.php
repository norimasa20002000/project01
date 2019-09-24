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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//投稿フォームページ
Route::group(['middleware' => 'auth'], function () {
    Route::get('/document', 'DocumentsController@showCreateForm')->name('documents.create');
    Route::post('/document', 'DocumentsController@create');
});

//投稿一覧ページ
Route::get('/document/index', 'DocumentsController@index')->name('documents.index')->middleware('auth');;


//投稿確認ページ
Route::get('/document/{document}', 'DocumentsController@detail')->name('documents.detail')->middleware('auth');;

//投稿編集ページ
Route::get('/document/{document}/edit', 'DocumentsController@edit')->name('documents.edit')->middleware('auth');;

 //アップデート
Route::patch('/document/{document}', 'DocumentsController@update');
