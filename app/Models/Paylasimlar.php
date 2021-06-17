<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paylasimlar extends Model
{
    use HasFactory;
    protected $table = "paylasimlar";
    protected $guarded = [];

    public function kullanici(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function mekan(){
        return $this->hasOne('App\Models\PaylasimlarMekan', 'paylasimlar_id', 'id');
    }

    public function yorumlar(){
        return $this->hasMany('App\Models\PaylasimlarYorumlar', 'paylasimlar_id','id');
    }

    public function fotograflar(){
        return $this->hasMany('App\Models\PaylasimlarFotograf', 'paylasimlar_id', 'id');
    }
    public function tepkiler(){
        return $this->hasMany('App\Models\PaylasimlarTepkiler', 'paylasimlar_id', 'id');
    }

}
