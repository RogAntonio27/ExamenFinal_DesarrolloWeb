<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return response()->json($vehiculos, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|integer',
            'color' => 'required|string|max:50'
        ]);

        $vehiculo = Vehiculo::create($validated);
        return response()->json($vehiculo, 201);
    }

    public function show(string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json([
                'message' => 'Vehículo no encontrado'
            ], 404);
        }

        return response()->json($vehiculo, 200);
    }

    public function update(Request $request, string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json([
                'message' => 'Vehículo no encontrado'
            ], 404);
        }

        $validated = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|integer',
            'color' => 'required|string|max:50'
        ]);

        $vehiculo->update($validated);
        return response()->json($vehiculo, 200);
    }

    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json([
                'message' => 'Vehículo no encontrado'
            ], 404);
        }

        $vehiculo->delete();

        return response()->json([
            'message' => 'Vehículo eliminado correctamente'
        ], 200);
    }
}
