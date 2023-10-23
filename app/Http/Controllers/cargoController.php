<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Exception;
use Illuminate\Http\Request;

class cargoController extends Controller
{
    public function create(Request $request)
    {
        try {
            Cargo::create([
                'nombre' => $request->nombre,
                'sueldo' => $request->sueldo
            ]);
            return response()->json(["resp" => "Datos ingresados correctamente"]);
        } catch (Exception $e) {
            return response()->json(["error" => "error " . $e]);
        }
    }
    
    public function get()
    {
        try {
            $data = Cargo::get();
            return response()->json(["data" => $data, "size" => count($data)], 200);
        } catch (Exception $e) {
            return response()->json(["error" => "error", "data" => $e]);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $cargo = Cargo::find($id);
            if (!$cargo) {
                return response()->json(["error" => "Cargo no encontrado"], 404);
            }
            $cargo->update([
                'nombre' => $request->nombre,
                'sueldo' => $request->sueldo,
            ]);
            return response()->json(["resp" => "Datos actualizados correctamente"]);
        } catch (Exception $e) {
            return response()->json(["error" => "Error: " . $e]);
        }
    }

    public function delete($id)
    {
        try {
            $cargo = Cargo::find($id);
            if (!$cargo) {
                return response()->json(["error" => "Cargo no encontrado"], 404);
            }
            $cargo->delete();
            return response()->json(["resp" => "Cargo eliminado correctamente"]);
        } catch (Exception $e) {
            return response()->json(["error" => "Error: " . $e]);
        }
    }
}
