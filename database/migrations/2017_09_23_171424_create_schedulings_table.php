<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedulings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_patient')->nullable();
            $table->integer('id_doctor')->nullable();
            $table->string('specialty', 255)->nullable();
            $table->date('date')->nullable(); 
            $table->time('horary')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
            $table->integer('deleted_user')->nullable();
            $table->string('deleted_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedulings');
    }
}
