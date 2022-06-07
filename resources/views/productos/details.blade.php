@extends('layouts.menu')

@section('contenido')
  
        <div class="row">
            <h2>{{ $producto->nombre }} </h2>

        </div>

        <div class="row">
            <div class="col s12">
                @if($producto->image === null)
                <img src="{{ asset('img/null.jpg') }}" alt="">

                @else
                <img src="{{ asset('img/'.$producto->image) }}" alt="" class="col s2">
                
                <h2>Marca: {{ $producto->marca->nombre }}</h2>
                <h2>Categoria: {{ $producto->categoria->nombre }}</h2>
                <ul class="col s2">
                    <li>Precio: COL$ {{ $producto->precio }}</li>
                    <li>Descripcion: {{ $producto->desc }}</li>
                </ul><br><br>
                @endif
            </div>
            <div class="col s12">
                <div class="row">
                    <h3>Añadir al Carrito</h3>
                </div>
                <form action="{{ route('cart.store') }}" method="post">
                        @csrf 
                        <input type="hidden" name="prod_id" value="4">
                        <div class="row">
                            <div class="col s15 input-field">
                                <select name="cantidad" id="cantidad">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <label for="cantidad">Cantidad </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="btn blue-grey darken-3 col s12" type="submit" name="action">Añadir</button>
                            </div>
                        </div>
                </form>
                
            </div>
        </div>

@endsection