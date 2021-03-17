<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('diseases', function (Blueprint $table) {
            Schema::dropIfExists('diseases');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('icd_code_id');
            $table->foreign('icd_code_id')->references('id')->on('i_c_d__c_o_d_e_s')->onDelete('cascade');
            $table->text('description');
            $table->text('diagnosis');
            $table->text('symptoms');
            $table->string('doc_name');
            $table->date('date');
            $table->string('body_part');
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
        Schema::dropIfExists('diseases');
    }
}
