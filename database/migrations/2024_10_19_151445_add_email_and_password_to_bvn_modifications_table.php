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
        Schema::table('bvn_modifications', function (Blueprint $table) {
            $table->string('email')->after('data_to_modify')->nullable(); // Add the email column
            $table->string('password')->after('email')->nullable(); // Add the password column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bvn_modifications', function (Blueprint $table) {
            $table->dropColumn(['email', 'password']);
        });
    }
};
