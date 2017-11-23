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

Route::get('/new','articleCont@addArticle')->name('new');
Route::post('/new','articleCont@addArticle');

Route::get('/read/{id}','articleCont@readArticle')->name('read');
Route::post('/read/{id}','articleCont@readArticle');
Route::get('/showArticles','articleCont@showUserArticles')->name('show');
Route::post('/showArticles/{id}','articleCont@delArticle')->name('del');