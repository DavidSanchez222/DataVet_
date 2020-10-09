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

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        // *Home del administrador
        Route::get('/', 'AdminController@index');
        // *Url Productos
        Route::resource('products', 'ProductsController');
        // *Urls Entradas de Productos
        Route::resource('entry_logs', 'EntryLogsController');
        // *Urls Salidas de Productos
        Route::resource('checkouts', 'CheckoutsController');
        // *Urls Inventario
        Route::get('/stocktaking', 'AdminController@stocktaking')->name('stocktaking');
    });
});


// *Urls Configuraciones
Route::get('/settings', 'AdminController@settings')->name('admin.settings');
Route::name('settings.')->group(function(){
    Route::resource('settings/users', 'UserController');
});
Route::get('/settings/roles', 'RolesController@index')->name('settings.roles');
Route::get('/settings/categories', 'CategoriesController@index')->name('settings.categories');
Route::get('/settings/document_types', 'DocumentTypesController@index')->name('settings.document_types');

