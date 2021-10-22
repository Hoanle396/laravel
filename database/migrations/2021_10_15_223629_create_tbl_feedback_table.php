<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_feedback', function (Blueprint $table) {
            $table->increments('feedback_id');
            $table->string('feedback_firstname');
            $table->string('feedback_lastname');
            $table->string('feedback_email');
            $table->string('feedback_phonenumber');
            $table->string('feedback_message');
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
        Schema::dropIfExists('tbl_feedback');
    }
}
