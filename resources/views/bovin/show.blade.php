@extends('layouts.master')

@section('title', 'Bovin N: ' . $bovin->num)

@section('content')
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('bovin.index') }}">Bovins</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Bovin N: {{ $bovin->num }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
    	Bovin N: {{ $bovin->num }}
    	<small class="pull-right">
            <button type="button" data-toggle="tab" href="#tab_frais" class="btn red-sunglo">
                <i class="fa fa-money"></i> Frais
            </button>
            <button type="button" data-toggle="tab" href="#tab_poids" class="btn green-meadow">
                <i class="icon-graph"></i> Poids
            </button>
            <button type="button" data-toggle="tab" href="#tab_nourritures" class="btn purple-plum">
                <i class="icon-puzzle"></i> Nourritures
            </button>
            <button type="button" data-toggle="tab" href="#tab_visites" class="btn grey-cascade">
                <i class="fa fa-stethoscope"></i> Visites
            </button>
            <div class="btn-group btn-group-solid">
                <button type="button" class="btn yellow dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-horizontal"></i> Autres actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('achat.create') }}"> Lister les bovins</a>
                    </li>
                    <li>
                        <a href="{{ route('bovin.index') }}"> Ajouter nouveau bovin</a>
                    </li>
                    <li>
                        <a href="{{ route('bovin.edit', ['id' => $bovin->id]) }}"> Modifier ces informations</a>
                    </li>
                </ul>
            </div>
        </small>
    </h1>

    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
    	<div class="col-md-3">
			<div class="panel panel-primary red-intense">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h2 class="panel-title">Informations de bovin</h3>
                </div>
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item"> 
                    	Numero
                        <span class="text-primary pull-right">{{ $bovin->num }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Achat
                        <span class="text-primary pull-right">
                        	<a href="{{ route('achat.show', ['id' => $bovin->achat_id]) }}">{{ $bovin->achat_id }}</a>
                        </span>
                    </li>
                    <li class="list-group-item"> 
                    	Date achat
                        <span class="text-primary pull-right">{{ dateToFrFormat($bovin->achat->date_achat) }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Origine
                        <span class="text-primary pull-right">{{ $bovin->origine }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Poids Initial
                        <span class="text-primary pull-right">{{ $bovin->poids_initial }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Age Initial
                        <span class="text-primary pull-right">{{ $bovin->age_initial }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Poids
                        <span class="text-primary pull-right">{{ $bovin->poids_initial }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Age 
                        <span class="text-primary pull-right">{{ $bovin->age }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Statut
						<span class="badge badge-success">{{ $bovin->statut }}</span>
                    </li>
                    <li class="list-group-item"> 
                    	Prix achat
                        <span class="text-primary pull-right">{{ numberToPriceFormat($bovin->prix) }}</span>
                    </li>
                </ul>
            </div>
    	</div>
    	<div class="col-md-9">
            <div class="tab-content">
                <div id="tab_poids" class="tab-pane">
                    <div class="portlet box green-meadow">
					    <div class="portlet-title">
					        <div class="caption caption-md">
					            <i class="icon-globe theme-font"></i>
					            <span class="caption-subject uppercase">Poids</span>
					        </div>
					    </div>
					    <div class="portlet-body">
					   		<table id="bovin-table" class="table table-striped table-bordered">
	                            <tr>
	                                <th>Date</th>
	                                <th>Poids en KG</th>
	                                <th>Observation</th>
	                            </tr>
	                            @forelse ($bovin->poids as $poids)
	                                <tr>
	                                    <td>{{ dateToFrFormat($poids->date) }}</td>
	                                    <td>{{ $poids->poids }} KG</td>
	                                    <td>{{ $poids->observation }}</td>
	                                </tr>
	                            @empty
	                                ---
	                            @endforelse
	                        </table>
					    </div>
					</div>
                </div>
                <div id="tab_frais" class="tab-pane active">
                    <div class="portlet box red">
					    <div class="portlet-title">
					        <div class="caption caption-md">
					            <i class="icon-globe theme-font"></i>
					            <span class="caption-subject uppercase">Frais</span>
					        </div>
					    </div>
					    <div class="portlet-body">
					   		<table id="bovin-table" class="table table-striped table-bordered">
	                            <tr>
	                                <th>Date</th>
	                                <th>Type</th>
	                                <th>Montant</th>
	                                <th>Observation</th>
	                            </tr>
	                            @forelse ($bovin->frais as $frais)
	                                <tr>
	                                    <td>{{ dateToFrFormat($frais->date) }}</td>
	                                    <td>
	                                    	<span class="badge badge-warning">{{ $frais->type }}</span>
	                                    </td>
	                                    <td>{{ numberToPriceFormat($frais->montant) }}</td>
	                                    <td>{{ $frais->observation }}</td>
	                                </tr>
	                            @empty
	                                ---
	                            @endforelse
	                        </table>
					    </div>
					</div>
                </div>
                <div id="tab_visites" class="tab-pane">
                    <div class="portlet box grey-cascade">
					    <div class="portlet-title">
					        <div class="caption caption-md">
					            <i class="icon-globe theme-font"></i>
					            <span class="caption-subject uppercase">Visites</span>
					        </div>
					    </div>
					    <div class="portlet-body">
					   		<table id="bovin-table" class="table table-striped table-bordered">
	                            <tr>
	                                <th>Date</th>
	                                <th>Veterinaire</th>
	                                <th>Type</th>
	                                <th>Prix</th>
	                                <th>Observation</th>
	                                <th>#</th>
	                            </tr>
	                            @forelse ($bovin->visites as $visite)
	                                <tr>
	                                    <td>{{ dateToFrFormat($visite->date) }}</td>
	                                    <td>{{ $visite->veterinaire->nom }}</td>
	                                    <td>{{ $visite->type }}</td>
	                                    <td>{{ numberToPriceFormat($visite->observation) }}</td>
	                                    <td>{{ $visite->observation }}</td>
	                                    <td>
											<a href="{{ route('visite.show', ['id' => $visite->id]) }}" class="btn blue btn-sm uppercase">Details</a>
	                                    </td>
	                                </tr>
	                            @empty
	                                ---
	                            @endforelse
	                        </table>
					    </div>
					</div>
                </div>
                <div id="tab_nourritures" class="tab-pane">
                    <div class="portlet box purple-plum">
					    <div class="portlet-title">
					        <div class="caption caption-md">
					            <i class="icon-globe theme-font"></i>
					            <span class="caption-subject uppercase">Nourritures</span>
					        </div>
					    </div>
					    <div class="portlet-body">
					   		<table id="bovin-table" class="table table-striped table-bordered">
	                            <tr>
	                                <th>Date</th>
	                                <th>Element</th>
	                                <th>Quantité</th>
	                            </tr>
	                            @forelse ($bovin->nourritures as $nourriture)
	                                <tr>
	                                    <td>{{ dateToFrFormat($nourriture->date) }}</td>
	                                    <td>{{ $nourriture->stockElement->designation }}</td>
	                                    <td>{{ $nourriture->qte }}</td>
	                                </tr>
	                            @empty
	                                ---
	                            @endforelse
	                        </table>
					    </div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection