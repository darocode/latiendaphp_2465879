@extends('layouts.menu')

@section('contenido')
        <div class="row">
            <h1>Catalogo de Productos</h1>

        </div>

        @foreach($productos as $producto)
            <div class="row">
                
                    <div class="col s3">
                        <div class="card blue-grey lighten-35 z-depth-5">
                            <span class="card-title black-text z-depth-1 col s12">{{ $producto->nombre }}</span>
    
                            <div class="card-image ">
                                @if($producto->image === null)
                                    <img src="{{ asset('img/null.jpg') }}" alt="">
                                    
                                
                                @else
                                    <img src="{{ asset('img/'.$producto->image) }}" alt=""  >
                                    
                                @endif
                                
                            </div>
    
                            <div class="card-content">
                                <p ><strong>Descripcion:</strong>  {{ $producto->desc }}</p>
                                <p ><strong>Precio:</strong> {{ $producto->precio }}</p>
                                
                                
                            </div>
    
                            <div class="card-action">
                                <a href="{{ route('productos.show', $producto->id) }} " >Ver Detalles</a>
                            </div>
    
                        </div>
                    </div>
                
                
            </div>
        @endforeach
@endsection

