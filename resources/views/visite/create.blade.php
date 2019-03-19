@extends('layouts.master')

@section('title', 'Nouvelle visite')

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
                <span>Nouvelle visite</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Nouvelle visite
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('visite.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des visites
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
                        <span class="caption-subject bold uppercase font-dark">Ajouter nouveau visite</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('visite.store') }}" class="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('veterinaire_id') ? ' has-error' : '' }}">
                                    <label for="veterinaire_id">Veterinaire</label>
                                    <select name="veterinaire_id" class="form-control" id="veterinaire_id">
                                        @foreach($veterinaires as $key => $veterinaire)
                                            <option {!! (old('veterinaire_id') == $veterinaire->id) ? 'selected' : '' !!} value="{{ $veterinaire->id }}">{{ $veterinaire->nom }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('veterinaire_id'))
                                        <span class="help-block">{{ $errors->first('veterinaire_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="">.</label>   
                                    <a href="{{ route('veterinaire.create') }}" class="btn btn-primary form-control"><span class="fa fa-plus"></span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="date">Date visite</label>
                                    <input type="date" name="date" class="form-control" placeholder="Date achat" value="{{ old('date') }}">
                                    @if ($errors->has('date'))
                                        <span class="help-block">{{ $errors->first('date') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type">Type de visite</label>
                                    <input type="text" name="type" class="form-control" placeholder="Type de visite" value="{{ old('type') }}">
                                    @if ($errors->has('type'))
                                        <span class="help-block">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('prix') ? ' has-error' : '' }}">
                                    <label for="prix">Prix pour chaque bovin</label>
                                    <input type="text" name="prix" class="form-control" placeholder="Prix pour chaque bovin en DH" value="{{ old('prix') }}">
                                    @if ($errors->has('prix'))
                                        <span class="help-block">{{ $errors->first('prix') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h3 class="form-section">Bovins</h3>
                        <table id="bovin-table" class="table table-striped table-bordered">
                            <tr>
                                <th>Num Bovin</th>
                                <th>Ordonnance</th>
                                <th>Observation</th>
                                <th>Statut</th>
                                <th>
                                    <button id="add-row-to-bovin-table" type="button" class="btn green"><i class="fa fa-plus"></i></button>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <select name="bovin[]" class="form-control">
                                        @foreach($bovins as $key => $bovin)
                                            <option value="{{ $bovin->id }}">{{ $bovin->num }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <a data-toggle="modal" href="#basic" class="add-ordonnace btn btn-warning">Ajouter une ordannace</a>
                                </td>
                                <td>
                                    <select name="statut[]" class="form-control" id="statut">
                                        @foreach(getStatusBovin() as $key => $statut)
                                            <option value="{{ $statut }}">{{ $statut }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <textarea name="observation[]" cols="30" rows="3" class="form-control" placeholder="Prix d'achat"></textarea>
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
{{-- Begin Modals --}}
<div class="modal" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body"> Modal body goes here </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- End Modals --}}
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