<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEtkinlikler extends Model
{
    use HasFactory;
    protected $table = "kullanicilar_etkinlikler";
    protected $guarded = [];
    public $timestamps = false;
}
