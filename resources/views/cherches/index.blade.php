@extends('layouts.master')

@section('title', 'Préparation au vente')

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
                <span>Préparation au vente</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Préparation au vente
        <small class="pull-right">
            <a class="btn blue btn-md" href="{{ url('exports/available-bovin?from=' . (isset($from) ? $from : '') . '&to=' . (isset($to) ? $to : '') . '&nbre=' . (isset($nbre) ? $nbre : '') . '&pourcentage=' . (isset($pourcentage) ? $pourcentage : '')) }}" target="_self">
                <i class="fa fa-sheet-o"></i> &nbsp;Imprimer la liste en PDF
            </a>
        </small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet grey-cascade box">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject uppercase">Filtrer</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('searchAvailableBovin') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                                            <label for="">A partire de la poids</label>
                                            <input type="text" class="form-control" name="from" value="{{ old('from', (isset($from) ? $from : '')) }}"  placeholder="A partire de la poids...">
                                            @if ($errors->has('from'))
                                                <span class="help-block">{{ $errors->first('from') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                                            <label for="">Jusqu'à :</label>
                                            <input type="text" class="form-control" name="to" value="{{ old('to', (isset($to) ? $to : '')) }}"  placeholder="Jusqu'à...">
                                            @if ($errors->has('to'))
                                                <span class="help-block">{{ $errors->first('to') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('nbre') ? ' has-error' : '' }}">
                                            <label for="">Nbre. bovins</label>
                                            <input type="number" class="form-control" name="nbre" value="{{ old('nbre', (isset($nbre) ? $nbre : '')) }}"  placeholder="Nbre. bovins">
                                            @if ($errors->has('nbre'))
                                                <span class="help-block">{{ $errors->first('nbre') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group{{ $errors->has('pourcentage') ? ' has-error' : '' }}">
                                            <label for="">Pourcentage de gain <small class="text-danger">Pour calcule le prix conseillé</small></label>
                                            <select name="pourcentage" id="pourcentage" class="form-control">
                                                @foreach (getInitPourcentages() as $key => $item)
                                                    <option {{ (old('pourcentage', (isset($pourcentage) ? $pourcentage : '')) == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('pourcentage'))
                                                <span class="help-block">{{ $errors->first('pourcentage') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">.</label>
                                    <button class="btn btn-danger form-control">Filtrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet grey-cascade box">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject uppercase">Bovins disponible</span>
                    </div>
                    <div class="tools">
                        <a href="" class="fullscreen" data-original-title="Agrandir" title="Agrandir"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sexe</th>
                                <th>Origine</th>
                                <th>Poids</th>
                                <th>Age</th>
                                <th>Prix d'achat</th>
                                <th>Total depances</th>
                                <th>Prix de vente conseillé</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bovins as $bovin)
                                <tr>
                                    <td>{{ $bovin->num }}</td>
                                    <td>{{ $bovin->sexe }}</td>
                                    <td>{{ $bovin->origine }}</td>
                                    <td>{{ $bovin->poidsActuel }}</td>
                                    <td>{{ $bovin->ageActuel }} Mois</td>
                                    <td>{{ numberToPriceFormat($bovin->prix) }}</td>
                                    <td>{{ numberToPriceFormat($bovin->totalDepances) }}</td>
                                    <td>{{ addPourcentage($bovin->totalDepances, $pourcentage) }}</td>
                                    <td class="td-actions">
                                        <a href="{{ route('achat.show', ['id' => $bovin->achat_id]) }}" class="btn yellow btn-sm uppercase">Achat</a>
                                        <a href="{{ route('bovin.show', ['id' => $bovin->id]) }}" class="btn blue btn-sm uppercase">Details</a>
                                    </td>
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

@section('plugin-stylesheets')
    <link href="{{ asset('assets2/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets2/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('plugin-javascripts')
    <script src="{{ asset('assets2/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection