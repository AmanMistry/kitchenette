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
            $table->string('flat_no');
            $table->string('area');
            $table->string('landmark');
            $table->string('pincode');
            $table->string('package');
            $table->string('phone');
            $table->date('ord_date');
            $table->string('pack_type');
            $table->string('email');
            $table->string('payment');
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            
            //foreign key
            $table->foreign('menu_id')->reference('id')->on('menus')->onDelete('cascade');
            $table->foreign('seller_id')->reference('id')->on('users')->onDelete('SET NULL');
            $table->foreign('user_id')->reference('id')->on('users')->onDelete('SET NULL');
            $table->foreign('city_id')->reference('id')->on('cities')->onDelete('cascade');

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
