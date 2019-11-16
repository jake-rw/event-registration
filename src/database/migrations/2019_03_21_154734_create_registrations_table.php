<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cf_fname');
            $table->string('cf_lname');
            $table->string('cf_company');
            $table->string('cf_job_title');
            $table->string('cf_email');
            $table->string('cf_tel');
            $table->text('cf_requirements')->nullable();
            $table->text('cf_medical')->nullable();
            $table->text('cf_other')->nullable();
            $table->boolean('cf_consent');
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
        Schema::dropIfExists('registrations');
    }
}
