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
        Schema::create('manual_funding_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('tnx_id')->unique();
            $table->decimal('amount', 15, 2);
            $table->enum('type', ['transfer', 'bank_deposit']);
            $table->string('senders_bank', 255);
            $table->string('senders_name', 255);
            $table->date('date');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('manual_funding_request', function (Blueprint $table) {
            Schema::dropIfExists('manual_funding_request');
        });
    }
};
