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

// *Urls Registro Nuevo Usuario
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// *Url Homepage
Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        // *Rurta principal de la administracion
        Route::get('/', 'AdminController@index');
        // *Url Productos
        Route::resource('products', 'ProductsController');
        // *Urls Entradas de Productos
        Route::resource('entry_logs', 'EntryLogsController');
        // *Urls Salidas de Productos
        Route::resource('checkouts', 'CheckoutsController');
        // *Url Inventario
        Route::get('/stocktaking', 'AdminController@stocktaking')->name('stocktaking');
        // *Urls Configuraciones
        Route::prefix('settings')->name('settings.')->group(function(){
            // *Url de la vista principal de las configuraciones
            Route::get('/', 'AdminController@settings')->name('index');
            // *Urls Configuracion de Usuarios
            Route::resource('users', 'UserController');
            // *Urls Configuracion de Roles
            Route::resource('roles', 'RolesController');
            // *Urls Configuracion de Categorias
            Route::resource('categories', 'CategoriesController');
            // *Urls Configuracion de Tipos de Documento
            Route::resource('document_types', 'DocumentTypesController');
        });
    });
});

