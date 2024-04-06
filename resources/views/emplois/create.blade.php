@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card mt-5">
            <div class="card-header">
                <div class="float-start">
                    Add New Conge
                </div>
                <div class="float-end">
                    <a href="{{ route('emplois.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-sample" method="post" action="{{route('emplois.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Contrat</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="contrat_id">
                                        @foreach($contrats as $contrat)
                                            <option value="{{$contrat->id}}">{{$contrat->type_contrats}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Poste</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="poste_id">
                                        @foreach($postes as $poste)
                                            <option value="{{$poste->id}}">{{$poste->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Salaire</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('salaire') is-invalid @enderror" name="salaire">
                                    @if ($errors->has('salaire'))
                                        <span class="text-danger">{{ $errors->first('salaire')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Emplois">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
