@extends('layouts.template')
@section('container')
    <div class="container">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Postes List</div>
            <div class="card-body">
                <a href="{{ route('poste.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Poste</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Departement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($postes as $poste)
                    <tr>
                        <td>{{ $poste->id }}</td>
                        <td>{{ $poste->nom }}</td>
                        <td>{{ $poste->description }}</td>
                        <td>{{ $poste->departement->nom }}</td>
                        <td>
                            <form action="{{ route('poste.destroy', $poste->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                @can('manage-poste')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                @endcan
                                <a href="{{ route('poste.edit', $poste->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Edit</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $postes->links() }}
    </div>
</div>
</div>
@endsection
