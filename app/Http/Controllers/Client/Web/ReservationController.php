<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Space;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve($id)
    {
            $space = Space::find($id);

        if (!$space) {
            return redirect()->route('dashboard')->with('error', 'Espacio no encontrado.');
        }

        $reservas = Reservation::where('space_id', $id)
            ->where('status', 'confirmada')
            ->get(['start_time', 'end_time'])
            ->map(function ($reserva) {
                return [
                    'title' => 'Reservado',
                    'start' => $reserva->start_time,
                    'end' => $reserva->end_time,
                    'color' => '#e74c3c'
                ];
            });

         

        return view('client.reserve', compact('space', 'reservas'));
    }

    public function processReservation(Request $request, $id) 
    {
       try {
            // Validación de los campos de fecha y hora
            $request->validate([
                'start_time' => 'required|date|after_or_equal:' . now()->toDateTimeString(), // Validar que la hora de inicio sea en el futuro
                'end_time' => 'required|date|after:start_time', // Validar que la hora de fin sea posterior a la de inicio
            ]);

            $space = Space::findOrFail($id);

            // Validar solapamiento de reservas
            $overlap = \App\Models\Reservation::where('space_id', $space->id)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                        ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                        ->orWhere(function ($query) use ($request) {
                            $query->where('start_time', '<=', $request->start_time)
                                    ->where('end_time', '>=', $request->end_time);
                        });
                })
                ->exists();

            if ($overlap) {
                return redirect()->back()->with('error', 'El espacio ya está reservado en ese horario.');
            }

            // Crear la reserva si no hay conflicto
            $reservation = new \App\Models\Reservation();
            $reservation->user_id = auth()->id();
            $reservation->space_id = $space->id;
            $reservation->start_time = $request->start_time;
            $reservation->end_time = $request->end_time;
            $reservation->status = 'confirmada';
            $reservation->save();

            return redirect()->route('client.dashboard')->with('success', 'Reservado correctamente.');
        } catch (\Throwable $th) {
            return redirect()->route('client.dashboard')->with('error', 'Ocurrió un error al procesar la reserva.');
        }
    }

    public function misReservas()
    {
        // Obtener las reservas del usuario autenticado, con relaciones de espacio y zona
        $reservas = \App\Models\Reservation::with('space.zone')
            ->where('user_id', auth()->id())
            ->orderBy('start_time', 'desc')
            ->get();

        return view('client.mis-reservas', compact('reservas'));
    }
}
