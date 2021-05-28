<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['id','name'];

    public function users(){
        // info;app;tabela,idPK;idFK
        return $this->belongsToMany('App\User','group_users','id_user','id_group');
    }

}