@extends('layout')


@section('body')
    <h4>Ajout d'un relevé</h4>

    <form method="post" action="/statements/add">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nom">Nom du relevé</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
                </div>
                @if($errors->has('nom'))
                    <span class="font-weight-light text-danger font-italic">{{$errors->first('nom')}}</span>
                @endif

                <div class="form-group col-6 pl-0">
                    <label for="date">Date du relevé</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}">
                </div>
                @if($errors->has('date'))
                    <span class="font-weight-light text-danger font-italic">{{$errors->first('date')}}</span>
                @endif


                <div class="form-group">
                    <label for="data">Relevé de données</label>
                    <input type="file" class="form-control-file" id="data" name="data">
                </div>

                <button type="submit" class="btn btn-primary mt-3 mb-3">Ajouter</button>

                @if(isset($success) && $success > 0)
                    <div class="alert alert-success">
                        {{ $success }} relevé ajouté avec succès !
                    </div>
                @endif
                @if(isset($msg) && $msg != "")
                    <div class="alert alert-info col-6 m-3">
                        {{ $msg }}
                    </div>
                @endif
            </div>
            <div class="col-6">
                <!--PYLONE DEPART -->
                <div class="form-group">
                    <label for="pylonA" class="h6">Pylône de départ</label>
                    <input type="text" class="form-control" id="pylonA" name="pylonA" value="{{old('pylonA')}}" placeholder="Choisissez le pylone" list="dataPylon" pattern="^[\w\d\s°]+( - n°)\d+$">
                </div>
                <div class="form-group ml-3 pl-3">
                    <input class="form-check-input" type="checkbox" id="newPylonA" name="newPylonA">
                    <label class="form-text font-italic" for="newPylonA">Le pylône de départ n'est pas dans la liste</label>
                </div>
                @if($errors->has('pylonA'))
                    <span class="font-weight-light text-danger font-italic">{{$errors->first('pylonA')}}</span>
                @endif

                <div id="formNewPylonA" class="pl-3 ml-3">
                    <label class="h6">Pylône de départ</label>
                    <div class="form-group">
                        <label for="ligneA">Nom de la ligne haute tension</label>
                        <input type="text" class="form-control" id="ligneA" name="ligneA" value="{{old('ligneA')}}" placeholder="Entrer le nom de ligne" list="dataLigne">
                        <small id="ligne_helpA" class="form-text text-muted">Saisissez le nom s'il n'apparait pas dans la liste.</small>
                    </div>
                    @if($errors->has('ligneA'))
                        <span class="font-weight-light text-danger font-italic">{{$errors->first('ligneA')}}</span>
                    @endif

                    <div class="form-group col-5 pl-0">
                        <label for="numeroA">Numéro de pylône</label>
                        <input type="number" class="form-control" id="numeroA" name="numeroA" value="{{old('numeroA')}}" min="0">
                    </div>
                    @if($errors->has('numeroA'))
                        <span class="font-weight-light text-danger font-italic">{{$errors->first('numeroA')}}</span>
                    @endif

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="longitudeA">Longitude</label>
                            <input type="number" class="form-control" id="longitudeA" name="longitudeA" step="0.00000001" value="{{old('longitudeA')}}">
                            @if($errors->has('longitudeA'))
                                <span class="font-weight-light text-danger font-italic">{{$errors->first('longitudeA')}}</span>
                            @endif
                        </div>

                        <div class="form-group col-6">
                            <label for="latitudeA">Latitude</label>
                            <input type="number" class="form-control" id="latitudeA" name="latitudeA" step="0.00000001" value="{{old('latitudeA')}}">
                            @if($errors->has('latitudeA'))
                                <span class="font-weight-light text-danger font-italic">{{$errors->first('latitudeA')}}</span>
                            @endif
                        </div>

                    </div>
                </div>

                <!--PYLONE ARRIVEE-->
                <div class="form-group">
                    <label for="pylonB" class="h6">Pylône d'arrivé</label>
                    <input type="text" class="form-control" id="pylonB" name="pylonB" value="{{old('pylonB')}}" placeholder="Choisissez le pylone" list="dataPylon" pattern="^[\w\d\s°]+( - n°)\d+$">
                </div>
                <div class="form-group ml-3 pl-3">
                    <input class="form-check-input" type="checkbox" id="newPylonB" name="newPylonB">
                    <label class="form-text font-italic" for="newPylonB">Le pylône d'arrivé n'est pas dans la liste</label>
                </div>
                @if($errors->has('pylonB'))
                    <span class="font-weight-light text-danger font-italic">{{$errors->first('pylonB')}}</span>
                @endif

                <div id="formNewPylonB" class="pl-3 ml-3">
                    <label class="h6">Pylône d'arrivée</label>
                    <div class="form-group">
                        <label for="ligneB">Nom de la ligne haute tension</label>
                        <input type="text" class="form-control" id="ligneB" name="ligneB" value="{{old('ligneB')}}" placeholder="Entrer le nom de ligne" list="dataLigne">
                        <small id="ligne_helpB" class="form-text text-muted">Saisissez le nom s'il n'apparait pas dans la liste.</small>
                    </div>
                    @if($errors->has('ligneB'))
                        <span class="font-weight-light text-danger font-italic">{{$errors->first('ligneB')}}</span>
                    @endif

                    <div class="form-group col-5 pl-0">
                        <label for="numeroB">Numéro de pylône</label>
                        <input type="number" class="form-control" id="numeroB" name="numeroB" value="{{old('numeroB')}}" min="0">
                    </div>
                    @if($errors->has('numeroB'))
                        <span class="font-weight-light text-danger font-italic">{{$errors->first('numeroB')}}</span>
                    @endif

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="longitudeB">Longitude</label>
                            <input type="number" class="form-control" id="longitudeB" name="longitudeB" step="0.00000001" value="{{old('longitudeB')}}">
                            @if($errors->has('longitudeB'))
                                <span class="font-weight-light text-danger font-italic">{{$errors->first('longitudeB')}}</span>
                            @endif
                        </div>

                        <div class="form-group col-6">
                            <label for="latitudeB">Latitude</label>
                            <input type="number" class="form-control" id="latitudeB" name="latitudeB" step="0.00000001" value="{{old('latitudeB')}}">
                            @if($errors->has('latitudeB'))
                                <span class="font-weight-light text-danger font-italic">{{$errors->first('latitudeB')}}</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <datalist id="dataPylon">
        @foreach($pylones as $pylone)
        <option>{{$pylone->ligne}} - n°{{$pylone->numero}}</option>
        @endforeach
    </datalist>

    <datalist id="dataLigne">
        @foreach($lignes as $ligne)
            <option>{{$ligne->ligne}}</option>
        @endforeach
    </datalist>

@endsection

@section('JS')
    <script src="{{URL::asset('js/statement.js')}}"></script>
@endsection
