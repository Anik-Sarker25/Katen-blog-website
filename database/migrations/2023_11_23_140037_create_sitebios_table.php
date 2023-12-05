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
        Schema::create('sitebios', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('tagline');
            $table->string('logo')->default('logo.png');
            $table->string('status')->default('deactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sitebios');
    }
};
