<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departements = \App\Models\Departement::latest()->paginate(5);
        return view('departement.index', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('departement.create');
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
        ]);
          Departement::create($request->all());
        return redirect()->route('departement.index')
            ->with('success', 'Departement created successfully.');
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
        $departement = \App\Models\Departement::find($id);
        return view('departement.edit', compact('departement'));
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
        ]);
        Departement::find($id)->update($request->all());
        return redirect()->route('departement.index')
            ->with('success', 'Departement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Departement::find($id)->delete();
        return redirect()->route('departement.index')
            ->with('success', 'Departement deleted successfully');
    }
}
