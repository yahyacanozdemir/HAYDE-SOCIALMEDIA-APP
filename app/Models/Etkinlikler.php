<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etkinlikler extends Model
{
    use HasFactory;
    protected $table = "etkinlikler";
    protected $guarded = [];

    public function kullanici(){
        return $this->belongsTo('App\Models\User',  'user_id', 'id');
    }

    public function katilanlar(){
        return $this->belongsToMany('App\Models\User', 'kullanicilar_etkinlikler', 'etkinlikler_id', 'user_id');
    }

    public function yorumlarr(){
        return $this->hasMany('App\Models\EtkinlikYorum', 'etkinlik_id','id');
    }

    public function mekanlar(){
        return $this->hasMany('App\Models\EtkinliklerMekan', 'etkinlikler_id', 'id');
    }
}
