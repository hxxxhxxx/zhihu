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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/explore', 'ExploreController@index');
// 话题动态
Route::get('/topic', 'TopicController@index');
// 话题广场
Route::get('/topics', 'TopicController@topicPlaza');

Route::get('/admin', 'Admin\DashboardController@index');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('dashboard', 'DashboardController@index');
    Route::resource('users', 'UserController');
    Route::resource('topics', 'TopicController');
});
