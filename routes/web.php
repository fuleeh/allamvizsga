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

// Route::get('/', function () {
//     return view('/welcome');
// });
Route::get('/', 'PostsController@index');
Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'PostsController@post']);

Route::post('medical/register', 'UserController@registerMedical');
Route::get('medical/{token}/register', 'UserController@registerIndex')->name('medicalRegister');
Route::get('patient/datas', 'UserController@userData')->name('userData');

Route::get('/post', 'PostsController@index')->name('post');

Route::get('/home', 'PostsController@index')->name('home');

Route::get('publications', 'PostsController@index')->name('publications');

Route::group(['middleware' => ['verified']], function()
{

});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', 'Admin\AdminController@dashboard');

    Route::resource('admin/users', 'Admin\AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
    ]]);

    Route::get('/admin/posts', 'Admin\AdminController@adminPostsList')->name('admin.posts.index');
    Route::get('/admin/invite', 'Admin\AdminInvitesController@index')->name('admin.invite.index');
    Route::post('/admin/invite', 'Admin\AdminInvitesController@sendInvitation');
});

//doki
Route::resource('admin/patientcategories', 'PatientCategoryController',['names'=>[
    'index'=>'admin.patientcategories.index',
    'create'=>'admin.patientcategories.create',
    'store'=>'admin.patientcategories.store',
    'edit'=>'admin.patientcategories.edit'
]]);

Route::post('admin/request/fields', 'AdminRequestsController@createFields');
Route::get('admin/request/fields', 'AdminRequestsController@getFields')->name('admin.request.fields');
Route::get('admin/request/requests', 'AdminRequestsController@index')->name('admin.request.requests');
Route::post('admin/request/requests', 'AdminRequestsController@createRequest')->name('createReq');

Route::group(['middleware' => ['role:doctor']], function () {
    Route::get('/doctor', function()
{
    return view('doctor.index');
});

Route::resource('doctor/posts', 'PostsController',['names'=>[
    'index'=>'doctor.posts.index',
    'create'=>'doctor.posts.create',
    'store'=>'doctor.posts.store',
    'edit'=>'doctor.posts.edit'
]]);

Route::resource('doctor/contentcategories', 'ContentCategoryController',['names'=>[
    'index'=>'doctor.contentcategories.index',
    'create'=>'doctor.contentcategories.create',
    'store'=>'doctor.contentcategories.store',
    'edit'=>'doctor.contentcategories.edit'
]]);
});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


