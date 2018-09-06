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

//Company

Route::get('/company', [
    'uses' => 'CompanyController@index',
    'as' => 'company.index'
]);

Route::get('company/create', [
    'uses' => 'CompanyController@create',
    'as' => 'company.create'
]);

Route::post('company/store', [
    'uses' => 'CompanyController@store',
    'as' => 'company.store'
]);

Route::get('company/{id}/edit', [
    'uses' => 'CompanyController@edit',
    'as' => 'company.edit'
]);

Route::post('company/update', [
    'uses' => 'CompanyController@update',
    'as' => 'company.update'
]);

Route::post('/company/destroy', [
    'uses' => 'CompanyController@destroy',
    'as' => 'company.destroy'
]);