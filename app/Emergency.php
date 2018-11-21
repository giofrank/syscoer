<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
// agregar para los ACL
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;

class Emergency extends Model
{
    use ShinobiTrait;
    protected $table = 'emergency';
    protected $primaryKey = "id";

    public static function Emergencys($pid){
        return DB::table('emergency')
            ->join('ubigeo_district','ubigeo_district.id','=','emergency.district_id')
            ->where('emergency.pid_created', '=', $pid)
            ->select('ubigeo_district.name AS name_district','emergency.*')
            ->get();
    }
}
