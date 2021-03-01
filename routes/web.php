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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'PageController@index')->name('homepage');
Route::get('about', 'PageController@about')->name('about');
Route::get('contacts', 'PageController@contacts')->name('contacts');

/* ------ Blog scetion -----------*/
Route::get('blog','PostController@index')->name('blog');

/* ----Per mostrare il singolo post ---*/
Route::get('blog/{post}','PostController@show')->name('post');//questo farà riferimento ad un PostController che non è quello dell'Admin

Auth::routes(['register' => false]);//disabilitiamo il modulo - register dopo aver creato un utente admin

//Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//Route::get('/', 'HomeController@index')->name('home'); //rota unica indipendente

/* ------------ */

/* --------------- raggruppate solo admin ---------------- vedi metodo Routing->group() */

//aggiungo un prefisso per specificare che sono le rout per l'admin

//questo è un GRUPPO DI ROTTE - che sono sotto lo stesso space Admin tutte con prefisso 'admin' (URI) esempio  admin/post  e con name 'admin' esempio admin.post.store 

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () 
{
    # code...
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('posts', 'PostController');//voglio che faccia riferimento ad /admin/posts - e voglio che anche le view
});
