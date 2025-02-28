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
        Schema::create('wb_cities', function (Blueprint $table) {
            // Primary key
            $table->id(); // Auto-incrementing primary key (id)

            // City and country details
            $table->string('city_name'); // Name of the city
            $table->string('country_name'); // Name of the country

            // Foreign key to link to the `wb_user` table
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key (can be NULL)
            $table->foreign('user_id')->references('id')->on('wb_user')->onDelete('cascade');

            // Timestamps (created_at and updated_at)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('wb_cities'); // Drop the table if the migration is rolled back
    }
};