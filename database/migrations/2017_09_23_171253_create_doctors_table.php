<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('crm', 50)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('specialty', 255)->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
