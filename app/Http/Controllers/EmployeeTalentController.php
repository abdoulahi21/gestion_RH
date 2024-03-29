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
        $users = User::all();
        return view('employee.index',
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'langue' => 'required',
            'skill' => 'required',
            'certification' => 'required',
        ]);
        EmployeeTalent::create($request->all());
        return redirect()->route('employee.index')
            ->with('success', 'EmployeeTalent created successfully.');
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
