<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $absences=Absence::all();
        return view('absence.index',compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users=User::role('employees')->get();
        return view('absence.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'type_absences' => 'required',
        ]);
        Absence::create($request->all());
        return redirect()->route('absence.index')
            ->with('success', 'Conge created successfully.');

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
        return view('absence.edit', [
            'absence' => Absence::find($id),
            'users' => User::role('employees')->get()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'type_absences' => 'required',
        ]);
        Absence::find($id)->update($request->all());
        return redirect()->route('absence.index')
            ->with('success', 'Absence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $absence = Absence::find($id);
        $absence->delete();
        return redirect()->route('absence.index')
            ->with('success', 'Absence deleted successfully.');
    }
}
