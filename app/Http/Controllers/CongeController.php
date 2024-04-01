<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $roles = Role::all();
          if (auth()->user()->hasRole('Administrateurs')) {
              $conges = Conge::latest()->paginate(5);
          } elseif (auth()->user()->hasRole('Gestionnaires')) {
              $conges = Conge::latest()->paginate(5);
          } elseif (auth()->user()->hasRole('employees')) {
              $conges = Conge::where('user_id', auth()->user()->id)->latest()->paginate(5);
          }
        return view('conge.index',compact('conges'),compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::role('employees')->get();
        return view('conge.create',compact('users'));
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
            'type_conge' => 'required',
        ]);
        $conge=new Conge();
        $conge->user_id=$request->user_id;
        $conge->date_debut=$request->date_debut;
        $conge->date_fin=$request->date_fin;
        $conge->type_conge=$request->type_conge;
        $conge->status="En attente";
        $conge->save();
        return redirect()->route('conge.index')
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
        return view('conge.edit', [
            'conge' => Conge::find($id),
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
            'type_conge' => 'required',
            'status' => 'required',
        ]);

        Conge::find($id)->update($request->all());
        return redirect()->route('conge.index')
            ->with('success', 'Conge updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $conge = Conge::find($id);
        $conge->delete();
        return redirect()->route('conge.index')
            ->with('success', 'Conge deleted successfully');
    }
     public function accept(string $id)
     {
         //
         $conge = Conge::find($id);
         $conge->status = "Accepter";
         $conge->save();
         return redirect()->route('conge.index')
             ->with('success', 'Conge accepted successfully');
     }
        public function refuse(string $id)
        {
            //
            $conge = Conge::find($id);
            $conge->status = "Refuser";
            $conge->save();
            return redirect()->route('conge.index')
                ->with('success', 'Conge refused successfully');
        }
}
