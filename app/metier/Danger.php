<?php


namespace App\metier;


class Danger extends Model
{
    protected $table = 'danger';
    public $timestamps = false;
    protected $fillable = [
        'code_danger',
        'libelle_danger'
    ];
    public $timetamps = true;
}
