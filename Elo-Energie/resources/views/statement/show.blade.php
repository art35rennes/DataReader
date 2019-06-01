@extends('layout')


@section('body')
    <table class="table table-bordered table-striped table-responsive datatable">
        <thead>
        <tr>
            <th>Date</th>
            <th>Nom du relevé</th>
            <th>Pylône de départ</th>
            <th>Pylône d'arrivé</th>
            <th class="fit">Edition</th>
        </tr>
        </thead>
        <tbody>
        @foreach($statements as $statement)
            <tr>
                <td>{{$statement->date}}</td>
                <td>{{$statement->nom}}</td>
                <td>{{$statement->pylon_A}}</td>
                <td>{{$statement->pylon_B}}</td>
                <td class="fit">
                    <i class="far fa-edit mr-1"></i>
                    <i class="fas fa-ban"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

