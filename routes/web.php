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
	
	//seccion para pruebas de la seccion multimedia 
	Route::get('/video', 'App\Http\Controllers\videoController@video')->name('video.video');
	Route::get('/videoMostrar', 'App\Http\Controllers\videoController@videoMostrar')->name('video.videoMostrar');
	Route::post('/registroVideo', 'App\Http\Controllers\VideoController@registroVideo')->name('registroVideo');
	// Ruta para actualizar el estatus de un video 
	Route::patch('/video/{id}/update-status', 'App\Http\Controllers\VideoController@ActualizarEstatus')->name('video.ActualizarEstatus');
	Route::patch('/video/{id}/update-status-categoria', 'App\Http\Controllers\VideoController@ActualizarEstatusCategoria')->name('categoria.ActualizarEstatusCategoria');
	Route::patch('/video/{id}/update-status-subcategoria', 'App\Http\Controllers\VideoController@ActualizarEstatusSubCategoria')->name('categoria.ActualizarEstatusSubCategoria');

	//apartado para las 4 secciones de multimedia (podrian ser mas)
	Route::get('/calidad', 'App\Http\Controllers\videoController@calidad')->name('video.calidad');
	Route::get('/induccion', 'App\Http\Controllers\videoController@induccion')->name('video.induccion');
	Route::get('/maquinariayEquipos', 'App\Http\Controllers\videoController@maquinariayEquipos')->name('video.maquinariayEquipos');
	Route::get('/metodos', 'App\Http\Controllers\videoController@metodos')->name('video.metodos');
	Route::get('/altaCategoriaSub', 'App\Http\Controllers\videoController@altaCategoriaSub')->name('video.altaCategoriaSub');

	//apartado apra las categorias y sub-categoria 
	Route::post('/categoria/store', 'App\Http\Controllers\videoController@storeCategoria')->name('categoria.store');
	Route::post('/subcategoria/store', 'App\Http\Controllers\videoController@storeSubcategoria')->name('subcategoria.store');
	// En routes/web.php
	Route::get('/video/{categoriaId}', 'App\Http\Controllers\videoController@obtenerSubcategorias');


});

