<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('disorders');

        Schema::create('disorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('icd_code_id');
            $table->foreign('icd_code_id')->references('id')->on('i_c_d__c_o_d_e_s')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('body_part');
            $table->unsignedBigInteger('patient_id');
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
        Schema::dropIfExists('disorders');
    }
}
