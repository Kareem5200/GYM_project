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
        Schema::create('nutration_plan', function (Blueprint $table) {
            $table->id();
            $table->enum('meal',['breakfast','lunch','dinner','snacks']);
            $table->enum('days',['day1','day2','day3','day4','day5','day6','day7']);
            $table->text('plan');
            $table->string('supplements')->nullable();
            $table->date('start-date');
            $table->date('end_date');
            $table->foreignId('user_id');
            $table->foreignId('trainer_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('trainer_id')->references('id')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutration_plan');
    }
};
