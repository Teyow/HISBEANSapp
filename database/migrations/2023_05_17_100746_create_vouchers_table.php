<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_voucher')->nullable();
            $table->string('voucher_name')->nullable();
            $table->string('voucher_code')->nullable();
            $table->string('minimum_order')->nullable();
            $table->string('valid_until')->nullable();
            $table->string('promo_details')->nullable();
            $table->string('voucher_discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('vouchers');
    }
}
