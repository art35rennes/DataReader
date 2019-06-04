@extends('layout')


@section('body')
    <h4 class="mb-3 mt-1 font-weight-light">Ajout de nouveau pylônes</h4>

    <form method="post" action="/pylons/add">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="ligne">Nom de la ligne haute tension</label>
                    <input type="text" class="form-control" id="ligne" name="ligne" value="{{old('ligne')}}" placeholder="Entrer le nom de ligne" list="dataLigne">
                    <small id="ligne_help" class="form-text text-muted">Saisissez le nom s'il n'apparait pas dans la liste.</small>
                </div>
                @if($errors->has('ligne'))
                <span class="font-weight-light text-danger font-italic">{{$errors->first('ligne')}}</span>
                @endif

                <div class="form-group col-5 pl-0">
                    <label for="ligne">Numéro de pylône</label>
                    <input type="number" class="form-control" id="numero" name="numero" value="{{old('numero')}}" min="0">
                </div>
                @if($errors->has('numero'))
                    <span class="font-weight-light text-danger font-italic">{{$errors->first('numero')}}</span>
                @endif

                <div class="row">
                    <div class="form-group col-6">
                        <label for="longitude">Longitude</label>
                        <input type="number" class="form-control" id="longitude" name="longitude" step="0.00000001" value="{{old('longitude')}}">
                        @if($errors->has('longitude'))
                            <span class="font-weight-light text-danger font-italic">{{$errors->first('longitude')}}</span>
                        @endif
                    </div>

                    <div class="form-group col-6">
                        <label for="latitude">Latitude</label>
                        <input type="number" class="form-control" id="latitude" name="latitude" step="0.00000001" value="{{old('latitude')}}">
                        @if($errors->has('latitude'))
                            <span class="font-weight-light text-danger font-italic">{{$errors->first('latitude')}}</span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="existingP">

            </div>
        </div>

        <!--div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="ligneName">
            <label class="form-check-label" for="ligneName">Utiliser la même ligne pour les deux pylônes</label>
        </div-->
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    @if(isset($success) && $success > 0)
        <div class="alert alert-success">
            {{ $success }} pylône(s) ajouté avec succès !
        </div>
    @endif

    @if(isset($msg) && $msg != "")
        <div class="alert alert-info col-6 m-3">
            {{ $msg }}
        </div>
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
