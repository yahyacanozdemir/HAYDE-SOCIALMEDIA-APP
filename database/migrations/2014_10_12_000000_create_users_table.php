<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->string('soyad');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ogrenci_no')->nullable();
            $table->string('kullanici_adi')->nullable();
            $table->string('profil_fotografi')->nullable();
            $table->string('kapak_fotografi')->nullable();
            $table->string('cinsiyet')->nullable();
            $table->bigInteger('telefon')->nullable();
            $table->string('kisisel_eposta_adresi')->nullable();
            $table->string('dogum_tarihi')->nullable();
            $table->string('bolum_bilgisi')->nullable();
            $table->smallInteger('sinif_bilgisi')->nullable();
            $table->string('mezuniyet_tarihi')->nullable();
            $table->string('okula_kayit_tarihi')->nullable();
            $table->string('bulundugu_il')->nullable();
            $table->string('bulundugu_ilce')->nullable();
            $table->string('ilgi_alani')->nullable();
            $table->smallInteger('yas')->nullable();
            $table->string('uyruk')->nullable();
            $table->string('verificationcode')->nullable();
            $table->integer('verify_durum')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
