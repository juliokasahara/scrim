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
        //return $this->belongsToMany(User::class,'group_users','user_id','group_id');
        return $this->belongsToMany(User::class,'group_users','user_id','group_id');
    }

    public function scrim(){
        // info;app;tabela,idPK;idFK
        return $this->belongsToMany(Scrim::class,'group_scrims','scrim_id','group_id');
    }



}
