<?php


namespace App\metier;


class Composant extends Model
{
    protected $table = 'composant';
    public $timestamps = false;
    protected $fillable = [
        'id_composant',
        'lib_composant'
    ];
    public $timetamps = true;
}
