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

//Primera ruta
//get: mostrar por el navegador
//parametros: 1.nombre de la ruta. 2.indicar con una función que va a pasar.
Route::get('hola',function(){
    echo "Hola, mundo PHP";
});
