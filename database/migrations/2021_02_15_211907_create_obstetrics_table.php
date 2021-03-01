<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObstetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obstetrics', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('type');
            $table->string('child_name');
            $table->string('child_sex');
            $table->integer('number_of_childer');
            $table->text('complications');
            $table->date('date');
            $table->integer('patient_id');
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
        Schema::dropIfExists('obstetrics');
    }
}
