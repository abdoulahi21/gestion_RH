@extends('layouts.template')
@section('container')
    <div class="container  m-lg-3">
        <div class="card mt-5">
            <div class="card-header">Gestions Roles</div>
            <div class="card-body">
                @can('create-role')
                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Role</a>
                @endcan
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="width: 250px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    @if ($role->name!='Administrateurs')
                                        @can('edit-role')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                        @endcan

                                        @can('delete-role')
                                            @if ($role->name!=Auth::user()->hasRole($role->name))
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="bi bi-trash"></i> Delete</button>
                                            @endif
                                        @endcan
                                    @endif

                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="3">
                        <span class="text-danger">
                            <strong>No Role Found!</strong>
                        </span>
                        </td>
                    @endforelse
                    </tbody>
                </table>

                {{ $roles->links() }}

            </div>
        </div>
    </div>

@endsection
