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
        Schema::create('levels', function (Blueprint $table) {
            $table->charset('utf8');
            $table->collation('utf8_general_ci');
            $table->id()->unique();
            $table->foreignId('user_id')->constrained('login_users')->onDelete('cascade');
            $table->foreignId('whom_id')->constrained('login_users')->onDelete('cascade');
            $table->integer('level')->length(2)->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->integer('status')->length(2)->default(1)->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
