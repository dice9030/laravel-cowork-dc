@extends('client.layouts.app')

@section('content')

    <div class="container">
         <!-- Título con ícono -->
        <h1 class="mb-4 " style="font-size: 2.5rem; color: #333; font-weight: bold;">
            <i class="fas fa-calendar-check" style="color: #ef3b2d; margin-right: 10px;"></i>
            Espacios
        </h1>
        <div class="row">
          @foreach($reservas as $reserva)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">

                           <img src="{{ $reserva->imagen_url }}" alt="{{ $reserva->titulo }}" class="card-img-top" style="height: 200px; object-fit: cover; border-radius: 10px;">
                       

                    <div class="card-body">
                        <h5 class="card-title">{{ $reserva->titulo }}</h5>
                        <p class="card-text">{{ $reserva->descripcion }}</p>
                        <a href="{{ route('reservar', $reserva->id) }}" class="btn btn-primary w-100">Reservar</a>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>

  
@endsection

@section('styles')

<style>

        .card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-10px);
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        
        .card-text {
            color: #6c757d;
        }
        
        .btn-primary {
            background-color: #ef3b2d;
            border-color: #ef3b2d;
        }
        
        .btn-primary:hover {
            background-color: #c53030;
            border-color: #c53030;
        }
</style>

@endsection