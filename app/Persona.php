<?php

namespace App;

use DB;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;
// agregar para los ACL
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;

class Persona extends Model
{
     use ShinobiTrait;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table='persona';
    protected $fillable = [
        'num_doc' ,'apell_pater', 'apell_mat','nombres','email', 'direccion', 'celular'
    ];
    protected $primaryKey = "id_per";
}
