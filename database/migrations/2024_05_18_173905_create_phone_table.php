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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('registrar_name');
            $table->string('source');
            $table->string('model');
            $table->string('serial_number');
            $table->string('mac_address');
            $table->date('date_added');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable(); // Reference to User
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone');
    }
};
