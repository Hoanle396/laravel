<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_join', function (Blueprint $table) {
            $table->increments("join_id");
            $table->string("service_id");
            $table->string("service_fullname");
            $table->string("service_email");
            $table->string("join_time");
            $table->string("join_date");
            $table->text("join_description")->nullable();
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
        Schema::dropIfExists('tbl_join');
    }
}
