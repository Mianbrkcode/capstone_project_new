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
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->dateTime('dateandTime');
            $table->integer('uid');
            $table->string('emergency_type');
            $table->string('resident_name');
            $table->string('locationName');
            $table->string('locationLink');
            $table->string('phoneNumber');
            $table->string('message');
            $table->string('imageEvidence');
            $table->enum('status' , ['0' ,'1'])->default('0');
            $table->string('responder_name');
            $table->string('userfrom');
            $table->string('residentProfile');
            // $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
