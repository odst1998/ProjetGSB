<?php


namespace App\metier;


class Constituer extends Model
{
    protected $table = 'constituer';
    public $timestamps = false;
    protected $fillable = [
        'id_composant',
        'id_medicament',
        'qte_composant'
    ];
    public $timetamps = true;
}
