<?php


namespace App\metier;


class Medicament extends Model
{
    protected $table = 'medicament';
    public $timestamps = false;
    protected $fillable = [
        'id_medicament',
        'id_famille',
        'depot_legal',
        'nom_commercial',
        'effets',
        'contre_indication',
        'prix_echantillon'
    ];
    public $timetamps = true;
}
