@extends('layouts.menu')

@section('content')
    <div>
        <h1>Visualisation LD & LMA par RECA</h1>
        <small id="fileName"></small>

        <div id="graphBase" class="graph rounded border-light"></div>
    </div>
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="card mb-4 col-7 mt-3">--}}
{{--                <div class="card-header">--}}
{{--                    Que faire ?--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <p>Via le menu, onglet <kbd>CSV</kbd>, importez votre fichier et définissez le format de celui-ci.--}}
{{--                        Les graphiques seront automatiquement générés une fois le fichier chargé.</p>--}}
{{--                    <p>Vous pouvez personnaliser les paramètres de visualisation dans l'onglet <kbd>Paramètres</kbd> du menu. Les paramètres doivent être choisis avant l'importation du fichier.--}}
{{--                        Pour les modifier une fois un graphique chargé, utiliser la fonction <kbd>Reset</kbd>.</p>--}}
{{--                    <p>Vous pouvez réinitialiser la page pour visualiser un nouveau jeu de données ou modifier les paramètres de visualisation via le bouton <kbd>Reset</kbd> du menu.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card mb-4 col-4 offset-1 mt-3">--}}
{{--                <div class="card-header">--}}
{{--                    Work in progress--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <p>Il n'est pas encore possible d'exporter les graphiques <kbd>LD</kbd> et <kbd>LMA</kbd> séparement.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section('js')
    <script src="{{URL::asset("js/general.js")}}"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-locale-fr-latest.js"></script>
@endsection
