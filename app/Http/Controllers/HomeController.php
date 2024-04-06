<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Contrat;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //je veux recuperer le nombre total des users avec le role employees
        $totalAgents = User::role('employees')->count();
        //je veux recuperer le nombre total des employes qui on un contrat de type CDD
        $Agents = User::whereHas('contrats', function($query){
            $query->where('type_contrats', 'CDD');
        })->count();
        //je veux recuperer le nombre total des employes qui on un contrat de type CDI
        $permanentAgents = User::whereHas('contrats', function($query){
            $query->where('type_contrats', 'CDI');
        })->count();
        //je veux recuperer le nommbre total de conge en attente
         $congeAttente = User::whereHas('conge',function ($query){
             $query->where('status','En attente');
         })->count();
        //je veux recuperer le nommbre total de conge accepter
        $congeAccepter = User::whereHas('conge',function ($query){
            $query->where('status','Accepter');
        })->count();
        //je veux recuperer les employees actif
        $activeAgents = User::where('status','Actif')->count();
        //je veux recuperer les employees inactif
        $inactiveAgents = User::where('status','Inactif')->count();
        return view('home',compact('Agents', 'permanentAgents',
            'totalAgents','congeAttente','congeAccepter','activeAgents','inactiveAgents'));


    }
}
