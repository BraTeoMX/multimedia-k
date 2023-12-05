<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VPFController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


	//seccion para pruebas, asi se llamara la carpeta 
	Route::get('/sorteo', 'App\Http\Controllers\pruebaController@sorteo')->name('prueba.sorteo');
	Route::get('/resultadoSorteo', 'App\Http\Controllers\pruebaController@resultadoSorteo')->name('prueba.resultadoSorteo');
	Route::get('/obtener-ganador', 'App\Http\Controllers\pruebaController@obtenerGanador')->name('obtenerGanador');
	Route::post('/registroSorteo', 'App\Http\Controllers\PruebaController@registroSorteo')->name('registroSorteo');
	//seccion para subir archivos 
	Route::get('/video', 'App\Http\Controllers\videoController@video')->name('video.video');
	Route::get('/videoMostrar', 'App\Http\Controllers\videoController@videoMostrar')->name('video.videoMostrar');
	Route::post('/registroVideo', 'App\Http\Controllers\VideoController@registroVideo')->name('registroVideo');
	// Ruta para actualizar el estatus de un video 
	Route::patch('/video/{id}/update-status', 'App\Http\Controllers\VideoController@ActualizarEstatus')->name('video.ActualizarEstatus');
});

