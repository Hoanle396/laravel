<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service', function (Blueprint $table) {
            $table->increments("service_id");
            $table->string('service_fullname');
            $table->string('service_gender');
            $table->string('service_birthday');
            $table->string('service_address');
            $table->string('service_email');
            $table->string('service_mobilePhone');
            $table->string('service_homePhone');
            $table->string('service_officePhone');
            $table->string('service_status');
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
        Schema::dropIfExists('tbl_service');
    }
}
