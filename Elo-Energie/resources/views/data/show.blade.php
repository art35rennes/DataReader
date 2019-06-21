@extends('layout')

@section('body')
    <div class="col-12">
        <h4 class="mb-3 mt-1 font-weight-light d-inline">Visualisation de données</h4>
        <button type="button" class="btn btn-outline-dark m-1 btn-sm" data-toggle="modal" data-target="#faq">
            Comment ça marche
        </button>
        <input type="hidden" id="id" value="{{$id}}">
    </div>

    <div class="col-3" id="ld">
        <h4 class="d-inline">Local Default </h4><button class="btn btn-sm btn-outline-primary exportGraph">Exporter le graphique<i class="fas fa-file-export fa-sm m-1"></i></button>
        <h6 class="mt-1">Echelle verticale</h6>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="400">400</button>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="200">200</button>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="100">100</button>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="50">50</button>
        <h6>Zoom vertical</h6>
        <input type="range" class="custom-range zY" min="-100" max="100" value="0" step="0.01">
        <hr>
        <h6 class="mt-1">Statistique</h6>
        <ul>
            <li>Maximum: <span class="font-italic" id="ldGraph_max"></span></li>
            <li>Minimum: <span class="font-italic" id="ldGraph_min"></span></li>
            <li>Moyenne absolue: <span class="font-italic" id="ldGraph_avg_abs"></span></li>
        </ul>
        <hr>
        <h6>Controle horizontal</h6>
        <input type="range" class="custom-range X" min="-300" max="300" value="0" step="0.01">
        <h6>Controle vertical</h6>
        <input type="range" class="custom-range Y" min="-300" max="300" value="0" step="0.01">
        <hr>
    </div>
    <div class="col-9">
            <div class="progress m-3">
                <div class="progress-bar progress-bar-striped progress-bar-animated align-middle"  style="width: 100%">Chargement</div>
            </div>
            <div id="ldGraph" class="graph"><!-- Plotly chart will be drawn inside this DIV --></div>
        </div>

    <div class="col-3" id="lma">
        <h4 class="d-inline">LMA </h4><button class="btn btn-sm btn-outline-primary exportGraph">Exporter le graphique<i class="fas fa-file-export fa-sm m-1"></i></button>
        <h6>Echelle verticale</h6>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="4">4</button>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="2">2</button>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="1">1</button>
        <button class="btn btn-primary m-1 y-axis btn-sm" value="0.5">0.5</button>
        <h6>Zoom vertical</h6>
        <input type="range" class="custom-range zY" min="-10" max="10" value="0" step="0.01">
        <hr>
        <h6 class="mt-1">Statistique</h6>
        <ul>
            <li>Maximum: <span class="font-italic" id="lmaGraph_max"></span></li>
            <li>Minimum: <span class="font-italic" id="lmaGraph_min"></span></li>
            <li>Moyenne absolue: <span class="font-italic" id="lmaGraph_avg_abs"></span></li>
        </ul>
        <hr>
        <h6>Controle horizontal</h6>
        <input type="range" class="custom-range X" min="-100" max="100" value="0" step="0.01">
        <h6>Controle vertical</h6>
        <input type="range" class="custom-range Y" min="-10" max="10" value="0" step="0.01">
    </div>
    <div class="col-9">
        <div class="progress m-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated align-middle"  style="width: 100%">Chargement</div>
        </div>
        <div id="lmaGraph" class="graph"><!-- Plotly chart will be drawn inside this DIV --></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faqTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="faqTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('JS')
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-locale-fr-latest.js"></script>
    <script src="{{URL::asset('js/data.js')}}"></script>
@endsection