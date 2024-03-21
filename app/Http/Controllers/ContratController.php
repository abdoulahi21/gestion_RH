<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $contrats = Contrat::latest()->paginate(5);
        return view('contrat.index', compact('contrats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contrat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'type_contrats' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        Contrat::create($request->all());

        return redirect()->route('contrat.index')
            ->with('success', 'Contrat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $contrat = Contrat::find($id);
        return redirect()->route('contrat.show', compact('contrat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
