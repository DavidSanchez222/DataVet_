<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// *Ruta del homepage
Route::get('/home', 'HomeController@index')->name('home');

// *Rurta principal de la administracion
Route::get('/', 'AdminController@index')->name('admin');

// *Url Productos
Route::get('/products', 'ProductsController@index')->name('admin.products');
Route::get('/products/show', 'ProductsController@show')->name('admin.products.show');
Route::post('/products/add', 'ProductsController@store')->name('admin.products.add');
Route::put('/products/update/{id}', 'ProductsController@update')->name('admin.products.update');
Route::delete('/products/delete/{id}', 'ProductsController@delete')->name('admin.products.delete');

// *Urls Entradas de Productos
Route::get('/entry_logs', 'EntryLogsController@index')->name('admin.entry_logs');
Route::get('/entry_logs/show', 'EntryLogsController@show')->name('admin.entry_logs.show');
Route::post('/entry_logs/add', 'EntryLogsController@store')->name('admin.entry_logs.add');
Route::put('/entry_logs/update/{id}', 'EntryLogsController@update')->name('admin.entry_logs.update');
Route::delete('/entry_logs/delete/{id}', 'EntryLogsController@delete')->name('admin.entry_logs.delete');

// *Urls Salidas de Productos
Route::get('/checkouts', 'CheckoutsController@index')->name('admin.checkouts');
Route::get('/checkouts/show', 'CheckoutsController@show')->name('admin.checkouts.show');
Route::post('/checkouts/add', 'CheckoutsController@store')->name('admin.checkouts.add');
Route::put('/checkouts/update/{id}', 'CheckoutsController@update')->name('admin.checkouts.update');
Route::delete('/checkouts/delete/{id}', 'CheckoutsController@delete')->name('admin.checkouts.delete');

// *Urls Inventario
Route::get('/stocktaking', 'AdminController@stocktaking')->name('admin.stocktaking');

// *Urls Configuraciones
Route::get('/settings', 'AdminController@settings')->name('admin.settings');
Route::get('/settings/users', 'UsersController@index')->name('settings.users');
Route::get('/settings/roles', 'RolesController@index')->name('settings.roles');
Route::get('/settings/categories', 'CategoriesController@index')->name('settings.categories');
Route::get('/settings/document_types', 'DocumentTypesController@index')->name('settings.document_types');

