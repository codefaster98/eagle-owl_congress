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
        Schema::create('events_events', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->uuid('code')->unique();
            $table->string('category_id');
            $table->json('name');
            $table->json('short_details');
            $table->json('long_details');
            $table->string('date');
            $table->string('from_time');
            $table->string('to_time');
            $table->string('price')->default(0);
            // for system
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('events_events');
        Schema::enableForeignKeyConstraints();
    }
};
// 112298604
// 24 hour
// speed test 
/**
 * 
 * 16375782577
 */
