<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>facture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-red-100">
    <div class="card">
        <div class="card-body">
          <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
              <div class="col-xl-9">
                <p style="color: #7e8d9f;font-size: 20px;">Facture : <strong>01540</strong></p>
              </div>
              <div class="col-xl-3 float-end">
                <a data-mdb-ripple-init class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                    class="fas fa-print text-primary"></i> imprimer</a>
                <a data-mdb-ripple-init class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                    class="far fa-file-pdf text-danger"></i> Exporter</a>
              </div>
              <hr>
            </div>
      
            <div class="container">
              <div class="col-md-12">
                <div class="text-center">
                  <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                  <h2>Feuille d'Envoi de colis</h2>
                </div>
      
              </div>
      
      
              <div class="row">
                <div class="col-xl-4">
                    <p class="text-muted"> <span style="color:#5d9fc5; font-weight: bold;">Expéditeur</span></p>
                  <ul class="list-unstyled">
                    <li class="text-muted">De: <span style="color:#5d9fc5 ;"> {{ $colis->user->first_name }} {{ $colis->user->last_name }} </span></li>
                    <li class="text-muted">Rue, ville: {{ $colis->user->address }}</li>
                    <li class="text-muted">Etat, Pays: {{ $colis->user->country }} </li>
                    <li class="text-muted">Téléphone:<i class="fas fa-phone"></i> {{ $colis->user->phone }}</li>
                  </ul>
                </div>
                <div class="col-xl-4">
                    <p class="text-muted"><span style="color:#5d9fc5; font-weight: bold;">Destinataire</span></p>
                    <ul class="list-unstyled">
                      <li class="text-muted">A: <span style="color:#5d9fc5 ;">{{ $colis->receiver->first_name }} {{ $colis->receiver->last_name }}</span></li>
                      <li class="text-muted">Rue, ville: {{ $colis->receiver->address }}</li>
                      <li class="text-muted">Etat, Pays: {{ $colis->receiver->country }}</li>
                      <li class="text-muted">Téléphone:<i class="fas fa-phone"></i> {{ $colis->receiver->phone }}</li>
                    </ul>
                  </div>
                <div class="col-xl-4">
                  <p class="text-muted"><span style="color:#d3281c; font-weight: bold;">Facture</span></p>
                  <ul class="list-unstyled">
                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        class="fw-bold">Code:</span>{{ $colis->id }}</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        class="fw-bold">Date: </span>{{ $formattedDate }}</li>
                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                        class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                            {{ $colis->statut }}</span></li>
                  </ul>
                </div>
              </div>
      
              <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                  <thead style="background-color:#84B0CA ;" class="text-white">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Description</th>
                      <th scope="col">Qté</th>
                      <th scope="col">Prix</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{ $colis->id }}</th>
                      <td>{{ $colis->nom }}</td>
                      <td>{{ $colis->contenance }}</td>
                      <td>{{ $colis->quantite }}</td>
                      <td>{{ $colis->valeur_euro }}€</td></td>
                    </tr>
                  </tbody>
      
                </table>
              </div>
              <div class="row">
                <div class="col-xl-8">
                  <p class="ms-3">Informations supplémentaires et de paiement</p>
      
                </div>
                <div class="col-xl-3">
                  <ul class="list-unstyled">
                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>{{ $colis->valeur_euro }}€</li>
                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>25€</li>
                  </ul>
                  <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                      style="font-size: 25px;">{{ $colis->valeur_euro }}€</span></p>
                </div>
              </div>
              <hr>
              <div class="row"> 
                <div class="col-xl-10">
                  <p>Merci pour votre confiance !</p>
                </div>
                <div class="col-xl-2">
                  {{-- <button href="{{ route('colis.index') }}  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary text-capitalize"
                    style="background-color:#eb3312 ;">Retour</button> --}}
                    <a href="{{ route('colis.index') }}" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger text-capitalize" style="color:white">Retour</a>
                    {{-- onclick="window.location.href='javascript:history.back()'" --}}
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </div>


    
   
  </body>
  <footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </footer>
</html>