<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar el estado de Session 'cart'

        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Estados de Sesion
        //Mecanismos de Persistencia
        //Estructurar la informacion del producto
        //Con arreglos

        $producto = [ 
            [
            "nombre" => $request->prod_nom,
            "id" => $request->prod_id,
            "cantidad" => $request->cantidad,
            "precio" => $request->precio
            ]
        ];
        if(!session('cart')){
            //NO existe la variable session
            //Crear el estado de Session 'cart'
            $auxiliar[] = $producto;
            session([ 'cart' => $auxiliar ]);
        }else{
            //existe la variable session
            //extraer el contenido de la variable de session 'cart'
            $auxiliar = session('cart');
            //agregar el nuevo item al carrito
            $auxiliar[] = $producto;
            //volver a crear la variable de session ´cart´
            //Con el contenudo añadido
            session(['cart' => $auxiliar]);
        }
        //refireccionar al catalogo de productos con un mensaje de exito
        return redirect('productos')
                 ->with('mensaje', 'Producto añadido al carrito');

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar la session 'cart'

        session()->forget('cart');
        return redirect('cart')
                 ->with('mensaje', "Carrito Eliminado");
    }
}
