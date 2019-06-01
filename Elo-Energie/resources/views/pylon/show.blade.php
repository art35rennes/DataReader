@extends('layout')


@section('body')
    <table class="table">
        <thead>
        <tr>
            <th>Ligne</th>
            <th>N°</th>
            <th>Longitude</th>
            <th>Latitude</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pylons as $pylon)
            <tr>
                <td>{{$pylon->ligne}}</td>
                <td>{{$pylon->numero}}</td>
                <td>{{$pylon->longitude}}°</td>
                <td>{{$pylon->latitude}}°</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
