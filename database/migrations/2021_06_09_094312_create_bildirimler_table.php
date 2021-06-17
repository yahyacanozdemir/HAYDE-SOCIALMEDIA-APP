<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBildirimlerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bildirimler', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->unsignedBigInteger('gonderen_user_id')->nullable();
            $table->foreign('gonderen_user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->string('bildirim_icerigi')->nullable();
            $table->boolean('bildirim_durumu')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bildirimler');
    }
}
