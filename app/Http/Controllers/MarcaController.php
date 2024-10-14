<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('Marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca'=>'required'
        ]);
        $marca = Marca::create($request->all());
        return redirect()->route('marcas.index')->with('success', 'Marca Agregada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('Marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'marca'=>'required'
        ]);
        $marca->update($request->input());
        return redirect()->route('marcas.index')->with('success', 'Marca Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        // Verificar si la marca está siendo utilizada en otra tabla
        if ($marca->tenis()->exists()) {
            return redirect()->route('marcas.index')->withErrors(['error' => 'No se puede eliminar la marca porque está siendo utilizada en otros registros.']);
        }
    
        // Eliminar la marca si no está siendo utilizada
        $marca->delete();
        return redirect()->route('marcas.index')->with('success', 'Marca eliminada');
    }
    
}
