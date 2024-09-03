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
        Schema::create('equipment_department', function (Blueprint $table) {
            $table->foreignId('equipment_id');
            $table->foreignId('department_id');
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->primary(['equipment_id','department_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_department');
    }
};
