@extends('layouts.template')
@section('container')
    <div class="container m-lg-4">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Conge List</div>
            <div class="card-body">
                <a href="{{ route('conge.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Conge</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Type Conge</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Auth::user()->hasRole('Administrateurs'))
                        @foreach($conges as $conge)
                            <tr>
                                <td>{{$conge->id}}</td>
                                <td>{{$conge->user->name}}</td>
                                <td>{{$conge->type_conge}}</td>
                                <td>{{$conge->date_debut}}</td>
                                <td>{{$conge->date_fin}}</td>
                                <td>{{$conge->status}}</td>
                                <td>
                                    @if($conge->status == 'En attente' )
                                         <a href="{{ route('conge.accept', $conge->id) }}" class="btn btn-warning btn-sm">Valider</a>
                                         <a href="{{ route('conge.refuse', $conge->id) }}" class="btn btn-danger btn-sm">Refuser</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @else @if(Auth::user()->hasRole('employees'))
                            @foreach($conges as $conge)
                                <tr>
                                    <td>{{$conge->id}}</td>
                                    <td>{{$conge->user->name}}</td>
                                    <td>{{$conge->type_conge}}</td>
                                    <td>{{$conge->date_debut}}</td>
                                    <td>{{$conge->date_fin}}</td>
                                    <td>{{$conge->status}}</td>
                                    <td>
                                        @if($conge->status != 'En attente' )
                                            <a href="{{ route('conge.download-pdf', $conge->id) }}" class="btn btn-warning btn-sm">Export</a>
                                        @endif
                                </tr>
                            @endforeach
                        @endif
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

