@extends('layout')


@section('body')
    <table class="table table-bordered table-striped table-responsive datatable">
        <thead>
        <tr>
            <th>Ligne</th>
            <th>Pylônes référencé</th>
            <th class="fit">Edition</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lignes as $ligne)
            <tr>
                <td>{{$ligne->ligne}}</td>
                <td>{{$ligne->nb}}</td>
                <td class="fit">
                    <i class="far fa-edit mr-1"></i>
                    <i class="fas fa-ban"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection