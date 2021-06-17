<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaylasimlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paylasimlar', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->string('baslik')->nullable();
            $table->text('metin')->nullable();
            $table->string('yorum_sayisi')->nullable();
            $table->boolean('yorum_tercihi')->default(1);
            $table->string('kahkaha_tepki_sayisi')->nullable();
            $table->string('gulucuk_tepki_sayisi')->nullable();
            $table->string('begenme_tepki_sayisi')->nullable();
            $table->string('begenmeme_tepki_sayisi')->nullable();
            $table->boolean('paylasim_tipi')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paylasimlar');
    }
}
