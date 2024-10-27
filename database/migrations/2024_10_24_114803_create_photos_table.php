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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('camera_id');
            $table->double('latitude', 8, 6);
            $table->double('longitude', 9, 6);
            $table->string('memo')->nullable();
            $table->string('filename')->nullable();
            $table->timestamps();
            
            $table->foreign('camera_id')->references('id')->on('cameras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
