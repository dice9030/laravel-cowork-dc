<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
       
  
        $reservas = Space::with('zone') 
            ->select('id', 'name as titulo', 'capacity', 'status', 'zone_id') 
            ->get()
            ->map(function ($espacio) {
                return (object)[
                    'id' => $espacio->id,
                    'titulo' => $espacio->titulo,
                    'descripcion' => $espacio->zone->description, 
                    'imagen_url' => Storage::url($espacio->zone->img), 
                    'zona' => $espacio->zone->name, 
                ];
            });

        // Enviamos la información a la vista
        return view('client.dashboard', compact('reservas'));
    }
}
