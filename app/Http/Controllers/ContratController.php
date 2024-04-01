<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\User;
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
        $users = User::role('employees')->get();
        return view('contrat.create',compact('users'));
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
       return view('contrat.edit', [
            'contrat' => Contrat::find($id),
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
            'type_contrats' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        Contrat::find($id)->update($request->all());
        return redirect()->route('contrat.index')
            ->with('success', 'Contrat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Contrat::find($id)->delete();
        return redirect()->route('contrat.index')
            ->with('success', 'Contrat deleted successfully');
    }

   /* public function viewPDF()
    {
        $users = User::all();

        $pdf = PDF::loadView('pdf.usersdetails', array('users' =>  $users))
            ->setPaper('a4', 'portrait');

        return $pdf->stream();

    }

   public function downloadPDF()
    {
        $users = User::all();

        $pdf = PDF::loadView('pdf.usersdetails', array('users' =>  $users))
        ->setPaper('a4', 'portrait');

        return $pdf->download('users-details.pdf');
    }

   */

}
