@extends('layouts.master')

@section('title', 'Liste des achats')

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
                <span>liste des achats</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Liste des achats
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('achat.create') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp;Nouvelle achat
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
                        <span class="caption-subject uppercase">Achats</span>
                    </div>
                    <div class="tools">
                        <a href="" class="fullscreen" data-original-title="Agrandir" title="Agrandir"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Fournisseur</th>
                                <th>Date</th>
                                <th>Nb Bovins</th>
                                <th>Montant total transport</th>
                                <th>Montant total</th>
                                <th>observation</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($achats as $achat)
                                <tr>
                                    <td>{{ $achat->fournisseur->nom }}</td>
                                    <td>{{ dateToFrFormat($achat->date_achat) }}</td>
                                    <td>{{ count($achat->bovins) }}</td>
                                    <td>{{ numberToPriceFormat($achat->montantTotalTransportAchat) }}</td>
                                    <td>{{ numberToPriceFormat($achat->montantTotalAchat) }}</td>
                                    <td>{{ $achat->observation }}</td>
                                    <td class="td-actions">
                                        <a href="{{ route('achat.edit', ['id' => $achat->id]) }}" class="btn green-haze btn-sm uppercase"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('achat.edit', ['id' => $achat->id]) }}" class="btn red-haze btn-sm uppercase"><i class="fa fa-trash-o"></i></a>
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