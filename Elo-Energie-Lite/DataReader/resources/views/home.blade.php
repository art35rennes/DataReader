@extends('layouts.menu')

@section('content')
    <div class="container">
        <h1>Visualisation LD & LMA</h1>

        <div id="graphBase" class="graph"></div>

        <div class="card mb-4 col-lg-7 col-md-8 col-sm-12">
            <div class="card-header">
                Que faire ?
            </div>
            <div class="card-body">
                <p>Via le menu, onglet <kbd>CSV</kbd>, importer votre fichier et définissez le format de votre fichier.
                Les graphiques seront automatiquement généré une fois le fichier chargé.</p>
                <p>Vous pouvez personnaliser les paramètres de visualisation dans l'onglet <kbd>Paramètres</kbd> du menu. Les paramètres doivent être choisi avant l'importation du fichier.
                Pour les modifier une fois un graphique chargé, utiliser la fonction <kbd>Reset</kbd>.</p>
                <p>Vous pouvez réinitialiser la page pour visualiser un nouveau jeu de données ou modifier les paramètres de visualisation via le bouton <kbd>Reset</kbd> du menu.</p>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{URL::asset("js/general.js")}}"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-locale-fr-latest.js"></script>
@endsection
