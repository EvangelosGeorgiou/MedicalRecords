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
        Schema::enableForeignKeyConstraints();
        Schema::create('obstetrics', function (Blueprint $table) {
            Schema::dropIfExists('obstetrics');
            $table->bigIncrements('id');
            $table->string('doctor_name');
            $table->string('type');
            $table->json('childrens');
            $table->integer('number_of_childer');
            $table->text('complications');
            $table->date('date');
            $table->bigInteger('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
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
