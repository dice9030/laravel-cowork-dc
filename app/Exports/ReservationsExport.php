<?php

namespace App\Exports;


use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Carbon\Carbon;


class ReservationsExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
     // Método que recoge todas las reservas
     public function collection()
     {
         return Reservation::with(['user', 'space'])->get(); // Eager loading para evitar consultas adicionales
     }
 
     // Método que define los encabezados de las columnas
     public function headings(): array
     {
         return [
             'Cliente', // Usuario
             'Sala', // Espacio
             'Hora de Reserva', // Fecha y hora de inicio
             'Fecha de Fin', // Fecha y hora de fin
             'Total de Tiempo (horas)', // Total de tiempo de reserva
         ];
     }
 
     // Método que mapea cada fila de la colección para que se convierta en un formato adecuado para el Excel
     public function map($reservation): array
     {
         $start_time = Carbon::parse($reservation->start_time);
         $end_time = Carbon::parse($reservation->end_time);
 
         // Calculamos el total de tiempo de reserva en horas
         $total_time = $start_time->diffInHours($end_time);
 
         return [
             $reservation->user->name, // Nombre del cliente
             $reservation->space->name, // Nombre de la sala
             $start_time->format('Y-m-d H:i:s'), // Hora de reserva (inicio)
             $end_time->format('Y-m-d H:i:s'), // Hora de fin
             $total_time, // Total de tiempo de reserva en horas
         ];
     }
 
     // Método para definir el formato de las columnas (si es necesario)
     public function columnFormats(): array
     {
        return [
            'C' => 'yyyy-mm-dd hh:mm:ss', // Hora de inicio
            'D' => 'yyyy-mm-dd hh:mm:ss', // Hora de fin
        ];
     }

     
   
}


