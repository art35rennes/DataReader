@extends('layout')


@section('body')
    <table class="table table-bordered table-striped table-responsive datatable">
        <thead>
        <tr>
            <th>Ligne</th>
            <th>N°</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th class="fit">Edition</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pylons as $pylon)
            <tr>
                <td>{{$pylon->ligne}}</td>
                <td>{{$pylon->numero}}</td>
                <td>{{$pylon->longitude}}°</td>
                <td>{{$pylon->latitude}}°</td>
                <td class="fit">
                    <i class="far fa-edit mr-1"></i>
                    <i class="fas fa-ban"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
