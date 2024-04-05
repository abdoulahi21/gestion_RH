<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Notifications\SendUserNotification;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::latest('id')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create',[
            'roles' => Role::pluck('name')->all()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'adresse' => 'required|string',
            'sexe' => 'required|in:male,female',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string',
            'situation_matrimoniale' => 'required|in:celebataire,marie',
            'nombre_enfants' => 'required|numeric',
            'nationalite' => 'required|string',
            'numero_identite' => 'required|string',
            'telephone' => 'required|string',
            'langue' => 'required|in:francais,anglais,espagnol,allemand',
            'skill' => 'required|string',
            'certification' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'roles' => 'required|array'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->adresse = $request->input('adresse');
        $user->sexe = $request->input('sexe');
        $user->date_naissance = $request->input('date_naissance');
        $user->lieu_naissance = $request->input('lieu_naissance');
        $user->situation_matrimoniale = $request->input('situation_matrimoniale');
        $user->nombre_enfants = $request->input('nombre_enfants');
        $user->nationalite = $request->input('nationalite');
        $user->numero_identite = $request->input('numero_identite');
        $user->telephone = $request->input('telephone');
        $user->langue = $request->input('langue');
        $user->skill = $request->input('skill');
        $user->certification = $request->input('certification');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->status="Actif";
        $user->save();
        $user->assignRole($request->roles);

        if( $user){
            $user->notify(new SendUserNotification());
        }
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Administrateurs')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $input = $request->all();

        if(!empty($request->password)){
            $input['password'] = Hash::make($request->password);
        }else{
            $input = $request->except('password');
        }

        $user->update($input);

        $user->syncRoles($request->roles);

        return redirect()->back()
            ->withSuccess('User is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Administrateurs') || $user->id == auth()->user()->id)
        {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess('User is deleted successfully.');
    }
}
