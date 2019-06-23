<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('job_type')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->longText('client_contacts')->nullable();
            $table->string('purchase_order')->nullable();
            $table->string('location')->nullable();
            $table->string('site_contact')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('suburb')->nullable();
            $table->string('site_address')->nullable();
            $table->string('directions')->nullable();
            $table->text('footnote');
            $table->integer('AMORR')->unsigned()->comment("Approximate M's of Rail Required")->nullable();
            $table->smallInteger('status')->unsigned();
            $table->text('invoice_note');
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
        Schema::dropIfExists('jobs');
    }
}
