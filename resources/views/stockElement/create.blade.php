@extends('layouts.master')

@section('title', 'Gestion de stock')

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
                <span>Gestion de stock</span>
            </li>
        </ul>
    </div>
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Gestion de stock
        <small class="pull-right">
            <a class="btn red btn-md" href="{{ route('achat.index') }}" target="_self">
                <i class="fa fa-plus"></i> &nbsp; Liste des elements en stock
            </a>
        </small>
    </h1>
    <!-- END PAGE TITLE-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Gestion de stock</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('stockelement.store') }}" class="form" method="POST">
                        @csrf
                        <table id="bovin-table" class="table table-striped table-bordered">
                            <tr>
                                <th>Designation</th>
                                <th>Type</th>
                                <th>Quantite</th>
                                <th>Prix unitaire</th>
                                <th>
                                    <button id="add-row-to-bovin-table" type="button" class="btn green"><i class="fa fa-plus"></i></button>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="designation[]" class="form-control" placeholder="Designation">
                                </td>
                                <td>
                                    <select name="type[]" class="form-control" id="type">
                                        @foreach(getElementStockType() as $key => $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="qte[]" class="form-control" placeholder="Quantite">
                                </td>
                                <td>
                                    <input type="text" name="prix[]" class="form-control" placeholder="Prix">
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button>
                                </td>
                            </tr>
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
                var row = '<tr> <td> <input type="text" name="designation[]" class="form-control" placeholder="Designation"> </td> <td> <select name="type[]" class="form-control" id="type"> @foreach(getElementStockType() as $key => $type) <option value="{{ $type }}">{{ $type }}</option> @endforeach </select> </td> <td> <input type="text" name="qte[]" class="form-control" placeholder="Quantite"> </td> <td> <input type="text" name="prix[]" class="form-control" placeholder="Prix"> </td> <td> <button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button> </td> </tr>';
                $('#bovin-table').append(row);
            });

            $('body').on("click", ".btn-remove-row", function(e) {
                $(this).parent().parent().remove();
            });
        })
    </script>
@endsection