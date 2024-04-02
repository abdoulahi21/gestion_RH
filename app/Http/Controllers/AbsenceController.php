<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles=Role::all();
        $absences=Absence::all();
        if (auth()->user()->hasRole('Administrateurs')) {
            $absences = Absence::latest()->paginate(5);
        } elseif (auth()->user()->hasRole('Gestionnaires')) {
            $absences = Absence::latest()->paginate(5);
        } elseif (auth()->user()->hasRole('employees')) {
            $absences = Absence::where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('absence.index',compact('absences'),compact('roles'));
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
        $absence=new Absence();
        $absence->user_id=$request->user_id;
        $absence->date_debut=$request->date_debut;
        $absence->date_fin=$request->date_fin;
        $absence->type_absences=$request->type_absences;
        $absence->status="En attente";
        $absence->save();
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

    public function accept(string $id)
    {
        Absence::find($id)->update(['status' => 'Accepté']);
        return redirect()->route('absence.index')
            ->with('success', 'Absence accepted successfully.');
    }
    public function refuse(string $id)
    {
        Absence::find($id)->update(['status' => 'Refusé']);
        return redirect()->route('absence.index')
            ->with('success', 'Absence refused successfully.');
    }

    public function viewPDF()
    {
        $absence = Absence::all();

        $pdf = PDF::loadView('absence.pdf', array('absence' =>  $absence))
            ->setPaper('a4', 'portrait');

        return $pdf->stream();
    }


    public function downloadPDF()
    {
        $absence = Absence::all();

        $pdf = PDF::loadView('absence.pdf', array('absence' =>  $absence))
            ->setPaper('a4', 'portrait');

        return $pdf->download('absence-details.pdf');
    }
}
