<?php

namespace App\Http\Controllers;
//Dependencias
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Pronto existira un Catalogo de Productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar categorias y Marcas

        $marcas = Marca::all();
        $categorias = Categoria::all();


        return view('productos.new')
            ->with('marcas', $marcas)
            ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //Definir Reglas de Validacion
        $reglas = [
            "nombre" => 'required|alpha',
            "desc" => 'required|min:3|max:10',
            "precio" => 'required|numeric',
            "marca"=>'required',
            "categoria"=>'required'

        ];
        //Mensajes personalizados por regla
        $mensajes = [
            "required" => "Campo Obligatorio",
            "numeric" => "Solo se permiten Numeros",
            "alpha" => "Solo se permiten letras",
            
        ];


        $v = Validator::make($r->all(), $reglas, $mensajes);

        var_dump($v->fails());

        if ($v->fails()) {
            //Validacion Fallida
            //redireccionar al formulario de nuevo producto
            return redirect('productos/create')
                ->withErrors($v)
                ->withInput();
        } else {

            //Validacion Correcta
            //crear entidad producto

            $p = new Producto;
            //asignar valores a atributos
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;

            //Grabar el nuevo producto
            $p->save();

            //Redireccionar a la ruta : create
            //Con los datos de sesion
            return redirect('productos/create')
                ->with('mensaje', 'Producto registrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "Espacio para la informacion del producto con el ID es: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "Espacio para el formulario de edicion del producto con el ID: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
