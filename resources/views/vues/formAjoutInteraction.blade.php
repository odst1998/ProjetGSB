@extends('layouts.master')
@section('content')
    <br><br>
    <div class="col-md-12 well well-md">
        <h1>Ajout d'une interaction</h1>
        <div class="form-horizontal">
            {!! Form::open(array('route' => array('postAjoutInteraction'), 'methode' => 'post', 'files' => true)) !!}
            <div class="form-group">
                <label class="col-md-3 control-label" for="medicament1">Medicament 1 :</label>
                <div class="col-md-6  col-md-3">
                    <select class="form-control" name="medicament1" required>
                        <option value="" disabled selected>Selectionner un medicament</option>
                        @foreach ($mesMedicaments as $unM)
                            {
                            <option value="{{ $unM->id_medicament }}">{{ $unM->nom_commercial }}</option>
                            }
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="medicament2">Medicament 2 :</label>
                <div class="col-md-6  col-md-3">
                    <select class="form-control" name="medicament2" required>
                        <option value="" disabled selected>Selectionner un medicament</option>
                        @foreach ($mesMedicaments as $unM)
                            {
                            <option value="{{ $unM->id_medicament }}">{{ $unM->nom_commercial }}</option>
                            }
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="danger">Dangerosité :</label>
                <div class="col-md-6  col-md-3">
                    <select class="form-control" name="danger" required>
                        <option value="" disabled selected>Selectionner une dangerosité</option>
                        @foreach ($mesDangers as $unD)
                            {
                            <option value="{{ $unD->code_danger }}">{{ $unD->libelle_danger }}</option>
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
                            onclick="{ window.location = '{{ url('/') }}'; }"><span
                            class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">

            </div>
        </div>
    </div>

@stop
