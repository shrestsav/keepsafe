<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id')->unsigned();
            $table->smallInteger('priority');
            $table->smallInteger('superslip')->default(0);
            $table->date('date');
            $table->smallInteger('status');
            $table->smallInteger('type');
            $table->smallInteger('vehicle');
            $table->smallInteger('boom_lift_req')->default(0);
            $table->text('note')->nullable();
            $table->integer('rail_rate')->nullable();
            $table->integer('platform_rate')->nullable();
            $table->integer('int_platform_rate')->nullable();
            $table->string('purchase_order')->nullable();
            $table->string('ref')->nullable();
            $table->date('off_hired')->nullable();
            $table->integer('hire_days')->unsigned()->nullable();
            $table->string('location')->nullable();

            //Using Json Fields instead of Normalizing, not sure
            $table->longText('GD')->nullable()->comment('General Details');
            $table->longText('NORR')->nullable()->comment('No of Rails Req');
            $table->longText('BOMR')->nullable()->comment("Breakdown of M's Required");
            $table->longText('P')->nullable()->comment('Platform');
            $table->longText('UB')->nullable()->comment('Universal Brackets');
            $table->text('N')->nullable()->comment('Notes');
            $table->longText('BR')->nullable()->comment('Brackets Req');
            $table->longText('ORS')->nullable()->comment('On Roof Systems');
            $table->longText('BRC')->nullable()->comment('Brackets Req Const');
            $table->longText('BRR')->nullable()->comment('Brackets Req Reno');
            $table->longText('BRP')->nullable()->comment('Brackets Req Pole');
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
        Schema::dropIfExists('job_events');
    }
}
