<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('màu');           
            $table->string('hãng');
            $table->string('image');
            $table->date('produced_on');
            // $table->unsignedInteger('manufactures_id');
            // $table->foreign('manufactures_id')
            // ->references('id')->on('manufactures')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
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
        Schema::dropIfExists('cars');
    }
};
