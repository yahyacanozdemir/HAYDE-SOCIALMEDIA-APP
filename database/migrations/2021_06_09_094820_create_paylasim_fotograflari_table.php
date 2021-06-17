<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaylasimFotograflariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paylasim_fotograflari', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paylasimlar_id');
            $table->foreign('paylasimlar_id')
                ->references('id')
                ->on('paylasimlar')
                ->onDelete('cascade');
            $table->string('fotograf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paylasim_forograflari');
    }
}
