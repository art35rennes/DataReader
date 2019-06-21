@extends('layout')


@section('body')
    <h4 class="mb-3 mt-1 font-weight-light">Liste des portées</h4>

    <table class="table table-bordered table-striped table-responsive datatable">
        <thead>
        <tr>
            <th class="data-fit">Date</th>
            <th>Portée</th>
            <th class="data-fit">Nombre de données</th>
            <th class="data-fit">Pylône</th>
            <th class="data-fit">Ligne</th>
            <th class="fit">Consulter</th>
            <th class="fit">Edition</th>
        </tr>
        </thead>
        <tbody>
        @foreach($statements as $statement)
            <tr>
                <td class="data-fit">{{$statement->date}}</td>
                <td>{{$statement->nom}}</td>
                <td class="data-fit">{{$statement->donnees}}</td>
                <td class="data-fit">{{$statement->pylon_A}} => {{$statement->pylon_B}}</td>
                <td class="data-fit">{{$statement->ligne_A}} => {{$statement->ligne_B}}</td>
                <td class="fit text-center">
                    <i class="fas fa-chart-area" onclick="window.open('/statements/data/{{$statement->id}}', '_parent')"></i>
                </td>
                <td class="fit text-center">
                    <i class="fas fa-edit mr-1"></i>
                    <i class="fas fa-ban"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

