<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Exception;
use Illuminate\Http\Request;

class trabajadorController extends Controller
{
    public function create(Request $request)
    {
        try {
            Trabajador::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'edad' => $request->edad,
                'cargo_id' => $request->cargo_id
            ]);
            return response()->json(["resp" => "Datos ingresados correctamente"]);
        } catch (Exception $e) {
            return response()->json(["error" => "error " . $e]);
        }
    }
    
    public function get()
    {
        try {
            $data = Trabajador::get();
            return response()->json(["data" => $data, "size" => count($data)], 200);
        } catch (Exception $e) {
            return response()->json(["error" => "error", "data" => $e]);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $data = Trabajador::find($id);
            if (!$data) {
                return response()->json(["error" => "Cargo no encontrado"], 404);
            }
            $data->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'edad' => $request->edad,
                'cargo_id' => $request->cargo_id
            ]);
            return response()->json(["resp" => "Datos actualizados correctamente"]);
        } catch (Exception $e) {
            return response()->json(["error" => "Error: " . $e]);
        }
    }

    public function delete($id)
    {
        try {
            $data = Trabajador::find($id);
            if (!$data) {
                return response()->json(["error" => "Cargo no encontrado"], 404);
            }
            $data->delete();
            return response()->json(["resp" => "Cargo eliminado correctamente"]);
        } catch (Exception $e) {
            return response()->json(["error" => "Error: " . $e]);
        }
    }
}
