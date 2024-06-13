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
        <div style="display: inline">
            <div style="text-align: left">
                <img src="{{ asset('logo.jpeg') }}" height="80" width="100" alt="">
            </div>
            <div style="text-align: right; margin-top: -80px">
                Téléphone: <br>
                <b>Belgique : </b> +32 765809596 <br>
                <b>France : </b> +33 697212165 / 023259763
            </div>
        </div>
        <br />
        <br />
        <h1 style="text-align: center">Feuille d'envoi colis : {{ $month }} / 2024</h1>
        <br />
        <p>
            <b>Noms et prénoms de l'expéditeur : </b> {{ $colis->user->first_name }} {{ $colis->user->last_name }} <br />
            <b>Pseudo de l'expéditeur : </b> {{ $colis->user->login }} <br />
            <b>Adresse de l'expéditeur : </b> {{ $colis->user->address }} <br />
            <b>Noms et prénoms de destinataire : </b> {{ $colis->receiver->first_name }} {{ $colis->receiver->last_name }} <br />
            <b>Adresse de destinataire : </b> {{ $colis->user->address }} <br />
            <b>CNI N° </b> {{ $colis->receiver->cni }}
        </p>
        <br />
        <br />
        <h1 style="text-align: center">Colis</h1>
        <br />
        <br />
        <div style="margin-left: 50px; text-align: start;">
            <b>Nom : </b>{{ $colis->nom }} <br />
            <b>Nature : </b> {{ $colis->nature ?? "Non défini" }} <br />
            <b>Poids : </b>{{ $colis->poids }} <br />
            <b>Quantité : </b> {{ $colis->quantite }} <br />
            <b>Date d'entrée : </b>{{ $colis->date_entree }} <br />
            <b>Date d'arrivée prévue : </b> {{ $colis->date_arrivee }}
        </div>

    </div>
    <br />
    <br />
    <div style="text-align: right;">
        <u>Le client</u>
    </div>
    <br />
    <br />
    <br />
    <br />
    <div style="background-color: #eee; border: solid 1px grey;">
        <h2 style="text-align: center">Consignes de livraison</h2>
        <ul>
            <li>Nous ne remettons pas les colis en attente de paiement</li>
            <li>Vos frais de douanes doivent être payés avant arrivée au conteneur</li>
            <li>Signaler l'expéditeur un fois le colis récupéré</li>
            <li>En cas de dommage, signaler dans les 02 heures qui suivent la récupération du colis.</li>
        </ul>
    </div>
    <br />
</body>
</html>
