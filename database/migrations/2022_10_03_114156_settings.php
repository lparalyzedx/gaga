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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('');
            $table->string('favicon')->default('');
            $table->string('facebook')->default('');
            $table->string('youtube')->default('');
            $table->string('instagram')->default('');
            $table->string('linkedin')->default('');
            $table->string('twitter')->nullable();
            $table->string('email')->default('');
            $table->string('phone')->default('');
            $table->string('address')->nullable();
            $table->longText('company_description')->nullable();
            $table->longText('policy')->nullable();
            $table->longText('whyus')->nullable();
            $table->longText('terms');
            $table->string('map')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
