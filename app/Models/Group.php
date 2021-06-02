<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = ['id','name','user_owner_id','hash'];

    public function users(){
        // info;app;tabela,idPK;idFK
        return $this->belongsToMany(User::class,'group_users','id_user','id_group');
    }

    public function scrim(){
        // info;app;tabela,idPK;idFK
        return $this->belongsToMany(Scrim::class,'group_scrims','id_scrim','id_group');
    }



}
