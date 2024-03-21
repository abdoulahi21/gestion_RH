@extends('layouts.template')
@section('container')
<div class="container m-lg-5">
    <div class="card mt-5">
        <div class="card-header">
            <div class="float-start">
                Add New Contrat
            </div>
            <div class="float-end">
                <a href="{{ route('contrat.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
        <div class="card-body">
            <form class="form-sample">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Employee</label>
                            <div class="col-sm-9">
                                 <select class="form-control">
                                    <option>Employee 1</option>
                                    <option>Employee 2</option>
                                    <option>Employee 3</option>
                                    <option>Employee 4</option>
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                               <select class="form-control">
                                    <option>CDI</option>
                                    <option>CDD</option>
                                    <option>Prestation de service</option>
                                </select>
                               </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Debut</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('') is-invalid @enderror" name="">
                                @if ($errors->has(''))
                                    <span class="text-danger">{{ $errors->first('skill')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fin</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
