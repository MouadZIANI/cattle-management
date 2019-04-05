@extends('layouts.master')

@section('title', 'Ajouter bovin au pert')

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
                <span>Ajouter nourriture</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> 
        Nouvelle nourriture
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Nouvelle nourriture</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('nourriture.store') }}" class="form" method="POST">
                        @csrf
                        <table id="bovin-table" class="table table-striped table-bordered">
                            <tr>
                                <th>Num Bovin</th>
                                <th>Element</th>
                                <th>Qte</th>
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
                                    <select name="element[]" class="form-control">
                                        @foreach($elements as $key => $element)
                                            <option value="{{ $element->id }}">{{ $element->designation }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="qte[]" class="form-control" placeholder="Quantité"/>
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
                var row = '<tr> <td> <select name="bovin[]" class="form-control"> @foreach($bovins as $key => $bovin) <option value="{{ $bovin->id }}">{{ $bovin->num }}</option> @endforeach </select> </td> <td> <select name="element[]" class="form-control"> @foreach($elements as $key => $element) <option value="{{ $element->id }}">{{ $element->designation }}</option> @endforeach </select> </td> <td> <input type="text" name="qte[]" class="form-control" placeholder="Quantité"/> </td> <td> <button class="btn btn-danger btn-remove-row" type="button"><i class="fa fa-close"></i></button> </td> </tr>';
                $('#bovin-table').append(row);
            });

            $('body').on("click", ".btn-remove-row", function(e) {
                $(this).parent().parent().remove();
            });
        })
    </script>
@endsection