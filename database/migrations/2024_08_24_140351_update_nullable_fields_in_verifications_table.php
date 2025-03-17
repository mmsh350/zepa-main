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
        Schema::table('verifications', function (Blueprint $table) {
            $table->string('enrollment_branch')->nullable()->change();
            $table->string('enrollment_bank')->nullable()->change();
            $table->date('registration_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('verifications', function (Blueprint $table) {
            $table->string('enrollment_branch')->nullable(false)->change();
            $table->string('enrollment_bank')->nullable(false)->change();
            $table->date('registration_date')->nullable(false)->change();
        });
    }
};
