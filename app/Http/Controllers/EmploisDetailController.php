<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\EmploiDetail;
use App\Models\Poste;
use Illuminate\Http\Request;

class EmploisDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //je veux recuperer les details des emplois
        $emplois=EmploiDetail::all();
        return view('emplois.index',compact('emplois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $postes=Poste::all();
        $contrats=Contrat::all();
        return view('emplois.create',compact('contrats','postes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'contrat_id' => 'required',
            'poste_id' => 'required',
            'salaire' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Création d'une nouvelle instance d'Emploi
        $emploi = new EmploiDetail();

        // Remplissage des champs avec les données du formulaire
        $emploi->contrat_id = $request->contrat_id;
        $emploi->poste_id = $request->poste_id;
        $emploi->salaire = $request->salaire;
        $emploi->date = $request->date;

        // Sauvegarde de l'emploi dans la base de données
        $emploi->save();

        // Redirection vers la liste des emplois avec un message de succès
        return redirect()->route('emplois.index')->with('success', 'Emploi créé avec succès.');
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
