@extends('layouts.master')

@section('title', 'Liste des Fournisseur')

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
                <span>liste des Fournisseurs</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Liste des Fournisseurs
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('fournisseur.create') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp;Nouvelle Fournisseur
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
                        <span class="caption-subject uppercase">Fournisseur</span>
                    </div>
                    <div class="tools">
                        <a href="" class="fullscreen" data-original-title="Agrandir" title="Agrandir"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fournisseurs as $fournisseur)
                                <tr>
                                    <td>{{ $fournisseur->nom }}</td>
                                    <td>{{ $fournisseur->tel }}</td>
                                    <td>{{ $fournisseur->email }}</td>
                                    <td>{{ $fournisseur->adresse }}</td>
                                    <td class="td-actions">
                                        <a href="{{ route('fournisseur.show', ['id' => $fournisseur->id]) }}" class="btn blue btn-sm uppercase">Details</a>    
                                        <a href="{{ route('fournisseur.edit', ['id' => $fournisseur->id]) }}" class="btn green-haze btn-sm uppercase"><i class="fa fa-edit"></i></a>
                                        <form style="display: inline-block;" action="{{ route('fournisseur.destroy', ['id' => 
                                            $fournisseur->id]) }}" method="post" accept-charset="utf-8">
                                            @csrf
                                            @Method('DELETE')
                                            <button  class="btn red-haze btn-sm uppercase">
                                                <i class="fa fa-trash-o"></i></button>
                                        </form>
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

@section('custom-javascripts')
    <script>
        $(document).ready(function () {
            // init 
            $('.dataTable').dataTable({
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ records",
                    "infoEmpty": "No records found",
                    "infoFiltered": "(filtered1 from _MAX_ total records)",
                    "lengthMenu": "Show _MENU_",
                    "search": "Search:",
                    "zeroRecords": "No matching records found"
                },
                "pageLength": 5,            
                "pagingType": "bootstrap_full_number",
                "columnDefs": [{  // set default column settings
                    'orderable': true,
                    'targets': [0]
                }, {
                    "searchable": true,
                    "targets": [0]
                }, { 
                    "className": "dt-right", 
                }],
                "paging": true,
                "order": [
                    [1, "asc"]
                ]
            });
        })
    </script>
@endsection