<?php


namespace App\metier;


class Interaction extends Model
{
    protected $table = 'interagir';
    public $timestamps = false;
    protected $fillable = [
        'id_medicament',
        'med_id_medicament',
        'dangerosite'
    ];
    public $timetamps = true;
}
