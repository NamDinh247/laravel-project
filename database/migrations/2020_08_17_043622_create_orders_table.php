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
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('users');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->string('od_code')->nullable();
            $table->double('od_total_price')->nullable();
            $table->string('ship_name')->nullable();
            $table->string('ship_address')->nullable();
            $table->string('ship_email')->nullable();
            $table->string('ship_phone')->nullable();
            $table->double('ship_fee')->nullable();
            $table->text('od_note')->nullable();
            $table->unsignedBigInteger('od_status');
            $table->foreign('od_status')->references('id')->on('order_statuses');
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
