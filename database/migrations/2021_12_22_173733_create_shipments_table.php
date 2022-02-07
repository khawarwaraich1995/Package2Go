<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_no')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->unsignedBigInteger('pickup_address');
            $table->foreign('pickup_address')->references('id')->on('addresses')->onDelete('cascade');
            $table->unsignedBigInteger('drop_address');
            $table->foreign('drop_address')->references('id')->on('addresses')->onDelete('cascade');
            $table->float('distance');
            $table->float('total_amount');
            $table->string('payment_method')->default('cash');
            $table->boolean('payment_status')->default(0);
            $table->enum('status', ['Pending', 'Processing', 'Driver Accepted', 'Driver Picked Up' ,'Completed', 'Cancelled'])->default('Pending');
            $table->timestamp('shipment_date_time')->nullable();
            $table->timestamp('delivered_date_time')->nullable();
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
        $table->dropForeign('lists_customer_id_foreign');
        $table->dropIndex('lists_customer_id_index');
        $table->dropColumn('customer_id');
        $table->dropForeign('lists_pickup_address_foreign');
        $table->dropIndex('lists_pickup_address_index');
        $table->dropColumn('pickup_address');
        $table->dropForeign('lists_drop_address_foreign');
        $table->dropIndex('lists_drop_address_index');
        $table->dropColumn('drop_address');
        $table->dropForeign('lists_vehicle_id_foreign');
        $table->dropIndex('lists_vehicle_id_index');
        $table->dropColumn('vehicle_id');
        Schema::dropIfExists('shipments');
    }
}
