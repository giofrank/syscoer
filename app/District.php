<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// agregar para los ACL
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;

class District extends Model
{
    use ShinobiTrait;
    protected $table = 'ubigeo_district';
    protected $primaryKey = "id";
}
