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
        Schema::create('events_sponsors', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->uuid('code')->unique();
            $table->string('user_id');
            $table->json('title');
            $table->json('first_name');
            $table->json('last_name');
            $table->json('job_position');
            $table->string('email')->unique();
            $table->string('img');
            $table->string('phone_number_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('post_code')->nullable();
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
        Schema::dropIfExists('events_sponsors');
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
