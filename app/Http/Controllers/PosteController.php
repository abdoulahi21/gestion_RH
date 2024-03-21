<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $postes = Poste::latest()->paginate(5);
        return view('poste.index', compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departements = \App\Models\Departement::all();
        return view('poste.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'departement_id' => 'required',
        ]);
        Poste::create($request->all());
        return redirect()->route('poste.index')
            ->with('success', 'Poste created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $departements = \App\Models\Departement::all();
        $postes=Poste::find($id);
        return view('poste.edit',compact('departements','postes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'departement_id' => 'required',
        ]);
        Poste::find($id)->update($request->all());
        return view('poste.index')
            ->with('success', 'Poste updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Poste::find($id)->delete();
        return redirect()->route('poste.index')
            ->with('success', 'Departement deleted successfully');
    }
}
