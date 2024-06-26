@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Contrats List</div>
            <div class="card-body">
                @if(Auth::user()->hasRole('Administrateurs'))
                    <a href="{{ route('contrat.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Contrat</a>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Type Contrat</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach($contrats as $contrat)
                           <tr>
                               <td>{{$contrat->id}}</td>
                               <td>{{$contrat->user->name}}</td>
                               <td>{{$contrat->type_contrats}}</td>
                               <td>{{$contrat->date_debut}}</td>
                               <td>{{$contrat->date_fin}}</td>
                               <td>
                                   <form action="{{ route('download-pdf', $contrat->id) }}" method="post">
                                       @csrf
                                       <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to export this product?');"><i class="bi bi-trash"></i>Export</button>
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

