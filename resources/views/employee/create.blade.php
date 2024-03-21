@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card mt-5">
            <div class="card-header">
                <div class="float-start">
                    Add New Employee
                </div>
                <div class="float-end">
                    <a href="{{ route('employee.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-sample" action="{{route('employee.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employee</label>
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
                                <label class="col-sm-3 col-form-label" >Langue</label>
                                <div class="col-sm-9">
                                   <input type="text" class="form-control @error('langue') is-invalid @enderror" name="langue">
                                    @if ($errors->has('langue'))
                                        <span class="text-danger">{{ $errors->first('langue')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" name="skill">Skill</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control @error('skill') is-invalid @enderror" name="skill">
                                        @if ($errors->has('skill'))
                                            <span class="text-danger">{{ $errors->first('skill')}}</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Certification</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('certification') is-invalid @enderror" name="certification">
                                    @if ($errors->has('certification'))
                                        <span class="text-danger">{{ $errors->first('certification')}}</span>
                                    @endif
                                </div>
                            </div>
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
