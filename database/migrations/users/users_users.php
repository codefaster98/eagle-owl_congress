<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('users_users', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->id();
            $table->string('code')->unique();
            $table->string('title')->comment("mr,dr ...etc");
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_position')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('post_code')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
            //
            $table->longText('verify_token')->nullable();
            $table->string('active_type')->nullable()->comment('passwords || email verify || ..etc');
            $table->boolean('active')->default(true);
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users_users');
        Schema::enableForeignKeyConstraints();
    }
};
