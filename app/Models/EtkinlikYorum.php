<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtkinlikYorum extends Model
{
    use HasFactory;
    protected $table = "etkinlik_yorum";
    protected $guarded = [];

    public function kullanici(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
