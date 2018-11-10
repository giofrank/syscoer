<?php

namespace App;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use DB;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codid','pid','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function Fullusers(){
        return DB::table('users')
        ->join('persona','persona.num_doc','=','users.pid')
        ->select('users.*','persona.*')
        ->get();

    }


    public static function FullRole($key){
        return DB::select("select roles.id,roles.slug from role_user left join roles on roles.id = role_user.role_id where role_user.user_id='$key'");
    }


}
