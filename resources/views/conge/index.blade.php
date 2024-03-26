@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($conges as $conge)
                        <tr>
                            <td>{{$conge->id}}</td>
                            <td>{{$conge->user->name}}</td>
                            <td>{{$conge->type_contrats}}</td>
                            <td>{{$conge->date_debut}}</td>
                            <td>{{$conge->date_fin}}</td>
                            <td>{{$conge->status}}</td>
                            <td>
                                <form action="{{ route('contrat.destroy', $conge->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @can('manage-leave')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                    @endcan
                                    <a href="{{ route('conge.edit', $conge->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Edit</a>
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

