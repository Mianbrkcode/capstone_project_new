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
        Schema::dropIfExists('guidelines_before');
        
        Schema::create('guidelines_before', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guidelines_id');
            $table->string('headings');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
            $table->foreign('guidelines_id')
                  ->references('guidelines_id')
                  ->on('guidelines')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidelines_before');
    }
};
