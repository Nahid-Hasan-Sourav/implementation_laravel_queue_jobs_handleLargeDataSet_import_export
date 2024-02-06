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
        Schema::create('large_datasets', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->integer('branch_id');
            $table->timestamps();
        });
    }             

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('large_datasets');
    }
};
