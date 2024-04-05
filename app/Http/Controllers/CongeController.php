<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\User;
use App\Notifications\CongeNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Notifications\SendUserNotification;
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
        //recuperer le nom de l'utilisateur connecté
        if (auth()->user()->hasRole('employees')) {
            $users = User::where('id', auth()->user()->id)->get();
        } else {
            $users = User::role('employees')->get();
        }

        //$users = User::role('employees')->get();

        return view('conge.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_conge' => 'required',
        ]);

        // Vérification supplémentaire : date_debut doit être inférieure à date_fin
       /* $date_debut = strtotime($request->date_debut);
        $date_fin = strtotime($request->date_fin);
        if ($date_debut > $date_fin) {
            return redirect()->route('conge.create')->with('error', 'La date de début doit être inférieure à la date de fin');
        }*/

        // Création d'une nouvelle instance de Conge
        $conge = new Conge();

        // Remplissage des champs avec les données du formulaire
        $conge->user_id = $request->user_id;
        $conge->date_debut = $request->date_debut;
        $conge->date_fin = $request->date_fin;
        $conge->type_conge = $request->type_conge;
        $conge->status = "En attente";

        // Sauvegarde du congé dans la base de données
        $conge->save();
        // Redirection vers la liste des congés avec un message de succès
        return redirect()->route('conge.index')->with('success', 'Congé créé avec succès.');
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

         if ($conge)
         {
             $conge->notify(new CongeNotification());
         }
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

    public function viewPDF(string $id)
    {
        $conge = Conge::find($id);

        $pdf = PDF::loadView('conge.pdf', array('conge' =>  $conge))
            ->setPaper('a4', 'portrait');

        return $pdf->stream();
    }
    public function downloadPDF(string $id)
    {
        $conge = Conge::find($id);

        $pdf = PDF::loadView('conge.pdf', array('conge' =>  $conge))
            ->setPaper('a4', 'portrait');

        return $pdf->download('conge-details.pdf');
    }

}
