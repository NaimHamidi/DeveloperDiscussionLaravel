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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'DiscussionController@index')->name('home');

Route::get('/discussion/create',[
    'uses' => 'DiscussionController@create',
    'as' => 'discussion.create'
]);

Route::post('/discussion/store', [
    'uses' => 'DiscussionController@store',
    'as' => 'discussion.store'
]);

Route::get('/discussion/{id}', [
    'uses' => 'DiscussionController@show',
    'as' => 'discussion.show'
]);

Route::post('/discussion/reply/{id}', [
    'uses' => 'DiscussionController@reply',
    'as' => 'discussion.reply'
]);

Route::get('/discussion/edit/{id}', [
    'uses' => 'DiscussionController@edit',
    'as' => 'discussion.edit'
]);

Route::post('/discussion/update/{id}', [
    'uses' => 'DiscussionController@update',
    'as' => 'discussion.update'
]);

Route::get('/discussion/delete/{id}', [
    'uses' => 'DiscussionController@delete',
    'as' => 'discussion.delete'
]);

});



