<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('company_email')->nullable();
            $table->string('designation')->nullable();
            $table->string('id_number')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('aadhar_front')->nullable();
            $table->string('aadhar_back')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('resume')->nullable();
            $table->string('degree_certificate')->nullable();
            $table->string('offer_letter')->nullable();
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
        Schema::dropIfExists('user_info');
    }
}
