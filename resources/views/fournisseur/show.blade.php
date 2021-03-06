@extends('layouts.master')

@section('title', 'Information Fournisseur : ' . $fournisseur->id)

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
                <span>Fournisseur N° {{ $fournisseur->id }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Fournisseur N° {{ $fournisseur->id }}
        <small class="pull-right">
            <a class="btn green btn-md" href="{{ route('fournisseur.edit', ['id' => $fournisseur->id]) }}" target="_self">
                <i class="fa fa-edit"></i> &nbsp; Editer
            </a>
            <a class="btn red btn-md" href="{{ route('fournisseur.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des Fournisseur
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
                        <span class="caption-subject bold uppercase font-dark">Informations de Fournisseur</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-bold">Nome de Fournisseur</td>
                            <td><span class="text-primary">{{ $fournisseur->nom }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Telephone de fournisseur</td>
                            <td><span class="text-primary">{{ $fournisseur->tel }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Email </td>
                            <td><span class="text-primary">{{ $fournisseur->email }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Adresse </td>
                            <td><span class="text-primary">{{ $fournisseur->adresse }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection