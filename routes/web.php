<?php

use App\Http\Controllers\NoticiaController;
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

Route::prefix('noticia')->group(function () {

    Route::get('/' , 'App\Http\Controllers\NoticiaController@index')->name('noticia.index');

    Route::get('/cadastro' , 'App\Http\Controllers\NoticiaController@create')->name('noticia.create')->middleware('auth');

    Route::post('/' , 'App\Http\Controllers\NoticiaController@store')->name('noticia.store')->middleware('auth');

    Route::get('/{id}/editar' , 'App\Http\Controllers\NoticiaController@edit')->name('noticia.edit')->middleware('auth')->whereNumber('id');

    Route::put('/{id}' , 'App\Http\Controllers\NoticiaController@update')->name('noticia.update')->middleware('auth')->whereNumber('id');

    Route::delete('/{id}' , 'App\Http\Controllers\NoticiaController@destroy')->name('noticia.destroy')->middleware('auth')->whereNumber('id');

    Route::get('/{id}' , 'App\Http\Controllers\NoticiaController@show')->name('noticia.show')->whereNumber('id');

});

Route::prefix('categoria')->group(function () {

    Route::get('/' , 'App\Http\Controllers\CategoriaController@create')->name('categoria.create');

    Route::post('/' , 'App\Http\Controllers\CategoriaController@store')->name('categoria.store');

    Route::get('/{id}' , 'App\Http\Controllers\CategoriaController@show')->name('categoria.show')->whereNumber('id');

});

Route::prefix('entrar')->group(function () {

    Route::get('/' , 'App\Http\Controllers\EntrarController@index')->name('entrar.index');

    Route::post('/' , 'App\Http\Controllers\EntrarController@login')->name('login');

});

Route::prefix('registrar')->group(function () {

    Route::get('/' , 'App\Http\Controllers\RegirtrarController@create')->name('registro.create');

    Route::post('/' , 'App\Http\Controllers\RegirtrarController@store')->name('registro.store');

});

Route::get('/sair', function(){
    Auth::logout();
    return redirect()->route('entrar.index');
})->name('sair');


Route::get('/', function () {
    return view('welcome');
});

