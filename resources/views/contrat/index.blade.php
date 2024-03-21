@extends('layouts.template')
@section('container')
    <div class="container m-lg-5">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Contrats List</div>
            <div class="card-body">
                <a href="{{ route('contrat.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Contrat</a>
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

