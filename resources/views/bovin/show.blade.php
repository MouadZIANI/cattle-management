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
		    <a href="{{ route('bovin.index') }}" class="btn red"><i class="icon-arrow-left"></i> Lister les bovins</a>
		    <a href="{{ route('bovin.create') }}" class="btn green"><i class="icon-arrow-left"></i> Ajouter nouveau bovin</a>
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
                        <span class="text-primary pull-right">{{ numberToPriceFormat($bovin->achat->prix) }}</span>
                    </li>
                </ul>
            </div>
            {{-- <ul class="ver-inline-menu tabbable margin-bottom-10">
                <li class="active">
                    <a data-toggle="tab" href="#tab_1">
                        <i class="icon-settings"></i> Poids 
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab_2">
                        <i class="icon-settings"></i> Frais 
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab_3">
                        <i class="icon-settings"></i> Nourritures 
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab_4">
                        <i class="icon-settings"></i> Visites 
                    </a>
                </li>
            </ul> --}}
    	</div>
    	<div class="col-md-9">
            <div class="tab-content">
                <div id="tab_1" class="tab-pane active">
                    <div class="portlet box red">
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
                <div id="tab_2" class="tab-pane active">
                    <div class="portlet box green">
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
	                                    <td>{{ $frais->date }}</td>
	                                    <td>{{ $frais->type }}</td>
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
                <div id="tab_3" class="tab-pane active">
                    <div class="portlet box blue">
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
	                            </tr>
	                            @forelse ($bovin->visites as $visite)
	                                <tr>
	                                    <td>{{ dateToFrFormat($visite->date) }}</td>
	                                    <td>{{ $visite->veterinaire->nom }}</td>
	                                    <td>{{ $visite->type }}</td>
	                                    <td>{{ numberToPriceFormat($visite->observation) }}</td>
	                                    <td>{{ $visite->observation }}</td>
	                                </tr>
	                            @empty
	                                ---
	                            @endforelse
	                        </table>
					    </div>
					</div>
                </div>
                <div id="tab_4" class="tab-pane active">
                    <div class="portlet box yellow">
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
	                                <th>Veterinaire</th>
	                                <th>Type</th>
	                                <th>Prix</th>
	                                <th>Observation</th>
	                            </tr>
	                            @forelse ($bovin->nourritures as $nourriture)
	                                <tr>
	                                    <td>{{ dateToFrFormat($nourriture->date) }}</td>
	                                    <td>{{ $nourriture->stockElement->designation }}</td>
	                                    <td>{{ $nourriture->type }}</td>
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