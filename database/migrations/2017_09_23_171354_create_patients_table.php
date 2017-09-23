<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('rg', 15)->nullable();
            $table->string('cpf', 20)->nullable();   
            $table->string('phone', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('registration', 50)->nullable();
            $table->integer('sex')->nullable()->comment('1 - Masculino; 2 - Feminino');
            $table->date('birth')->nullable(); 
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
        Schema::dropIfExists('patients');
    }
}
