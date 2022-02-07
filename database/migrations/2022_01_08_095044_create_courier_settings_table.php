<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_settings', function (Blueprint $table) {
            $table->id();
            $table->string('charges_type')->nullable();
            $table->string('charges_type_2')->nullable();
            $table->string('charges_type_3')->nullable();
            $table->float('one_day_delivery_charges')->nullable();
            $table->float('two_days_delivery_charges')->nullable();
            $table->float('three_days_delivery_charges')->nullable();
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
        Schema::dropIfExists('courier_settings');
    }
}
