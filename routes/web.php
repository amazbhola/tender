<?php

use App\Http\Controllers\TenderController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// Form Routes=============================================================
//Front end Routes=========================================================
// get route
// TenderController
Route::get('/','TenderController@index')->name('home');

Route::get('/search','TenderController@search')->name('search');
Route::get('/tenderlist','TenderController@tenderlist')->name('tenderlist');


//Backend Routes=========================================================
//TenderController //

Route::get('/tenderform','TenderController@tenderform')->name('tenderform');
Route::get('/backendlistview','TenderController@listview')->name('backendlistview');
Route::get('/edittender/{id}/edit','TenderController@edit')->name('edittender');
Route::post('/edittender/{id}','TenderController@update')->name('updatetender');
Route::delete('/deletetender/{id}','TenderController@destroy')->name('deletetender');
Route::get('/singletender/{id}','TenderController@show')->name('singletender');
// MethodController ===================
Route::get('/methodform','MethodController@index')->name('methodform');
// DistrictController ==================
Route::get('/districtform','DistrictController@index')->name('districtform');
// DepartmentController ================
Route::get('/departmentform','DepartmentController@index')->name('departmentform');

// Post Route =========================================================
// TenderController=================
Route::post('/tenderpost','TenderController@store')->name('tender_store');
// MethodController=================
Route::post('/methodform','MethodController@store')->name('method_store');
// DistrictController===============
Route::post('/districtform','DistrictController@store')->name('district_store');
// DepartmentController============
Route::post('/departmentform','DepartmentController@store')->name('department_store');
Route::resource('/notice', 'TendernoticeController');



// // Admin Route =========================================================


Route::get('/adminlogin', 'AdminController@adminlogin')->name('adminlogin');
Route::get('/admin_dashboard', 'AdminController@admin_dashboard');
Route::post('/admindashboard', 'AdminController@admindashboard')->name('admindashboard');

Route::get('/adminregister','AdminController@adminregister')->name('adminregister');
Route::post('/adminstore','AdminController@store')->name('adminstore');
Route::get('/adminforgotpassword','AdminController@forgotpassword')->name('adminforgotpassword');

// User Route=====================================================================
Route::get('/login','AdminController@userlogin')->name('login');

Route::get('/registeruser','AdminController@usertegister')->name('registeruser');

Route::get('/forgotpassword','AdminController@forgotpassword')->name('forgotpassword');
