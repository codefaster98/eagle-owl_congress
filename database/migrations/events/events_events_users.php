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
        Schema::disableForeignKeyConstraints();
        Schema::create('events_events_users', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('event_id');
            $table->string('user_id');
            $table->string('date');
            $table->boolean('attend')->nullable();
            $table->string('price')->default(0);
            $table->json('Payment_details')->nullable();
            $table->boolean('paid')->default(false);
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('events_events_users');
        Schema::enableForeignKeyConstraints();
    }
};
