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

Route::get('/', 'InicioController@index')->name('inicio.index');

Route::get('/Blog', 'BlogController@index')->name('Blog.Blog');
Route::get('/Blog/Create', 'BlogController@create')->name('Blog.Create');
/* Route::post('/Blog', 'BlogController@store')->name('Blog.Store'); */
Route::get('/Blog/{post}', 'BlogController@show')->name('Blog.Show');
Route::get('/Blog/{post}/edit', 'BlogController@edit')->name('Blog.Edit');
Route::put('/Blog/{post}', 'BlogController@update')->name('Blog.Update');
Route::delete('/Blog/{post}', 'BlogController@destroy')->name('Blog.Destroy');

Route::get('/Blog/Autor', 'AutorController@create')->name('Autor.Create');
Route::post('/Blog', 'AutorController@store')->name('Autor.Store'); 


Auth::routes();


