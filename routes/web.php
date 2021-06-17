<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>'auth'], function () {
    Route::get('/', 'App\Http\Controllers\AnasayfaController@index')->name('anasayfa');
    Route::get('/profil/{kullanici_adi}', 'App\Http\Controllers\KullaniciController@index')->name('profil');
    Route::get('/profil-ayarlari', 'App\Http\Controllers\KullaniciController@ayarlarform')->name('ayarlar');
    Route::post('/profil-ayarlari-kaydet', 'App\Http\Controllers\KullaniciController@ayarlarkaydet')->name('ayarlar.kaydet');
    Route::post('/kapak-fotografi-kaydet', 'App\Http\Controllers\KullaniciController@kapakResmiKaydet')->name('ayarlar.kapakResmKaydet');
    Route::post('/profil-guvenlik-ayarlari-kaydet', 'App\Http\Controllers\KullaniciController@ayarlarguvenlikkaydet')->name('ayarlar.guvenlik.kaydet');
    //ARKADAŞ EKLEME
    Route::post('/arkadas-ekle', 'App\Http\Controllers\KullaniciController@arkadasekle')->name('arkadas.ekle');
    Route::post('/arkadas-ekle-kabul', 'App\Http\Controllers\KullaniciController@arkadaseklekabul')->name('arkadas.ekle.kabul');
    Route::post('/arkadas-ekle-reddet', 'App\Http\Controllers\KullaniciController@arkadaseklered')->name('arkadas.ekle.red');
    //ETKİNLİKLER
    Route::get('/etkinlik/{etkinlik_id}', 'App\Http\Controllers\AnasayfaController@etkinlik')->name('etkinlik');

    Route::get('/arkadaslik-istekleri', function () {
        return view('arkadaslikistekleri');
    })->name('arkadaslikistekleri');
    //ETKİNLİK KATILma
    Route::post('/etkinlik-katil', 'App\Http\Controllers\PostController@etkinlikkatil')->name('etkinlik.katil');
    //ARAMA SONUÇLARI
    Route::get('/arama-sonuclari', 'App\Http\Controllers\AnasayfaController@arama')->name('arama');
    //post için
    Route::post('/post', [PostController::class, 'post'])->name('post');
    Route::post('/posts', [PostController::class, 'deletedurumpost']);
    Route::post('/pos', [PostController::class, 'begen'])->name('pos');
    Route::post('/postyorum', [PostController::class, 'yorumekle'])->name('postyorum');
    Route::post('/etkinlikyorum', [PostController::class, 'etkinlikyorumekle'])->name('etkinlikyorum');
    //BİLDİRİMLER
    Route::get('/bildirimler', 'App\Http\Controllers\AnasayfaController@bildirimler')->name('bildirimler');
    Route::post('/bildirimler-sil', 'App\Http\Controllers\AnasayfaController@bildirimsil')->name('bildirimler.sil');


});



require __DIR__.'/auth.php';
