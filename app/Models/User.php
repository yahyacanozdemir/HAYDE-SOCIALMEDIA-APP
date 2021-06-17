<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ad',
        'soyad',
        'id',
        'email',
        'password',
        'kullanici_adi',
        'profil_fotografi',
        'kapak_fotografi ',
        'cinsiyet',
        'telefon',
        'kisisel_eposta_adresi',
        'dogum_tarihi',
        'bolum_bilgisi',
        'sinif_bilgisi',
        'mezuniyet_tarihi',
        'okula_kayit_tarihi',
        'bulundugu_il',
        'bulundugu_ilce',
        'ilgi_alani',
        'ogrenci_no',
        'yas',
        'uyruk',
        'verificationcode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paylasimlar(){
        return $this->hasMany('App\Models\Paylasimlar', 'user_id', 'id');

    }

    //ARKADAŞLARI ÇEKİYORUZ
    public function arkadaslar(){
        return $this->belongsToMany('App\Models\User', 'arkadaslar', 'user_id', 'arkadas_id');
    }
    //ARKADAŞLAR TABLOSU ÇEKİYORUZ ANASAYFA İÇİN
    public function arkadaslartablo(){
        return $this->hasMany('App\Models\Arkadaslar');
    }
    public function arkadaslikistekleri(){
        return $this->hasMany('App\Models\ArkadaslikIstekleri', 'user_id', 'id');
    }
    public function sosyalmedyahesaplari(){
        return $this->hasOne('App\Models\UserSosyalMedya', 'user_id', 'id');
    }
    public function etkinlikler(){
        return $this->hasMany('App\Models\Etkinlikler', 'user_id', 'id');
    }
}
