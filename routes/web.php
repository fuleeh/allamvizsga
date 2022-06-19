<?php
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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
//     return view('/');
// });
//Route::get('/new', 'HomeController@new');
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['verified']], function () {
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/user/profile', 'UserController@userProfile')->name('profile');
    Route::post('/user/profile', 'UserController@userProfileDatas');
    Route::get('/user/profile/edit', 'UserController@editUserProfile')->name('editProfile');
    Route::patch('/user/profile/update', 'UserController@updateUserProfile');
});

Route::get('/', 'HomeController@index');
Route::get('/publications', 'HomeController@index')->name('publications');
Route::post('doctor/register', 'UserController@registerDoctor');
Route::get('doctor/{token}/register', 'UserController@registerIndex')->name('registerDoctor');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//Route::get('/publication/{id}', ['as' => 'home.post', 'uses' => 'PostsController@post']);

//Route::group(['middleware' => ['verified']], function () {
//    Route::get('/logout', 'Auth\LoginController@logout');
//    Route::get('/user/profile', 'UserController@userProfile')->name('profile');
//    Route::post('/user/profile', 'UserController@userProfileDatas');
//});
//Route::get('/', function () {
//
//})->middleware('verified');

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
//    Route::get('/doctor', function () {
//        return view('doctor.index');
//    });
    Route::get('/doctor', 'Doctor\DoctorHomeController@index');
    Route::get('/doctor/profile', 'Doctor\DoctorHomeController@edit')->name('doctorProfile');
    Route::post('/doctor/profile', 'Doctor\DoctorHomeController@update');

    Route::resource('doctor/publications', 'Doctor\DoctorPublicationsController', ['names' => [
        'index' => 'doctor.publications.index',
        'create' => 'doctor.publications.create',
        'store' => 'doctor.publications.store',
        'edit' => 'doctor.publications.edit',
    ]]);

    Route::post('doctor/publications/updateStatus', 'Doctor\DoctorPublicationsController@updateStatus');
    Route::post('doctor/patients/updateStatus', 'Doctor\DoctorPatientsController@updateStatus');
    Route::post('doctor/datagather/requests/updateStatus', 'Doctor\DoctorDataRequestController@updateStatus');


    Route::resource('doctor/publicationcategories', 'Doctor\DoctorPublicationCategoriesController', ['names' => [
        'index' => 'doctor.publicationcategories.index',
        'create' => 'doctor.publicationcategories.create',
        'store' => 'doctor.publicationcategories.store',
        'edit' => 'doctor.publicationcategories.edit',
    ]]);

    Route::resource('doctor/patientcategories', 'Doctor\DoctorPatientCategoryController', ['names' => [
        'index' => 'doctor.patientcategories.index',
        'create' => 'doctor.patientcategories.create',
        'store' => 'doctor.patientcategories.store',
        'edit' => 'doctor.patientcategories.edit'
    ]]);

    Route::get('doctor/patients', 'Doctor\DoctorPatientsController@index')->name('doctor.patients.index');


    Route::get('doctor/datagather/requests', 'Doctor\DoctorDataRequestController@index')->name('doctor.datagather.index');
    Route::get('doctor/datagather/create', 'Doctor\DoctorDataRequestController@create')->name('doctor.datagather.create');
    Route::post('doctor/datagather/create', 'Doctor\DoctorDataRequestController@createRequest');
});
//End Doctor

Route::group(['middleware' => ['role:patient']], function () {
    Route::get('patient/datagather/create', 'Patient\PatientDataGatherController@create')->name('patient.datagather.create');
    Route::post('patient/datagather/create', 'Patient\PatientDataGatherController@store');
//    Route::resource('patient/datagather', 'Patient\PatientDataGatherController', ['names' => [
//        'index' => 'patient.datagather.index',
//        'create' => 'patient.datagather.create',
//        'store' => 'patient.datagather.store',
//        'edit' => 'patient.datagather.edit'
//    ]]);
});



Route::get('view', [LanguageController::class, 'view'])->name('view');
Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');



Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

//
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
