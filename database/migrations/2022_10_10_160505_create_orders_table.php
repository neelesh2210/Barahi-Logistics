<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->bigInteger('added_by');
            $table->bigInteger('user_id');
            $table->bigInteger('branch_id');
            $table->bigInteger('destination_id');
            $table->string('receiver_name');
            $table->bigInteger('receiver_phone');
            $table->bigInteger('receiver_alt_phone')->nullable();
            $table->text('receiver_address');
            $table->double('weight',8,2);
            $table->double('delivery_charge',8,2);
            $table->string('pickup_type')->nullable();
            $table->double('cod_charge',8,2)->nullable();
            $table->string('package_access')->nullable();
            $table->string('package_type')->nullable();
            $table->text('remark')->nullable();
            $table->string('priority')->nullable();
            $table->string('vendor_reference_id')->nullable();
            $table->string('delivery_instruction')->nullable();
            $table->string('payment_collection')->nullable();
            $table->string('order_status')->nullable();
            $table->text('order_status_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
