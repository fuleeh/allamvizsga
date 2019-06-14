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

Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'PostsController@post']);

Route::post('medical/register', 'UserController@registerMedical');
Route::get('medical/{token}/register', 'UserController@registerIndex')->name('medicalRegister');
Route::get('patient/datas', 'UserController@userData')->name('userData');;

Route::group(['middleware' => ['verified']], function()
{

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post', 'PostsController@index')->name('post');

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::get('/admin/invite', 'InvitesController@index')->name('admin.invite.index');
    Route::post('/admin/invite', 'InvitesController@sendInvitation');

    Route::get('/admin', 'AdminController@index');

    Route::resource('admin/users', 'AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'
    ]]);

    Route::get('/admin/posts', 'AdminPostsController@index')->name('admin.posts.index');

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

});

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

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


