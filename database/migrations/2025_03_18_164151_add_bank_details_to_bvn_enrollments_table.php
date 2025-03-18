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
        Schema::table('bvn_enrollments', function (Blueprint $table) {

            $table->string('bvn', 11)->after('reason');
            $table->string('account_number', 10)->after('bvn');
            $table->string('account_name', 255)->after('account_number');
            $table->string('bank_name', 255)->after('account_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bvn_enrollments', function (Blueprint $table) {
            $table->dropColumn(['bvn', 'account_number', 'account_name', 'bank_name']);
        });
    }
};
