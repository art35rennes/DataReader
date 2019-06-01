@extends('layout')


@section('body')
    <h4>Ajout de nouveau pylônes</h4>

    <form class="mt-3" method="post" action="/pylons/add">
        @csrf
        <div class="row">
            <div class="col-6">
                <h5>Pylône A</h5>
                <div class="form-group">
                    <label for="ligne_p_A">Nom de la ligne haute tension</label>
                    <input required type="text" class="form-control" id="ligne_p_A" name="ligne_p_A" aria-describedby="ligne_p_A_help" placeholder="Entrer le nom de ligne" list="dataLigne">
                    <small id="ligne_p_A_help" class="form-text text-muted">Saisissez le nom s'il n'apparait pas dans la liste.</small>
                </div>

                <div class="form-group col-5 pl-0">
                    <label for="ligne_p_A">Numéro de pylône</label>
                    <input required type="number" class="form-control" id="num_p_A" name="num_p_A">
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="ligne_p_A">Longitude</label>
                        <input required type="number" class="form-control" id="longitude_p_A" name="longitude_p_A" step="0.00000001">
                    </div>
                    <div class="form-group col-6">
                        <label for="ligne_p_A">Latitude</label>
                        <input required type="number" class="form-control" id="latitude_p_A" name="latitude_p_A" step="0.00000001">
                    </div>
                </div>
            </div>

            <div class="col-6">
                <h5>Pylône B</h5>
                <div class="form-group">
                    <label for="ligne_p_B">Nom de la ligne haute tension</label>
                    <input type="text" class="form-control" id="ligne_p_B" name="ligne_p_B" aria-describedby="ligne_p_B_help" placeholder="Entrer le nom de ligne" list="dataLigne">
                    <small id="ligne_p_B_help" class="form-text text-muted">Saisissez le nom s'il n'apparait pas dans la liste.</small>
                </div>

                <div class="form-group col-5 pl-0">
                    <label for="ligne_p_B">Numéro de pylône</label>
                    <input type="number" class="form-control" id="num_p_B" name="num_p_B">
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="ligne_p_B">Longitude</label>
                        <input type="number" class="form-control" id="longitude_p_B" name="longitude_p_B" step="0.00000001">
                    </div>
                    <div class="form-group col-6">
                        <label for="ligne_p_B">Latitude</label>
                        <input type="number" class="form-control" id="latitude_p_B" name="latitude_p_B" step="0.00000001">
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="ligneName">
            <label class="form-check-label" for="ligneName">Utiliser la même ligne pour les deux pylônes</label>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('success') }} pylône(s) ajouté avec succès !
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif

    <datalist id="dataLigne">
        @foreach($lignes as $ligne)
        <option>{{$ligne->ligne}}</option>
        @endforeach
    </datalist>

@endsection

@section('JS')
<script src="{{URL::asset('js/pylon.js')}}"></script>
@endsection
