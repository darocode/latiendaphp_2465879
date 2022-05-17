<?php

use App\Http\Controllers\ProductoController;
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

Route::get('paises', function(){
    $paises=[
        "Colombia"=>[
            "capital"=>"Bogota",
            "moneda"=>"peso",
            "poblacion"=>51.6,
            "ciudades"=>[
                "Medellin",
                "Cali",
                "Barranquilla"
            ]
        ] ,
        "Peru"=> [
            "capital"=>"Lima",
            "moneda"=>"sol",
            "poblacion"=>32.9,
            "ciudades"=>[
                "Trujillo",
                "Cusco",
                "Arequipa"
            ]
        ],
        "Paraguay"=> [
            "capital"=>"Asuncion",
            "moneda"=>"Guarani paraguayo",
            "poblacion"=>7.1,
            "ciudades"=>[
                "Capiata",
                "Limpio",
                "Cazapa"
            ]
        ]
    ];

    //mostrar la vista de paises
    return view('paises')
                ->with("paises", $paises);
});

Route::get('prueba', function(){
    return view('productos.new');
            
});

//Rutas REST

//1. Producto

Route::resource('productos' , ProductoController::class);
