<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Elo-Energie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/7e6e3df767.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/general.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('CSS')
</head>

<body class="bg-light">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Elo-Energie</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-project-diagram fa-sm mr-1"></i>Lignes et Pylônes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/lignes">Liste des lignes</a>
                        <a class="dropdown-item" href="/pylons">Liste des pylônes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/pylons/add">Ajouter un ou plusieurs pylônes</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/statements"><i class="fas fa-file-alt fa-sm mr-1"></i>Etude de section</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin"><i class="fas fa-search fa-sm mr-1"></i>Monitoring</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
    <!-- Page Layout here -->

<main role='main' class="p-3">
    <div class="container-fluid w-75 mt-3 bg-white">
        @yield('body')
    </div>
</main>


    <!--div class="container">
        <p class="float-right">
            <a href="#">Retour haut de page</a>
        </p>
        <p>
            Solution © CAPISEN pour Elo-Energie /
            <span class="text-muted font-italic">Interface d'affichage des données récupéré sur une section de ligne haute tension.</span>
        </p>

    </div-->



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/general.js') }}"></script>

@yield('JS')
</body>
</html>


