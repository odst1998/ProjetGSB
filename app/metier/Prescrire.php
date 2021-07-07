<?php


namespace App\metier;


class Prescrire extends Model
{
    protected $table = 'prescrire';
    public $timestamps = false;
    protected $fillable = [
        'id_dosage',
        'id_medicament',
        'id_type_individu',
        'posologie'
    ];
    public $timetamps = true;
}
