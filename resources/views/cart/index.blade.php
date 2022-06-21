@extends('layouts.menu')

@section('contenido')

    <div class="row">
        <h1>Carrito de Compras</h1>
    </div>
    @if(session('cart'))
    <div class="row">
        <div class="col s8">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nombre Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $producto)
                        <tr>
                            <td>{{ $producto[0]["nombre"] }}</td>
                            <td>{{ $producto[0]["cantidad"] }}</td>
                            <td>{{ $producto[0]["precio"] }}</td>
                            <td>{{ $precio_total= $producto[0]["precio"]*$producto[0]["cantidad"] }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    @else
    <strong>No hay Items en el carrito</strong>
    @endif
    <div class="row">
        <form action="{{ route('cart.destroy', 1) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn blue-grey darken-3" type="submit" name="action">Eliminar Carrito</button>
        </form>
    </div>
@endsection