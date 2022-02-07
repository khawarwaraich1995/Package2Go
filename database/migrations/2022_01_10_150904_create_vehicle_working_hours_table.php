<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleWorkingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_working_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->boolean('sunday')->default(0);
            $table->time('sunday_open')->default('00:00');
            $table->time('sunday_close')->default('23:59');
            $table->boolean('monday')->default(0);
            $table->time('monday_open')->default('00:00');
            $table->time('monday_close')->default('23:59');
            $table->boolean('tuesday')->default(0);
            $table->time('tuesday_open')->default('00:00');
            $table->time('tuesday_close')->default('23:59');
            $table->boolean('wednesday')->default(0);
            $table->time('wednesday_open')->default('00:00');
            $table->time('wednesday_close')->default('23:59');
            $table->boolean('thursday')->default(0);
            $table->time('thursday_open')->default('00:00');
            $table->time('thursday_close')->default('23:59');
            $table->boolean('friday')->default(0);
            $table->time('friday_open')->default('00:00');
            $table->time('friday_close')->default('23:59');
            $table->boolean('saturday')->default(0);
            $table->time('saturday_open')->default('00:00');
            $table->time('saturday_close')->default('23:59');
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
        Schema::dropIfExists('vehicle_working_hours');
    }
}
