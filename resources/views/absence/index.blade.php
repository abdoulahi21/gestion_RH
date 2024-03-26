@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Conge List</div>
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($absences as $absence)
                        <tr>
                            <td>{{$absence->id}}</td>
                            <td>{{$absence->user->name}}</td>
                            <td>{{$absence->type_absences}}</td>
                            <td>{{$absence->date_debut}}</td>
                            <td>{{$absence->date_fin}}</td>
                            <td>
                                <form action="{{ route('contrat.destroy', $absence->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @can('manage-leave')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                    @endcan
                                    <a href="{{ route('conge.edit', $absence->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

