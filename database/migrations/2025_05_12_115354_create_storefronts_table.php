<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('storefronts', function (Blueprint $table) {
            $table->id();
            $table->string('slider_heading',255)->nullable();
            $table->text('slider_description')->nullable();
            $table->string('booking_heading',255)->nullable();
            $table->text('booking_description')->nullable();
            $table->string('contact_heading',191)->nullable();
            $table->text('contact_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storefronts');
    }
};
