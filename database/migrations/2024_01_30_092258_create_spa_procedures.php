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
        Schema::create('spa_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('title_procedure');
            $table->longText('description');
            $table->string('photo_spa');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->string('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spa_procedures');
    }
};
