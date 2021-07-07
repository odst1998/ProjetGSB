@extends('layouts.master')
@section('content')
    <br><br>
    <div class="col-md-12 well well-md">
        <h1>Modifcation d'une Interaction</h1>
        <div class="form-horizontal">
            {!! Form::open(array('route' => array('postModifInteraction'), 'methode' => 'post', 'files' => true)) !!}
            <div class="form-group">
                <label class="col-md-3 control-label" for="nom_medicament1">Medicament 1 :</label>
                <div class="col-md-6  col-md-3">
                    <input type="text" name="nom_medicament1" class="form-control" readonly
                           value="{{$medicament1->nom_commercial}}">
                    <input type="hidden" name="id_medicament1" class="form-control"
                           value="{{$monInteraction->id_medicament}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="nom_medicament2"> Medicament 2 : </label>
                <div class="col-md-6  col-md-3">
                    <input type="text" name="nom_medicament2" class="form-control" readonly
                           value="{{$medicament2->nom_commercial}}">
                    <input type="hidden" name="id_medicament2" class="form-control"
                           value="{{$monInteraction->med_id_medicament}}">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="danger">Dangerosité :</label>
                <div class="col-md-6  col-md-3">
                    <select class="form-control" name="danger" required>
                        <option value="" disabled selected>Selectionner une dangerosité</option>
                        @foreach ($mesDangers as $unD)
                            {
                            <option value="{{ $unD->code_danger }}"
                                @if($unD->code_danger == $monInteraction->dangerosite)
                                    selected
                                @endif
                            >{{ $unD->libelle_danger }}</option>
                            }
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-primary"><span
                            class="glyphicon glyphicon-log-in"></span> Valider
                    </button>
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="{ window.location = '{{ url('/listeInteractions') }}'; }"><span
                            class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">

            </div>
        </div>
    </div>

@stop

