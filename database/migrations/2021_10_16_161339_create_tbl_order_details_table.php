<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->increments("oder_detail_id");
            $table->string("oder_code");
            $table->string("product_id");
            $table->string("product_name");
            $table->string("product_quantity");
            $table->string("user_fullname");
            $table->string("user_email");
            $table->string("user_phonenumber");
            $table->string("user_address");
            $table->string("user_address2")->nullable();
            $table->string("oder_status");
            $table->string("oder_pay");
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
        Schema::dropIfExists('tbl_order_details');
    }
}
