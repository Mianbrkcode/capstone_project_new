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
        Schema::create('emergency_hotlines', function (Blueprint $table) {
            $table->id('hotlines_id');
            $table->string('hotlines_number');
            $table->string('userfrom');
            $table->unsignedBigInteger('responder_id');
            $table->string('responder_name');             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency__hotlines');
    }
};
