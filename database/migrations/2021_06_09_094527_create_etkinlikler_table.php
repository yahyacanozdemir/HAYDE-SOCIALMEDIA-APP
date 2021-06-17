<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtkinliklerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etkinlikler', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->string('baslik')->nullable();
            $table->text('icerik')->nullable();
            $table->string('etkinlik_tipi')->nullable();
            $table->string('etkinlik_konumu')->nullable();
            $table->string('baslangic_tarihi')->nullable();
            $table->string('bitis_tarihi')->nullable();
            $table->string('etkinlik_fotografi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etkinlikler');
    }
}
