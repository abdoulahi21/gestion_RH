@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Absence List</div>
            <div class="card-body">
                <a href="{{ route('absence.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Absence</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Type Absence</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Auth::user()->hasRole('Administrateurs'))
                        @foreach($absences as $absence)
                            <tr>
                                <td>{{$absence->id}}</td>
                                <td>{{$absence->user->name}}</td>
                                <td>{{$absence->type_absences}}</td>
                                <td>{{$absence->date_debut}}</td>
                                <td>{{$absence->date_fin}}</td>
                                <td>{{$absence->status}}</td>
                                <td>
                                    @if($conge->status == 'En attente' )
                                        <a href="{{ route('absence.accept', $absence->id) }}" class="btn btn-warning btn-sm">Valider</a>
                                        <a href="{{ route('absence.refuse', $absence->id) }}" class="btn btn-danger btn-sm">Refuser</a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    @else @if(Auth::user()->hasRole('employees'))
                        @foreach($absences as $absence)
                            <tr>
                                <td>{{$absence->id}}</td>
                                <td>{{$absence->user->name}}</td>
                                <td>{{$absence->type_absences}}</td>
                                <td>{{$absence->date_debut}}</td>
                                <td>{{$absence->date_fin}}</td>
                                <td>{{$absence->status}}</td>
                                <td>
                                    @if($absence->status != 'En attente' )
                                        <a href="{{ route('absence.download-pdf', $absence->id) }}" class="btn btn-warning btn-sm">Export</a>
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

