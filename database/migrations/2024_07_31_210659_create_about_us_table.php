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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('facebook')->nullable();
            $table->text('instgram')->nullable();
            $table->text('youtube')->nullable();
            $table->text('X')->nullable();
            $table->string('logo');
            $table->string('address');
            $table->integer('phone1');
            $table->integer('phone2')->nullable();
            $table->string('admins_key');
            $table->string('trainers_key');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
