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

Route::get('/noticia' , 'App\Http\Controllers\NoticiaController@index')->name('noticia.index');

Route::get('/noticia/cadastro' , 'App\Http\Controllers\NoticiaController@create')->name('noticia.create')->middleware('auth');

Route::post('/noticia' , 'App\Http\Controllers\NoticiaController@store')->name('noticia.store')->middleware('auth');

Route::get('/noticia/{id}/editar' , 'App\Http\Controllers\NoticiaController@edit')->name('noticia.edit')->middleware('auth');

Route::put('/noticia/{id}' , 'App\Http\Controllers\NoticiaController@update')->name('noticia.update')->middleware('auth');

Route::delete('/noticia/{id}' , 'App\Http\Controllers\NoticiaController@destroy')->name('noticia.destroy')->middleware('auth');

Route::get('/noticia/{id}' , 'App\Http\Controllers\NoticiaController@show')->name('noticia.show');

Route::get('/entrar' , 'App\Http\Controllers\EntrarController@index')->name('entrar.index');

Route::post('/entrar' , 'App\Http\Controllers\EntrarController@login')->name('login');

Route::get('/registrar' , 'App\Http\Controllers\RegirtrarController@create')->name('registro.create');

Route::post('/registrar' , 'App\Http\Controllers\RegirtrarController@store')->name('registro.store');

Route::get('/sair', function(){
    Auth::logout();
    return redirect()->route('entrar.index');
})->name('sair');


Route::get('/', function () {
    return view('welcome');
});

