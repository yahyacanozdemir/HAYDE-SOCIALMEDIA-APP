<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArkadaslikIstekleri extends Model
{
    use HasFactory;
    protected $table = "arkadaslik_istekleri";
    protected $guarded = [];

    public function gonderen(){
        return $this->belongsTo('App\Models\User', 'arkadas_id', 'id');
    }
}
