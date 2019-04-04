@extends('layouts.master')

@section('title', 'Information d\'achat : ' . $achat->id)

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Tableau de bord</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Achat N° {{ $achat->id }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Achat N° {{ $achat->id }}
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('achat.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des acahts
            </a>
        </small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-4">
            <div class="dashboard-stat2">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="{{ $achat->montantTotalTransportAchat }}">{{ numberToPriceFormat($achat->montantTotalTransportAchat) }}</span>
                        </h3>
                        <small>Montant total transport</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-truck"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="{{ $achat->montantTotalAchat }}">{{ numberToPriceFormat($achat->montantTotalAchat) }}</span>
                        </h3>
                        <small>Montant total</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="{{ count($achat->bovins) }}">{{ count($achat->bovins) }}</span>
                            <small class="font-green-sharp">Bovin(s)</small>
                        </h3>
                        <small>Nombre des Bovins</small>
                    </div>
                    <div class="icon">
                        <i class="icon-ghost"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Informations d'achat</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-bold">Fournisseur</td>
                            <td><span class="text-primary">{{ $achat->fournisseur->nom }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Date d'achat</td>
                            <td><span class="text-primary">{{ $achat->date_achat }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Matricule</td>
                            <td><span class="text-primary">{{ $achat->transport->matricule }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Choufeur</td>
                            <td><span class="text-primary">{{ $achat->transport->nom_chaffeur }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Observation</td>
                            <td><span class="text-primary">{{ $achat->observation }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Bovins acheté</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sexe</th>
                                <th>Poids Initial</th>
                                <th>Age Initial</th>
                                <th>Origine</th>
                                <th>Prix</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($achat->bovins as $bovin)
                                <tr>
                                    <td>
                                        <a href="{{ route('bovin.show', ['id' => $bovin->id]) }}">{{ $bovin->num }}</a>
                                    </td>
                                    <td>{{ $bovin->sexe }}</td>
                                    <td>{{ $bovin->poids_initial }}</td>
                                    <td>{{ $bovin->age_initial }}</td>
                                    <td>{{ numberToPriceFormat($bovin->prix) }}</td>
                                    <td>{{ $bovin->origine }}</td>
                                    <td> <span class="label bg-green">{{ $bovin->statut }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection