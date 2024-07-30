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
        Schema::create('events_sponsorship_requests', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('name');
            $table->string('positing');
            $table->string('email');
            $table->string('phone_code');  
            $table->string('phone');
            $table->longText('message')->nullable();
            $table->string('status');
            // for system
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_sponsorship_requests');
    }
};
// 112298604
// 24 hour
// speed test 
/**
 * 
 * 16375782577
 */
