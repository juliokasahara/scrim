<?php

namespace App\Models;

use Constants;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function listGroups(){
        return $this->all();
    }

    public function validaPropriedade($idUser,$idGroup)
    {
        $idGroupPropExiste = DB::table('users')
        ->select('groups.id')
        ->join('groups', 'users.id', '=', 'groups.user_owner_id')
        ->where('users.id','=',$idUser)
        ->where('groups.id','=',$idGroup)
        ->get();

        return $idGroupPropExiste->get(0) == null;
    }

    public function groups(){
        // info;app;tabela,idPK;idFK
        // return $this->belongsToMany(Group::class,'group_users','group_id','user_id');
        return $this->belongsToMany(Group::class,'group_users');
    }

    public function addGroup(Group $group){
        return $this->groups()->save($this);
    }

    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
