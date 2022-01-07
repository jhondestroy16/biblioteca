<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

//Route Hooks - Do not delete//
	Route::view('prestamos', 'livewire.prestamos.index')->middleware('can:prestamos');
	Route::view('ejemplares', 'livewire.ejemplares.index')->middleware('can:ejemplares');
	Route::view('libros', 'livewire.libros.index')->middleware('can:libros');
	Route::view('autores', 'livewire.autores.index')->middleware('can:autores');
