<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->date('d_o_b')->nullable();
            $table->string('license_no')->nullable();
            $table->date('license_expiry')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->text('about')->nullable();
            $table->date('joined_date')->nullable();
            $table->longText('documents')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('user_details');
    }
}
