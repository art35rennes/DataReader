@extends('layout')


@section('body')
    <table class="table">
        <thead>
        <tr>
            <th>Ligne</th>
            <th>Pylônes référencé</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lignes as $ligne)
            <tr>
                <td>{{$ligne->ligne}}</td>
                <td>{{$ligne->nb}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection