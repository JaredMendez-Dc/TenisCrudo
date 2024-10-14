<?php

namespace App\Http\Controllers;

use App\Models\Teni;
use App\Models\Marca; // Asegúrate de importar el modelo Marca
use Illuminate\Http\Request;

class TeniController extends Controller
{
    public function index()
    {
        $tenis = Teni::with('marca')->get();
        return view('Tenis.index', compact('tenis'));
    }

    public function create()
    {
        $marcas = Marca::all(); // Traemos todas las marcas para el formulario
        return view('Tenis.create', compact('marcas')); // Las enviamos a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required',
            'talla' => 'required|numeric',
            'costo' => 'required|numeric',
            'categoria' => 'required',
            'marca_id' => 'required|numeric',
        ]);

        // Crear el registro del teni
        Teni::create($request->all());

        return redirect()->route('tenis.index')->with('success', 'Teni agregado');
    }

    public function edit(Teni $teni)
    {
        $marcas = Marca::all(); // Enviar las marcas para la edición
        return view('Tenis.edit', compact('teni', 'marcas'));
    }

    public function update(Request $request, Teni $teni)
    {
        $request->validate([
            'color' => 'required|string',
            'talla' => 'required|string',
            'costo' => 'required|numeric',
            'categoria' => 'required|string',
            'marca_id' => 'required|numeric',
        ]);

        $teni->update($request->input());
        return redirect()->route('tenis.index')->with('success', 'Tenis actualizado');
    }

    public function destroy(Teni $teni)
    {
        // Eliminar el registro del tenis
        $teni->delete();
        return redirect()->route('tenis.index')->with('success', 'Teni eliminado correctamente');
    }
}
