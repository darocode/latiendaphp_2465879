@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1 class="blue-grey-text text-darken-3">
        Nuevo producto
    </h1>
</div>
<div class="row">
    <form class="col s8" action="{{ url('productos') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="input-field col s8">
                <input type="text" placeholder="Nombre del producto" id="nombre" name="nombre">
                <label for="nombre">Nombre del producto:</label>
            </div>
        </div><span>{{ $errors->first('nombre') }}</span>


        <div class="row">
            <div class="input-field col s8">
                <textarea id="desc" class="materialize-textarea" name="desc"></textarea>
                <label for="desc">Descripción</label>
            </div>
        </div><span>{{ $errors->first('desc') }}</span>


        <div class="row">
            <div class="input-field col s8">
                <select name="marca" id="marca">
                    @foreach($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                    @endforeach
                </select>
                <label for="marca">Marca:</label>
            </div>
        </div><span>{{ $errors->first('marca') }}</span>


        <div class="row">
            <div class="input-field col s8">
                <select name="categoria" id="cat">
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                <label for="categoria">categorias:</label>
            </div>
        </div><span>{{ $errors->first('categoria') }}</span>


        <div class="row">
            <div class="input-field col s8">
                <input type="number" placeholder="precio del producto" id="precio" name="precio">
                <label for="precio">Precio:</label>
            </div>
        </div>


        <div class="file-field input-field col s8 ">
            <div class="btn blue-grey darken-3 ">
                <span>Imagen...</span>
                <input name="imagen" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div><br>
            <span>{{ $errors->first('imagen') }}</span>
        </div>
        <div class="row">
            <button class="btn blue-grey darken-3" type="submit" name="action">Guardar</button>
        </div>
        @if(session('mensaje'))

        <div class="row">
            <p class="cyan-text text-accent-3 col s8">
                {{ session('mensaje') }}

            </p>

        </div>
        @endif
    </form>
</div>
@endsection