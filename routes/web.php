<?php

use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\UsuariosController;
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

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', [ArtigoController::class, 'index'])->name('home');

    Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');
    Route::view('publicar', 'publicar')->name('publicar');
    Route::post('publicar', [ArtigoController::class, 'publicar'])->name('publicar');

    Route::post('comentar/{id}', [ArtigoController::class, 'comentar'])->name('comentar');
    Route::get('like/{id}', [ArtigoController::class, 'like'])->name('like');
});


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function(){
    Route::view('/', 'admin.home')->name('admin-home');


    Route::group([
        'prefix' => 'categorias',
        'controller' => CategoriasController::class,
        'as' => 'admin-categorias.'
    ],function(){

        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });



    Route::group([
        'prefix' => 'usuarios',
        'controller' => UsuariosController::class,
        'as' => 'admin-usuarios.'
    ],function(){

        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        
    });


    Route::group([
        'prefix' => 'publicacoes',
        'controller' => ArtigoController::class,
        'as' => 'admin-publicacoes.'
    ],function(){

        Route::get('/', 'publicacoes')->name('index');
        
        Route::get('/delete/{id}', 'destroy')->name('delete');
        
    });

});



Route::post('/login', [UsuariosController::class, 'login']);
Route::view('login', 'login')->name('login');

Route::post('register', [UsuariosController::class, 'insert']);
Route::view('register', 'register')->name('register');

Route::get('/post/{id}', [ArtigoController::class, 'show'])->name('view');

Route::get('/categoria/{name}', [ArtigoController::class, 'categoria'])->name('categoria');
