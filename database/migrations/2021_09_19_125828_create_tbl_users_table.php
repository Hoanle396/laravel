<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments("user_id");
            $table->string('user_fullname');
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->string('user_bankname')->nullable();
            $table->string('user_banknumber')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_phonenumber')->nullable();
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
        Schema::dropIfExists('tbl_users');
    }
}
