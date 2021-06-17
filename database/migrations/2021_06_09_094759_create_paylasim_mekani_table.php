<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaylasimMekaniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paylasim_mekani', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('paylasimlar_id');
            $table->foreign('paylasimlar_id')
                ->references('id')
                ->on('paylasimlar')
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
        Schema::dropIfExists('paylasim_mekani');
    }
}
