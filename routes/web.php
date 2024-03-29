<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::post('/borrow/{id}', 'App\Http\Controllers\HomeController@borrow')->name('home.borrow');
Route::post('/return/{id}', 'App\Http\Controllers\HomeController@return')->name('home.return');

Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('home.admin.index');
Route::get('/admin/add', 'App\Http\Controllers\Admin\AdminHomeController@showAdd')->name('home.admin.showAdd');
Route::get('/admin/manage/{id}', 'App\Http\Controllers\Admin\AdminHomeController@showManage')->name('home.admin.showManage');

Route::post('/admin/add', 'App\Http\Controllers\Admin\AdminBookController@addBook')->name('home.admin.add');
Route::post('/admin/books/{id}/manage', 'App\Http\Controllers\Admin\AdminBookController@manageBook')->name('home.admin.manage');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
