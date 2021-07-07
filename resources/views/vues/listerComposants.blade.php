@extends('layouts.master')
@section('content')
    <br><br>
    <h1>Liste des composants du medicament</h1>
        <br><br><br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>libelle_composant</th>
                <th>quantité_composant</th>
            </tr>
            </thead>
            @foreach($mesComposants as $unComposant)
                <tr>
                    <td><b>{{$unComposant->lib_composant}}</b></td>
                    <td>{{$unComposant->qte_composant}}</td>
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

