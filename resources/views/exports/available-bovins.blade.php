<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Liste des bovins</title>
        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table {
              border-collapse: collapse;
            }
            th {
              background: #efefef;
            }
            h2 {
                font-size: 20px;
            }
            th, td {
              border: 1px solid #ccc;
              padding: 8px;
            }

            tr:nth-child(even) {
              background: #efefef;
            }

            tr:hover {
              background: #d1d1d1;
            }
            table{
                font-size: .8em;
            }
            tfoot tr td{
                font-size: .8em;
            }
        </style>
    </head>
    <body>
        <table style="width: 100%">
            <tr>
                <td style="border-width: 0px !important;">
                    <h2>Liste des bovins @isset ($from) ont le poids entre {{ $from }} & {{ $to }}KG @endisset</h2>
                </td>
                <td style="text-align: right; border-width: 0px !important;">
                    <h2>{{ dateToFrFormat($date) }}</h2>
                </td>
            </tr>
        </table>
        <br/>
        <table width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sexe</th>
                    <th>Origine</th>
                    <th>Poids</th>
                    <th>Age</th>
                    <th>Prix d'achat</th>
                    <th>Total depances</th>
                    <th>Prix de vente conseillé</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bovins as $bovin)
                    <tr>
                        <td>{{ $bovin->num }}</td>
                        <td>{{ $bovin->sexe }}</td>
                        <td>{{ $bovin->origine }}</td>
                        <td>{{ $bovin->poidsActuel }}</td>
                        <td>{{ $bovin->ageActuel }} Mois</td>
                        <td>{{ numberToPriceFormat($bovin->prix) }}</td>
                        <td>{{ numberToPriceFormat($bovin->totalDepances) }}</td>
                        <td>{{ addPourcentage($bovin->totalDepances, $pourcentage) }}</td>
                    </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right">Subtotal $</td>
                <td align="right">1635.00</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Tax $</td>
                <td align="right">294.3</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Total $</td>
                <td align="right" class="gray">$ 1929.3</td>
            </tr>
            </tfoot> --}}
        </table>
    </body>
</html>