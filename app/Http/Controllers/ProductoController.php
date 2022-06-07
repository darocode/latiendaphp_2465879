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
        //Seleccion de Todos los productos
        $productos = Producto::all();
        //Mostrar la vista del catalogo
        //LLevando la lista de productos
        return view ('productos.index')
            ->with('productos', $productos);
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
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:3|max:10',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required',
            "imagen" => 'required|image'

        ];
        //Mensajes personalizados por regla
        $mensajes = [
            "required" => "Campo Obligatorio",
            "numeric" => "Solo se permiten Numeros",
            "alpha" => "Solo se permiten letras",
            "image" => "tipo de archivo no valida -- cosa no va",

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

            //analizar el objeto file del request
            //asignar el nombre de la variable segun el archivo




            $nombre_Archivo =  $r->imagen->getClientOriginalName();
            $archivo = $r->imagen;

            //MOVER EL ARCHIVO A LA CARPETA PUBLIC
            // var_dump(public_path());
            $ruta = public_path() . '/img';
            $archivo->move($ruta, $nombre_Archivo);
            //Validacion Correcta
            //crear entidad producto

            $p = new Producto;
            //asignar valores a atributos
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
            $p->image = $nombre_Archivo;


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
        //echo "Espacio para la informacion del producto con el ID es: $producto";
        //Seleccionar el producto con id especifico
        $producto = Producto::find($producto);
        //Mostrar vista de detalles
        //llevando el producto seleccionado
        return view('productos.details')
            ->with('producto',$producto);
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