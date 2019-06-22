@extends('layout')


@section('body')
    <h4 class="mb-3 mt-1 font-weight-light">Liste des pylônes</h4>

    <table class="table table-bordered table-striped table-responsive datatable">
        <thead>
        <tr>
            <th class="fit">Ligne</th>
            <th>N°</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <!--th class="fit">Edition</th-->
        </tr>
        </thead>
        <tbody>
        @foreach($pylons as $pylon)
            <tr>
                <td class="fit">{{$pylon->ligne}}</td>
                <td>{{$pylon->numero}}</td>
                <td>{{$pylon->longitude}}°</td>
                <td>{{$pylon->latitude}}°</td>
                <!--td class="fit text-center">
                    <i class="fas fa-edit mr-1"></i>
                    <i class="fas fa-ban"></i>
                </td-->
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
