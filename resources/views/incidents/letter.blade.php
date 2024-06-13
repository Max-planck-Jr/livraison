<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lettre</title>
</head>
<body style="margin-left: 5%; margin-right: 5%;">
    <div style="width: 100%;">
        <br />
        <div style="text-align: center">
            <img src="{{ asset('logo.jpeg') }}" alt="">
        </div>
        <br />
        <br />
        <h1 style="text-align: center">Logistics</h1>

        <br />
        <br />
        <br />
        <br />

        <br />
        <h3 style="text-align: center">Dédommagement</h3>
        <p style="text-align: justify">
            L'entreprise Logistics s'engage en raison du dommage causé à monsieur {{ $incident->coli->user->first_name }} {{ $incident->coli->user->last_name }} pour le coli:
            <br />
            <div style="margin-left: 50px; text-align: start;">
                <b>Nom : </b>{{ $incident->coli->nom }} <br />
                <b>Nature : </b> {{ $incident->coli->nature ?? "Non défini" }} <br />
                <b>Poids : </b>{{ $incident->coli->poids }} <br />
                <b>Date d'entrée : </b>{{ $incident->coli->date_entree }} <br />
                <b>Date d'arrivée prévue : </b> {{ $incident->coli->date_arrivee }}
            </div>
            <br />
            <br />
            <span style="margin-left: 0; text-align: start">
                A payer une somme de ................................., soit la valeur du colis endommagé, en date du {{ Carbon\Carbon::today() }} dans les délais d'un mois à compter de la présente date.
            </span>
        </p>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <table style="width: 100%; text-align: center">
        <tr>
            <td>Le responsable</td>
            <td>&nbsp;</td>
            <td>Le client</td>
        </tr>
    </table>
</body>
</html>
