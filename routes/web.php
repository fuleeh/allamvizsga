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
//     return view('/home');
// });
Route::get('/', 'HomeController@index');
Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/publications', 'HomeController@index')->name('publications');
Route::get('/user/profile', 'UserController@userProfile')->name('profile');
Route::post('/user/profile', 'UserController@userProfileDatas');

Route::post('doctor/register', 'UserController@registerDoctor');
Route::get('doctor/{token}/register', 'UserController@registerIndex')->name('registerDoctor');



//Route::get('/publication/{id}', ['as' => 'home.post', 'uses' => 'PostsController@post']);

Route::group(['middleware' => ['verified']], function () {

});

//Admin
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', 'Admin\AdminController@dashboard');

    Route::resource('admin/users', 'Admin\AdminUsersController', ['names' => [
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'
    ]]);

    Route::get('/admin/publications', 'Admin\AdminController@adminPubsList')->name('admin.publications.index');
    Route::get('/admin/invite', 'Admin\AdminInvitesController@index')->name('admin.invite.index');
    Route::post('/admin/invite', 'Admin\AdminInvitesController@sendInvitation');
});
//End Admin

//Doctor
Route::group(['middleware' => ['role:doctor']], function () {
    Route::get('/doctor', function () {
        return view('doctor.index');
    });

    Route::resource('doctor/publications', 'Doctor\DoctorPublicationsController', ['names' => [
        'index' => 'doctor.publications.index',
        'create' => 'doctor.publications.create',
        'store' => 'doctor.publications.store',
        'edit' => 'doctor.publications.edit'
    ]]);

    Route::resource('doctor/publicationcategories', 'Doctor\DoctorPublicationCategoriesController', ['names' => [
        'index' => 'doctor.publicationcategories.index',
        'create' => 'doctor.publicationcategories.create',
        'store' => 'doctor.publicationcategories.store',
        'edit' => 'doctor.publicationcategories.edit'
    ]]);

    Route::resource('doctor/patientcategories', 'Doctor\DoctorPatientCategoryController', ['names' => [
        'index' => 'doctor.patientcategories.index',
        'create' => 'doctor.patientcategories.create',
        'store' => 'doctor.patientcategories.store',
        'edit' => 'doctor.patientcategories.edit'
    ]]);

    Route::post('doctor/request/fields', 'Doctor\DoctorDataRequestController@createFields');
    Route::get('doctor/request/requests', 'Doctor\DoctorDataRequestController@index')->name('doctor.request.index');
    Route::get('doctor/request/fields', 'Doctor\DoctorDataRequestController@getFields')->name('doctor.request.fields');
    Route::get('doctor/request/create', 'Doctor\DoctorDataRequestController@create')->name('doctor.request.create');
    Route::post('doctor/request/create', 'Doctor\DoctorDataRequestController@createRequest');
});
//End Doctor


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


