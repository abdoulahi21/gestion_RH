@extends('layouts.template')
@section('container')
    <div class="container m-lg-4">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Departement List</div>
            <div class="card-body">
                @can('manage-departement')
                    <a href="{{ route('departement.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
                @endcan
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">s#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($departements as $departement)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $departement->nom }}</td>
                            <td>{{$departement->description}}</td>
                            <td>
                                <form action="{{ route('departement.destroy', $departement->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    @can('manage-departement')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4">
                        <span class="text-danger">
                            <strong>No Product Found!</strong>
                        </span>
                        </td>
                    @endforelse
                    </tbody>
                </table>
                {{ $departements->links() }}
            </div>
        </div>
    </div>
@endsection
