<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title', 191);
            $table->string('phone', 191);
            $table->string('whatsapp_number', 191)->nullable();
            $table->string('whatsapp_default_message', 255)->nullable();
            $table->string('time_zone', 191)->nullable();
            $table->string('currency', 191)->nullable();
            $table->string('currency_format', 191)->nullable();
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
        Schema::dropIfExists('general_settings');
    }
};
