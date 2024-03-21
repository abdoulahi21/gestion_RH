@extends('layouts.template')
@section('container')
    <div class="container ">
        <div class="card mt-5 ">
            <div class="card-header">
                <div class="float-start">
                    Update Poste
                </div>
                <div class="float-end">
                    <a href="{{ route('poste.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('poste.update',$postes->id)}}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nom</label>
                            <input class="form-control col-md-12" name="nom" type="text" id="formFile" value="{{ $postes->nom }}">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Description</label>
                            <input class="form-control" type="text" name="description" id="formFileMultiple" value="{{ $postes->description}}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFileDisabled" class="form-label">Departement</label>
                        <select class="form-control" name="departement_id">
                            <option value="choisir">choisir</option>
                            @foreach($departements as $departement) @endforeach
                            <option value="{{$departement->id}}">{{$departement->nom}}</option>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-6 offset-md-5 btn btn-primary" value="Add Poste">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
