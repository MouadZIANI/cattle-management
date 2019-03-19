@extends('layouts.master')

@section('title', 'Nouvelle achat')

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
                <span>Nouvelle achat</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Nouvelle achat
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('achat.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des acahts
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
                        <span class="caption-subject bold uppercase font-dark">Ajouter nouveau achat</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('achat.store') }}" class="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('fournisseur_id') ? ' has-error' : '' }}">
                                    <label for="fournisseur_id">Fournisseur</label>
                                    <select name="fournisseur_id" class="form-control" id="fournisseur_id">
                                        @foreach($fournisseurs as $key => $fournisseur)
                                            <option {!! (old('fournisseur_id') == $fournisseur->id) ? 'selected' : '' !!} value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('fournisseur_id'))
                                        <span class="help-block">{{ $errors->first('fournisseur_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="">.</label>   
                                    <a href="{{ route('fournisseur.create') }}" class="btn btn-primary form-control"><span class="fa fa-plus"></span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('date_achat') ? ' has-error' : '' }}">
                                    <label for="date_achat">Date achat</label>
                                    <input type="date" name="date_achat" class="form-control" placeholder="Date achat" value="{{ old('date_achat') }}">
                                    @if ($errors->has('date_achat'))
                                        <span class="help-block">{{ $errors->first('date_achat') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h3 class="form-section">Information de transport</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('matricule') ? ' has-error' : '' }}">
                                    <label for="matricule">Matricule</label>
                                    <input type="text" name="matricule" class="form-control" placeholder="Matricule" value="{{ old('matricule') }}">
                                    @if ($errors->has('matricule'))
                                        <span class="help-block">{{ $errors->first('matricule') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('nom_chaffeur') ? ' has-error' : '' }}">
                                    <label for="nom_chaffeur">Chaffeur</label>
                                    <input type="text" name="nom_chaffeur" class="form-control" placeholder="Chaffeur" value="{{ old('nom_chaffeur') }}">
                                    @if ($errors->has('nom_chaffeur'))
                                        <span class="help-block">{{ $errors->first('nom_chaffeur') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                    <label for="tel">Tel transport</label>
                                    <input type="tel" name="tel" class="form-control" placeholder="Tel transport" value="{{ old('tel') }}">
                                    @if ($errors->has('tel'))
                                        <span class="help-block">{{ $errors->first('tel') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('frais') ? ' has-error' : '' }}">
                                    <label for="frais">Frais transport pour chaque bovin</label>
                                    <input type="text" name="frais" class="form-control" placeholder="Frais en (DH)" value="{{ old('frais') }}">
                                    @if ($errors->has('frais'))
                                        <span class="help-block">{{ $errors->first('frais') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h3 class="form-section">Bovins</h3>
                        <table id="bovin-table" class="table table-striped table-bordered">
                            <tr>
                                <th>Num</th>
                                <th>Sexe</th>
                                <th>Origine</th>
                                <th>Poids initial</th>
                                <th>Age</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>
                                    <button id="add-row-to-bovin-table" type="button" class="btn green"><i class="fa fa-plus"></i></button>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="num[]" class="form-control" placeholder="Num">
                                </td>
                                <td>
                                    <select name="sexe[]" class="form-control" id="sexe">
                                        <option value="H">H</option>
                                        <option value="F">F</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="origine[]" class="form-control" placeholder="Origine">
                                </td>
                                <td>
                                    <input type="text" name="poids_initial[]" class="form-control" placeholder="Poids initial">
                                </td>
                                <td>
                                    <input type="text" name="age[]" class="form-control" placeholder="Age">
                                </td>
                                <td>
                                    <input type="text" name="prix[]" class="form-control" placeholder="Prix d'achat">
                                </td>
                                <td>
                                    <select name="statut[]" class="form-control" id="statut">
                                        @foreach(getStatusBovin() as $key => $statut)
                                            <option value="{{ $statut }}">{{ $statut }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
                            <label for="observation">Observation</label>
                            <textarea name="observation" class="form-control" id="observation" cols="30" rows="5" placeholder="Observation">{{ old('observation') }}</textarea>
                            @if ($errors->has('observation'))
                                <span class="help-block">{{ $errors->first('observation') }}</span>
                            @endif
                        </div>
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
                var row = '<tr> <td> <input type="text" name="num[]" class="form-control" placeholder="Num"> </td> <td><select name="sexe[]" class="form-control" id="sexe"><option value="H">H</option><option value="F">F</option></select></td> <td> <input type="text" name="origine[]" class="form-control" placeholder="Origine"> </td> <td> <input type="text" name="poids_initial[]" class="form-control" placeholder="Poids initial"> </td> <td> <input type="text" name="age[]" class="form-control" placeholder="Age"> </td> <td><input type="text" name="prix[]" class="form-control" placeholder="Prix d\'achat"> </td> <td> <select name="statut[]" class="form-control" id="statut"> @foreach(getStatusBovin() as $key => $statut) <option value="{{ $statut }}">{{ $statut }}</option> @endforeach </select> </td> <td> <button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button> </td> </tr>';
                $('#bovin-table').append(row);
            });

            $('body').on("click", ".btn-remove-row", function(e) {
                $(this).parent().parent().remove();
            });
        })
    </script>
@endsection