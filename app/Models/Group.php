<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = ['id','name','user_owner_id'];

    public function users(){
        // info;app;tabela,idPK;idFK
        return $this->belongsToMany(User::class,'group_users','id_user','id_group');
    }

}
