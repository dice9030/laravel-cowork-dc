
@extends('client.layouts.app')

@section('title', 'Reservar espacio')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="row g-0">
            <div class="col-md-6">
                    @if($space->zone && !empty($space->zone->img) && file_exists(public_path('storage/' . $space->zone->img)))
                        <img src="{{ asset('storage/' . $space->zone->img) }}" class="card-img" alt="{{ $space->name }}" style="height: 100%; object-fit: cover;">
                    @else
                    <!-- SVG de "No Found" cuando la imagen no está disponible -->
                    <div class="card-img" style="height: 100%; display: flex; justify-content: center; align-items: center; background-color: #f0f0f0;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" style="max-width: 80%; max-height: 60%; fill: #999;">
                            <text x="50%" y="50%" text-anchor="middle" dy=".3em" font-size="20" font-family="Arial, sans-serif" fill="#333">No Found</text>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title">{{ $space->name }}</h2>
                    <p class="card-text">{{ $space->zone->description ?? 'Espacio sin descripción' }}</p>

                   

                    <form action="{{ route('process_reservation', $space->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="form-group">
                            <label for="start_time">Fecha y hora de inicio:</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="end_time">Fecha y hora de fin:</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Confirmar Reserva</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                   <div id="calendar" style="margin-top: 20px;"></div>

            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar');

        let reservas = {!! json_encode($reservas) !!};

        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'es',
            height: 400,
            events: reservas,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay'
            },
            eventTextColor: '#fff'
        });

        calendar.render();
    });
</script>
@endsection
