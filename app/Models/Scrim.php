<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'scrims';

    protected $fillable = ['id','dta_inicio','hora','qnt_player','qnt_time','qnt_partida'];

    public function groups(){
        // info;app;tabela,idPK;idFK
        return $this->belongsToMany(Group::class,'group_scrims','group_id','user_id');
    }

}