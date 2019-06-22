@extends('layout')


@section('body')
    <h4 class="mb-3 mt-1 font-weight-light">Liste des lignes électrique</h4>

    <table class="table table-bordered table-striped table-responsive datatable">
        <thead>
        <tr>
            <th class="fit">Ligne</th>
            <th>Pylônes référencé</th>
            <!--th class="fit">Edition</th-->
        </tr>
        </thead>
        <tbody>
        @foreach($lignes as $ligne)
            <tr>
                <td class="fit">{{$ligne->ligne}}</td>
                <td>{{$ligne->nb}}</td>
                <!--td class="fit text-center">
                    <i class="fas fa-edit mr-1"></i>
                    <i class="fas fa-ban"></i>
                </td-->
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection