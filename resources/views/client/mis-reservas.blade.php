@extends('client.layouts.app')

@section('title', 'Mis Reservas')

@section('content')
<div class="container">
    <h1 class="mb-4">Mis Reservas</h1>

    @if($reservas->isEmpty())
        <p>No tienes reservas registradas.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Zona</th>
                        <th>Espacio</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                        <tr>
                            <td>
                                @if($reserva->space->zone && $reserva->space->zone->img)
                                    <img src="{{ asset('storage/' . $reserva->space->zone->img) }}" alt="Zona" width="100" style="object-fit: cover; border-radius: 5px;">
                                @else
                                    <svg width="100" height="60" xmlns="http://www.w3.org/2000/svg" style="background:#f0f0f0;">
                                        <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#ccc" font-size="12">Sin imagen</text>
                                    </svg>
                                @endif
                            </td>
                            <td>{{ $reserva->space->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($reserva->start_time)->format('d/m/Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reserva->end_time)->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge bg-{{ $reserva->status === 'confirmada' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($reserva->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
