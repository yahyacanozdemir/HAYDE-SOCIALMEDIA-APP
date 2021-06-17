<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSosyalMedya extends Model
{
    use HasFactory;
    protected $table = "sosyal_medya_hesaplari";
    protected $guarded = [];
}
