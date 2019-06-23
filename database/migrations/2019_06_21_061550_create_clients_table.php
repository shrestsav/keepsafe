<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('suburb')->nullable();
            $table->smallInteger('state')->comment('States in Config')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->integer('account_limit')->nullable();
            $table->smallInteger('cr_ac_approve')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_suburb')->nullable();
            $table->smallInteger('billing_state')->comment('States in Config')->nullable();
            $table->string('billing_postcode')->nullable();
            $table->string('website')->nullable();
            $table->string('abn')->nullable();
            $table->integer('charge_rate')->nullable();
            $table->text('footnote')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
