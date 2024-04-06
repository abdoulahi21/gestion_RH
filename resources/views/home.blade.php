@extends('layouts.template')
@section('container')
    <div class="container m-lg-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card bg-primary card-rounded">
                    <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-2">Employees</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <h2 class="text-white ">{{ $totalAgents}}</h2>
                                <h4 class="text-white">Actif:{{$activeAgents}}</h4>
                                <h4 class="text-white">Inactif:{{$inactiveAgents}}</h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="status-summary-chart-wrapper">
                                    <canvas id="status-summary1" ></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card bg-danger card-rounded">
                    <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-2">Contrats CDD</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <h2 class="text-white">{{ $Agents}}</h2>
                            </div>
                            <div class="col-sm-8">
                                <div class="status-summary-chart-wrapper">
                                    <canvas id="status-summary2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container m-lg-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card bg-success card-rounded">
                    <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-2">Contrats CDI</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <h2 class="text-white ">{{ $permanentAgents}}</h2>
                            </div>
                            <div class="col-sm-8">
                                <div class="status-summary-chart-wrapper">
                                    <canvas id="status-summary"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card bg-info card-rounded">
                    <div class="card-body pb-0">
                        <h4 class="card-title card-title-dash text-white mb-2">Conges</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="text-white">En attente:{{ $congeAttente}}</h4>
                                <h4 class="text-white">En cours:{{ $congeAccepter}}</h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="status-summary-chart-wrapper">
                                    <canvas id="status-summary"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
