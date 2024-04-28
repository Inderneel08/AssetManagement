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
        Schema::create('assets', function (Blueprint $table) {
           $table->id();
           $table->string('asset_id');
           $table->string('asset_type');
        //    $table->string('asset_category');
        //    $table->string('os_type')->nullable();
        //    $table->integer('ram')->nullable();
        //    $table->integer('storage')->nullable();
        //    $table->string('accessories')->nullable();
        //    $table->string('specifications')->nullable();
        //    $table->string('make');
        //    $table->string('model')->nullable();
           $table->string('assignedTo')->nullable();
           $table->string('ip')->nullable();
           $table->string('mac_id')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
