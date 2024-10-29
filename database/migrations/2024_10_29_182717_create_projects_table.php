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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title', 32);
            $table->text('description', 1024);
            $table->string('cover', 1024)->nullable();
            $table->string('client', 32)->nullable();
            // settore lavorativo
            $table->string('sector', 32)->nullable();
            // da iniziare-in corso-finito
            $table->string('status', 16);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
