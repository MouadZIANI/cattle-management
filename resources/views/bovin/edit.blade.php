@extends('layouts.master')

@section('title', 'Editer les informations de bovin')

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
                <span>Bovin N° {{ $bovin->num }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Informations du bovin N° {{ $bovin->num }}
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('achat.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des bovins
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
                        <span class="caption-subject bold uppercase font-dark">Bovin N° {{ $bovin->num }}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('bovin.update', ['id' => $bovin->id]) }}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('num') ? ' has-error' : '' }}">
                                    <label for="num">Numéro de bovin</label>
                                    <input type="text" name="num" disabled class="form-control" placeholder="Numéro de bovin" value="{{ $bovin->num }}">
                                    @if ($errors->has('num'))
                                        <span class="help-block">{{ $errors->first('num') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('sexe') ? ' has-error' : '' }}">
                                    <label for="sexe">Sexe</label>
                                    <select name="sexe" class="form-control" id="sexe">
                                        <option {!! ($bovin->sexe == 'H') ? 'selected' : '' !!} value="H">H</option>
                                        <option {!! ($bovin->sexe == 'F') ? 'selected' : '' !!} value="F">F</option>
                                    </select>
                                    @if ($errors->has('sexe'))
                                        <span class="help-block">{{ $errors->first('sexe') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('achat_id') ? ' has-error' : '' }}">
                                    <label for="achat_id">Achat</label>
                                    <select name="achat_id" class="form-control" id="achat_id">
                                        @foreach($achats as $key => $achat)
                                            <option {!! ($bovin->achat_id == $achat->id) ? 'selected' : '' !!} value="{{ $achat->id }}">{{ $achat->id }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('achat_id'))
                                        <span class="help-block">{{ $errors->first('achat_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('poids_initial') ? ' has-error' : '' }}">
                                    <label for="poids_initial">Poids initial</label>
                                    <input type="text" name="poids_initial" class="form-control" placeholder="Poids initial" value="{{ $bovin->poids_initial }}">
                                    @if ($errors->has('poids_initial'))
                                        <span class="help-block">{{ $errors->first('poids_initial') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('age_initial') ? ' has-error' : '' }}">
                                    <label for="age_initial">Age initial</label>
                                    <input type="text" name="age_initial" class="form-control" placeholder="Age initial" value="{{ $bovin->age_initial }}">
                                    @if ($errors->has('age_initial'))
                                        <span class="help-block">{{ $errors->first('age_initial') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('origine') ? ' has-error' : '' }}">
                                    <label for="origine">Origine</label>
                                    <input type="text" name="origine" class="form-control" placeholder="Origine" value="{{ $bovin->origine }}">
                                    @if ($errors->has('origine'))
                                        <span class="help-block">{{ $errors->first('origine') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Statut</label>
                                <select name="statut" class="form-control{{ $errors->has('origine') ? ' has-error' : '' }}" id="statut">
                                    @foreach(getStatusBovin() as $key => $statut)
                                        <option {!! ($bovin->statut == $statut) ? 'selected' : '' !!} value="{{ $statut }}">{{ $statut }}</option>
                                    @endforeach
                                    @if ($errors->has('statut'))
                                        <span class="help-block">{{ $errors->first('statut') }}</span>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <h3 class="form-section">Poids</h3>
                        <table id="bovin-table" class="table table-striped table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Poids en KG</th>
                                <th>Observation</th>
                                <th>
                                    <button id="add-row-to-bovin-table" type="button" class="btn green"><i class="fa fa-plus"></i></button>
                                </th>
                            </tr>
                            @forelse ($bovin->poids as $poids)
                                <tr>
                                    <td>
                                        <input type="date" name="date[]" class="form-control" value="{{ $poids->date }}" placeholder="Date">
                                    </td>
                                    <td>
                                        <input type="text" name="poids[]" class="form-control" value="{{ $poids->poids }}" placeholder="Poids en (kg)">
                                    </td>
                                    <td>
                                        <input type="text" name="observation[]" class="form-control" value="{{ $poids->observation }}" placeholder="Observation">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <input type="date" name="date[]" class="form-control" placeholder="Date">
                                    </td>
                                    <td>
                                        <input type="text" name="poids[]" class="form-control" placeholder="Poids en (kg)">
                                    </td>
                                    <td>
                                        <input type="text" name="observation[]" class="form-control" placeholder="Observation">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <div class="form-actions right">
                            <button type="button" class="btn default">Annuler</button>
                            <button type="submit" class="btn green"><i class="fa fa-check"></i> Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-javascripts')
    <script>
        $(document).ready(function () {
            // Events
            $('#add-row-to-bovin-table').click(function () {
                var row = '<tr><td><input type="date" name="date[]" class="form-control" placeholder="date"></td><td><input type="text" name="poids[]" class="form-control" placeholder="Poids en (kg)"></td><td><input type="text" name="observation[]" class="form-control" placeholder="Observation"></td><td><button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button></td></tr>';
                $('#bovin-table').append(row);
            });

            $('body').on("click", ".btn-remove-row", function(e) {
                $(this).parent().parent().remove();
            });
        })
    </script>
@endsection