<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->enum('sex', ['male', 'female'])->nullable();
        $table->string('birth_place')->nullable();
        $table->date('booking_date')->nullable();
        $table->string('work')->nullable();
        $table->string('profile_picture')->nullable(); // for storing profile picture
    });
    }

    public function down()
    {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('phone');
        $table->dropColumn('address');
        $table->dropColumn('sex');
        $table->dropColumn('birth_place');
        $table->dropColumn('booking_date');
        $table->dropColumn('work');
        $table->dropColumn('profile_picture');
    });
    }

};
