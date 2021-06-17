<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtkinlikMekaniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etkinlik_mekani', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('etkinlikler_id');
            $table->foreign('etkinlikler_id')
                ->references('id')
                ->on('etkinlikler')
                ->onDelete('cascade');
            $table->string('mekan_ismi')->nullable();
            $table->double('enlem')->nullable();
            $table->double('boylam')->nullable();
            $table->string('mekan_fotografi')->nullable();
            $table->string('mekan_adresi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etkinlik_mekani');
    }
}
