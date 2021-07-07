@extends('layouts.master')
@section('content')
    <br><br>
    <h1>Liste Médicaments</h1>
    <div class="well">
        {!! Form::open(array('route' => array('postRechercheMed'), 'methode' => 'post', 'files' => true)) !!}
        <div class="form-group">
            <div class="col-md-10  col-md-10">
                <input type="text" name="rechercher"
                       placeholder="Rechercher par le nom d'un medicament ou de sa famille" class="form-control"
                       required value="{{$like ?? ''}}">
            </div>
            <div class="col-md-2 col-md-2">
                <button type="submit" class="btn btn-default btn-primary"><span
                        class="glyphicon glyphicon-search"></span> Rechercher
                </button>
            </div>
        </div>
        <br><br><br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Famille</th>
                <th>depot_legal</th>
                <th>effets</th>
                <th>contre_indication</th>
                <th>prix_echantillon</th>
            </tr>
            </thead>
            @foreach($mesMedicaments as $unMedicament)
                <tr>
                    <td><b>{{$unMedicament->nom_commercial}}</b></td>
                    <td>{{$unMedicament->lib_famille}}</td>
                    <td>{{$unMedicament->depot_legal}}</td>
                    <td>{{$unMedicament->effets}}</td>
                    <td>{{$unMedicament->contre_indication}}</td>
                    <td>{{$unMedicament->prix_echantillon}}</td>
                    <td style="text-align:center;"><a
                            href="{{ url('/getInteractionsMed')}}/{{$unMedicament->id_medicament}}">
                                        <span class="glyphicon glyphicon-circle-arrow-right" data-toggle="tooltip"
                                              data-placement="top" title="Voir"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="espace">
            <div class="col-md-12"></div>
        </div>
        <div class="form-group">
            <div class="col-md-12 col-md-offset-11">
                <a class="btn btn-default btn-primary"   href="{{ url('/') }}">
                    <span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div>
        </div>
    </div>

@stop
