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

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth', 'web');

Route::get('login',
    'Auth\LoginController@showLoginForm')
    ->middleware('guest')
    ->name('login');

Route::post('login/auth',
    'Auth\LoginController@authenticate')
    ->name('login.auth');

Route::get(
    'logout',
    'Auth\LoginController@logout'
)->name('logout');



Route::get(
    '/profesores',
    'UsuarioController@index'
)->name('profesores_index');

Route::get(
    '/profesores/contents',
    'UsuarioController@indexContents'
)->name('profesores_index_contents');

Route::get(
    '/profesores/agregar',
    'UsuarioController@agregar'
)->name('profesores_agregar');

Route::post(
    '/profesores/agregar',
    'UsuarioController@agregarPost'
)->name('profesores_agregar_post');