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
        Schema::create('bvn_enrollments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('refno');
            $table->string('tnx_id');
            $table->string('wallet_id')->nullable();
            $table->enum('type', ['self', 'agent'])->default('self');
            $table->string('username');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('state');
            $table->string('lga');
            $table->longText('address');
            $table->enum('status', ['submitted', 'successful', 'rejected'])->default('submitted');
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bvn_enrollments');
    }
};
