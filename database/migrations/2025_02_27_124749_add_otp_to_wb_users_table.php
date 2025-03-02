<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wb_user', function (Blueprint $table) {
            $table->timestamp('otp_expiry')->nullable();
            $table->boolean('is_verified')->default(false);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wb_user', function (Blueprint $table) {
            //
        });
    }
};
