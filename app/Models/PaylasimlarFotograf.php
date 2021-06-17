<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaylasimlarFotograf extends Model
{
    use HasFactory;
    protected $table = "paylasim_fotograflari";
    protected $guarded = [];
    public $timestamps = false;
}
