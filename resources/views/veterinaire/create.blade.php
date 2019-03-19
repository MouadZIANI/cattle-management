@extends('layouts.master')

@section('title', 'Nouvelle Veterinaire')

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
                <span>Nouvelle veterinaire</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Nouvelle veterinaire
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('veterinaire.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des veterinaire
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
                        <span class="caption-subject bold uppercase font-dark">Ajouter nouveau Veterinaire</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('veterinaire.store') }}" class="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    <label for="matricule">Nome</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome') }}">
                                    @if ($errors->has('nome'))
                                        <span class="help-block">{{ $errors->first('nome') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" placeholder="Telephone" value="{{ old('telephone') }}">
                                    @if ($errors->has('telephone'))
                                        <span class="help-block">{{ $errors->first('telephone') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
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