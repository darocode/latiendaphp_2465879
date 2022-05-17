@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1 class="cyan-text text-accent-3">Nuevo Producto</h1>
</div>
<div class="row">
    <form   class="col s8" 
            method="POST" 
            action="{{ route('productos.store') }}">
            @csrf 
        <div class="row">
            <div class="input-field col s8">
                <input  type="text" 
                        placeholder="Nombre Producto"
                        id="nombre"
                        name="nombre">
                        <label for="nombre">Nombre de producto</label>
            </div>
        </div>



        <div class="row">
            <div class="input-field col s8">
                <textarea class="materialize-textarea"
                            id="desc"
                            name="desc"
                            ></textarea>
                            <label for="desc">Descripcion</label>
            </div>
        </div>

        
        <div class="row">
            <div class="input-field col s8">
                <input type="text"
                        placeholder="Precio del producto"
                        type="text"
                        id="precio"
                        name="precio">
                    <label for="precio">Precio</label>
            </div>
        </div>



        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}
                        </option>
                    @endforeach
                    
                </select>
                <label for="marca">Marca</label>
            </div>
        </div>


        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="categoria">Categoria</label>
            </div>
        </div>
        




        <div class="row">
            <div class="file-field input-field col s8 ">
                <div class="btn">
                    <span>Imagen de Producto....</span>
                    <input type="file" name="imagen">
                </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate " type="text">
                    </div>
            </div>
        </div>


        <div class="row">
            <button class="btn waves-effect waves-light col s8 " type="submit" name="action">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection