@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard.index') }}">Acceil</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tableau de bord</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title">
        Tableau de bord 
        <small>Statistques...</small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dashboard-stat blue" href="#">
                <div class="visual">
                    <i class="fa icon-ghost"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $countBouvins }}">0</span>
                    </div>
                    <div class="desc">Tout les bouvins</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dashboard-stat yellow-crusta" href="#">
                <div class="visual">
                    <i class="icon-map"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $countEnQuarantineBouvins }}">0</span></div>
                    <div class="desc">En quarantine</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dashboard-stat green-meadow" href="#">
                <div class="visual">
                    <i class="icon-check"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $countActifBouvins }}</span></div>
                    <div class="desc">Bovins actifs</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dashboard-stat red-flamingo" href="#">
                <div class="visual">
                    <i class="icon-question"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $countNonActifBouvins }}">0</span>
                    </div>
                    <div class="desc">Bovins non actif</div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dashboard-stat dark" href="#">
                <div class="visual">
                    <i class="fa fa-trash-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $countPertsBouvins }}">0</span>
                    </div>
                    <div class="desc">Perts</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dashboard-stat purple" href="#">
                <div class="visual">
                    <i class="icon-basket-loaded"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $countAchats }}">0</span></div>
                    <div class="desc">Achats </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dashboard-stat yellow-gold" href="#">
                <div class="visual">
                    <i class="fa fa-money"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span>{{ $totalDepanceForThisMonth }}</span> DH</div>
                    <div class="desc">Depances Dernier Mois</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $countVisites }}">0</span>
                    </div>
                    <div class="desc">Nbre. visites deriner mois </div>
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- END DASHBOARD STATS 1-->
    <div class="row">
        <div class="col-md-6">
            <div class="portlet box red ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject uppercase">Les 10 derniers bovins</span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('bovin.index') }}" class="btn btn-default btn-sm">Touts les bovins</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sexe</th>
                                <th>Origine</th>
                                <th>Statut</th>
                                <th>Prix d'achat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastBovins as $bovin)
                                <tr>
                                    <td>
                                        <a href="{{ route('bovin.show', ['id' => $bovin->id]) }}">{{ $bovin->num }}</a>
                                    </td>
                                    <td>{{ $bovin->sexe }}</td>
                                    <td>{{ $bovin->origine }}</td>
                                    <td> <span class="label bg-green">{{ $bovin->statut }}</span></td>
                                    <td>{{ numberToPriceFormat($bovin->prix) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject uppercase">Les 10 derniers achats </span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('achat.index') }}" class="btn btn-default btn-sm">Touts les achats</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Fournisseur</th>
                                <th>Date</th>
                                <th>Nb Bovins</th>
                                <th>Montant total transport</th>
                                <th>Montant total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lastAchats as $achat)
                                <tr>
                                    <td>{{ $achat->fournisseur->nom }}</td>
                                    <td>{{ dateToFrFormat($achat->date_achat) }}</td>
                                    <td>{{ count($achat->bovins) }}</td>
                                    <td>{{ numberToPriceFormat($achat->montantTotalTransportAchat) }}</td>
                                    <td>{{ numberToPriceFormat($achat->montantTotalAchat) }}</td>
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

@section('plugin-javascripts')
    <script src="{{ asset('assets2/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
@endsection