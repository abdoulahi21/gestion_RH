@extends('layouts.template')
@section('container')
    <div class="container m-lg-3">
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary mt-5 ">
            <div class="card-header">Employees List</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee</th>
                        <th>Langue</th>
                        <th>Skill</th>
                        <th>Certification</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->langue }}</td>
                            <td>{{ $user->skill }}</td>
                            <td>{{ $user->certification }}</td>
                            <td>{{$user->status}}</td>
                            <td>
                                @if($user->status == 'Actif' )
                                    <a href="{{ route('employee.desactiver', $user->id) }}" class="btn btn-warning btn-sm">Desactiver</a>
                                @else
                                    <a href="{{ route('employee.activer', $user->id) }}" class="btn btn-warning btn-sm">activer</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

