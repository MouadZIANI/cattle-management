@extends('layouts.master')

@section('title', 'Details visite : ' . $visite->id)

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
                <span>Details de la visite N° {{ $visite->id }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Details de la visite N° {{ $visite->id }}
        <small class="pull-right">
            <a class="btn green btn-md" href="{{ route('visite.create') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Nouvelle visite
            </a>
            <a class="btn red btn-md" href="{{ route('visite.index') }}" target="_self">
                <i class="fa fa-list"></i> &nbsp; Liste des visite
            </a>
        </small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Informations de visite</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-bold">Bovin</td>
                            <td>
                                <a href="{{ route('bovin.show', ['id' => $visite->bovin->id]) }}"><span class="text-red">{{ $visite->bovin->num }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Veterinaire</td>
                            <td>
                                <a href="{{ route('veterinaire.show', ['id' => $visite->veterinaire->id]) }}"><span class="text-red">{{ $visite->veterinaire->nom }}</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Type de visite</td>
                            <td><span class="text-primary">{{ $visite->type }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Date de visite</td>
                            <td><span class="text-primary">{{ dateToFrFormat($visite->date) }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Prix</td>
                            <td><span class="text-primary">{{ numberToPriceFormat($visite->prix) }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Observation</td>
                            <td><span class="text-primary">{{ $visite->observation }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Ordonnance</span>
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
                                <th>Medicament</th>
                                <th>Quantité</th>
                                <th>Posologie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visite->ordonnances as $ordonnance)
                                <tr>
                                    <td>{{ $ordonnance->id }}</td>
                                    <td>{{ $ordonnance->medicament->designation }}</td>
                                    <td>{{ $ordonnance->qte }}</td>
                                    <td>{{ $ordonnance->posologie }}</td>
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