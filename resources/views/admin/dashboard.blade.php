@extends(backpack_view('layouts.top_left'))

@section('header')
    <section class="content-header">
        <h1>
            Panel Administrativo
            <small>Resumen del sistema11</small>
        </h1>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card p-3 shadow-sm rounded bg-light">
                <h4>Total de productos</h4>
                <p>42</p> {{-- Aquí puedes mostrar datos dinámicos --}}
            </div>
        </div>
        <!-- Agrega más tarjetas o contenido según necesites -->
    </div>
@endsection