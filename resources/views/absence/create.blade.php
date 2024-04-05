@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card mt-5">
            <div class="card-header">
                <div class="float-start">
                    Add New Absence
                </div>
                <div class="float-end">
                    <a href="{{ route('absence.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-sample" method="post" action="{{route('absence.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Employee</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="type_absences">
                                        <option>Maladie</option>
                                        <option>CDD</option>
                                        <option>Prestation de service</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Debut</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('') is-invalid @enderror" name="date_debut">
                                    @if ($errors->has(''))
                                        <span class="text-danger">{{ $errors->first('date_debut')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Fin</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date_fin"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Conge">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
