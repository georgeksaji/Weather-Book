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
    public function up(): void
    {
        Schema::create('wb_user', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('username')->unique(); // Username field
            $table->date('dob'); // Date of Birth field
            $table->string('phone')->unique(); // Phone field
            $table->string('location'); // Location field
            $table->string('role')->default('user'); // Role field
            $table->string('status')->default('active'); // Status field
            $table->timestamp('last_login')->nullable(); // Last login timestamp
            $table->string('otp')->nullable(); // OTP field
            $table->string('password'); // Password field (will be hashed in application logic)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('wb_user');
    }
};