<?php

namespace App\Http\Controllers;

use App\Models\EmployeeTalent;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class EmployeeTalentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::role('employees')->get();
        return view('employee.index',
        compact('users')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //je veux recuoerer la liste des utilisateurs qui ont comme role Utilisateurs
        $users = User::role('employees')->get();
        return view('employee.create',
        compact('users')
        );
    }
    public function desactiver(string $id)
    {
        $user = User::find($id);
        $user->status = "Inactif";
        $user->save();
        return redirect()->route('employee.index');
    }

    public function activer(string $id)
    {
        $user = User::find($id);
        $user->status = "Actif";
        $user->save();
        return redirect()->route('employee.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
