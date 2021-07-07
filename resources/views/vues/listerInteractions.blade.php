@extends('layouts.master')
@section('content')
    <br><br>
    <h1>Liste Interactions</h1>
    <div class="well">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Médicament</th>
                <th>Medicament intéragit</th>
                <th>Dangerosité</th>
            </tr>
            </thead>
            @foreach($mesInteractions as $uneInteraction)
                <tr>
                    <td>{{$uneInteraction->nom_commercial}}</td>
                    @foreach($mesMedicaments as $unMedicament)
                        @if($uneInteraction->med_id_medicament == $unMedicament->id_medicament)
                            <td>{{$unMedicament->nom_commercial}}</td>
                        @endif
                    @endforeach
                    </td>
                    <td>
                        {{$uneInteraction->libelle_danger}}
                    </td>
                    <td style="text-align:center;"><a
                            href="{{ url('/getModifInteraction')}}/{{$uneInteraction->id_medicament}}/{{$uneInteraction->med_id_medicament}}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip"
                                  data-placement="top" title="modfier"></span></a>
                    </td>
                    <td style="text-align:center;">
                        <a class="glyphicon glyphicon-remove-sign" data-toggle="tooltip"
                           data-placement="top" title="Supprimer" href="#"
                           onclick="javascript:if (confirm('Confirmez-vous la suppression ?')) window.location ='{{ url('/SupprimInteraction')}}/{{$uneInteraction->id_medicament}}/{{$uneInteraction->med_id_medicament}}';">
                        </a>
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
