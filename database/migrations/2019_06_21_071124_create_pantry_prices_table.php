<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePantryPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pantry_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id')->unsigned()->unique()->comment('0:Default Price');
            $table->decimal('CSFEP')->unsigned()->comment('Construction Steel Frame Edge Protection');
            $table->decimal('CTFEP')->unsigned()->comment('Construction Timber Frame Edge Protection');
            $table->decimal('RSEP')->unsigned()->comment('Re-roof Standard Edge Protection');
            $table->decimal('RPEP')->unsigned()->comment('Re-roof Pole Edge Protection');
            $table->decimal('REP')->unsigned()->comment('Renovation Edge Protection');
            $table->decimal('RP')->unsigned()->comment('Residential Platform');
            $table->decimal('STDCP')->unsigned()->comment('STD Commercial Platform');
            $table->decimal('ICP')->unsigned()->comment('Internal Commercial Platform');
            $table->decimal('CEP')->unsigned()->comment('Commercial Edge Protection');
            $table->decimal('BL')->unsigned()->comment('Boom Lift');
            $table->smallInteger('CO')->unsigned()->comment('Charge On, 1:Install - 2:Dismantle');
            $table->decimal('EVOR')->unsigned()->comment('Edge Void 1 Rail');
            $table->decimal('EVTR')->unsigned()->comment('Edge Void 2 Rail');
            $table->decimal('K')->unsigned()->comment('Kickboards');
            $table->decimal('MG')->unsigned()->comment('Mesh Guard');
            $table->decimal('COF')->unsigned()->comment('Call Out Fee');
            $table->decimal('ERC')->unsigned()->comment('Equipment Recovery Charge');
            $table->decimal('MMC')->unsigned()->comment('Minimum Meter Charges');
            $table->decimal('HCR')->unsigned()->comment('Hire Charge Rail');
            $table->decimal('HCP')->unsigned()->comment('Hire Charge Platform');
            $table->decimal('HCEVO')->unsigned()->comment('Hire Charge Edge Void 1');
            $table->decimal('HCEVT')->unsigned()->comment('Hire Charge Edge Void 2');
            $table->decimal('HCEK')->unsigned()->comment('Hire Charge Edge Kickboard');
            $table->decimal('HCEMG')->unsigned()->comment('Hire Charge Edge Mesh Guard');
            $table->decimal('DW')->unsigned()->comment('Damage Waiver(%)');
            $table->text('Note')->nullable();
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
        Schema::dropIfExists('pantry_prices');
    }
}
