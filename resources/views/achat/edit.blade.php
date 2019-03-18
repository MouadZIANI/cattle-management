@extends('layouts.master')

@section('title', 'Editer la demande administrative')

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
                <span>Editer la demande administrative</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Editer la demande administrative
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('demandes-administratives.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des demandes
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
                        <span class="caption-subject bold uppercase font-dark">Editer la demande administrative</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('demandes-administratives.update', ['id' => $demandeAdministrative->id]) }}" class="form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group{{ $errors->has('nature') ? ' has-error' : '' }}">
                            <label for="nature">Nature</label>
                            <select name="nature" class="form-control" id="nature">
                                @foreach(getDemandesAdministrativeTypes() as $key => $nature)
                                    <option {!! ($demandeAdministrative->nature == $key) ? 'selected' : '' !!} value="{{ $nature }}">{{ $nature }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('nature'))
                                <span class="help-block">{{ $errors->first('nature') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('date_souhaite') ? ' has-error' : '' }}">
                            <label for="date_souhaite">Date souhaitée</label>
                            <input type="date" name="date_souhaite" class="form-control" placeholder="Date souhaitée" value="{{ $demandeAdministrative->date_souhaite }}">
                            @if ($errors->has('date_souhaite'))
                                <span class="help-block">{{ $errors->first('date_souhaite') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('commentaire') ? ' has-error' : '' }}">
                            <label for="commentaire">Commentaire</label>
                            <textarea name="commentaire" class="form-control" id="commentaire" cols="30" rows="10" placeholder="commentaire">{{ $demandeAdministrative->commentaire }}</textarea>
                            @if ($errors->has('commentaire'))
                                <span class="help-block">{{ $errors->first('commentaire') }}</span>
                            @endif
                        </div>
                        <div class="form-actions right">
                            <button type="button" class="btn default">Annuler</button>
                            <button type="submit" class="btn green"><i class="fa fa-check"></i> Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection