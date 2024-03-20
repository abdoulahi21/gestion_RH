@extends('layouts.template')
@section('container')
    <div class="container ">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Departement
                    </div>
                    <div class="float-end">
                        <a href="{{ route('departement.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body ">
                    <form action="{{ route('departement.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="nom" class="col-md-4 col-form-label text-md-end text-start">Nom</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
                                @if ($errors->has('nom'))
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="">
                            <button type="submit" class="btn btn-primary" value="">Ajouter</button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
@endsection
