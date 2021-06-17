<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bildirimler extends Model
{
    use HasFactory;
    protected $table = "bildirimler";
    protected $guarded = [];
    public function kullanici(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function gonderen(){
        return $this->hasOne('App\Models\User', 'gonderen_user_id', 'id');
    }

}
