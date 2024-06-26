@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New User
                </div>
                <div class="float-end">
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-sample" action="{{route('users.store')}}"  method="post" >
                    @csrf

                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nom Complet</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Adresse</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse">
                                @if ($errors->has('adresse'))
                                    <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Genre</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="sexe">
                                        <option>Choisir</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date of Birth</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="date_naissance" name="date_naissance">
                                    @if ($errors->has('date_naissance'))
                                        <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Lieu Naissance</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="lieu_naissance" name="lieu_naissance">
                                    @if ($errors->has('lieu_naissance'))
                                        <span class="text-danger">{{ $errors->first('lieu_naissance') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Situation Matrimoniale</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="situation_matrimoniale">
                                        <option>Choisir</option>
                                        <option value="celebataire">Célibataire</option>
                                        <option value="marie">Marié</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nombre Enfant</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nombre_enfants') is-invalid @enderror" id="nombre_enfants" name="nombre_enfants">
                                    @if ($errors->has('nombre_enfants'))
                                        <span class="text-danger">{{ $errors->first('nombre_enfants') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nationalite</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nationalite') is-invalid @enderror" id="nationalite" name="nationalite">
                                    @if ($errors->has('nationalite'))
                                        <span class="text-danger">{{ $errors->first('nationalite') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">CIN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('numero_identite') is-invalid @enderror" id="numero_identite" name="numero_identite">
                                    @if ($errors->has('numero_identite'))
                                        <span class="text-danger">{{ $errors->first('numero_identite') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Telephone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone">
                                    @if ($errors->has('telephone'))
                                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Langue</label>
                                <div class="col-sm-9">
                                    @if ($errors->has('langue'))
                                        <span class="text-danger">{{ $errors->first('langue') }}</span>
                                    @else
                                    <select class="form-control" name="langue">
                                        <option>Choisir</option>
                                        <option value="francais">Français</option>
                                        <option value="anglais">Anglais</option>
                                        <option value="espagnol">Espagnol</option>
                                        <option value="allemand">Allemand</option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label ">Skill</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('skill') is-invalid @enderror" id="skill" name="skill">
                                    @if ($errors->has('skill'))
                                        <span class="text-danger">{{ $errors->first('skill') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label ">Certifications</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('certification') is-invalid @enderror" id="certification" name="certification">
                                @if ($errors->has('certification'))
                                    <span class="text-danger">{{ $errors->first('certification') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label ">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-6 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="roles" class="col-sm-4 col-form-label">Roles</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                                        @forelse ($roles as $role)

                                            @if ($role!='Administrateurs')
                                                <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @else
                                                @if (Auth::user()->hasRole('Administrateurs'))
                                                    <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                                        {{ $role }}
                                                    </option>
                                                @endif
                                            @endif

                                        @empty

                                        @endforelse
                                    </select>
                                    @if ($errors->has('roles'))
                                        <span class="text-danger">{{ $errors->first('roles') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add User">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
