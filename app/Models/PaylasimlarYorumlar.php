<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaylasimlarYorumlar extends Model
{
    use HasFactory;
    protected $table = "yorumlar";
    protected $guarded = [];

    public function kullanici(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
