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
        Schema::create('events_events', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->uuid('code')->unique();  
            $table->string('category_id');
            $table->json('name');
            $table->json('description');  
            $table->json('details');  
            $table->string('date');
            $table->string('from_time');
            $table->string('to_time');
            // for system
            $table->string('created_type')->comment('admin || user');
            $table->string('created_at');
            $table->string('created_by');
            $table->string('updated_type')->nullable()->comment('admin || user');
            $table->string('updated_at')->nullable();
            $table->string('updated_by')->nullable();
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_events');
    }
};
// 112298604
// 24 hour
// speed test 
/**
 * 
 * 16375782577
 */
