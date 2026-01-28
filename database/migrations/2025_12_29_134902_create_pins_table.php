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
        Schema::create('pins', function (Blueprint $table) {

            $table->charset('utf8');
            $table->collation('utf8_general_ci');
            $table->id()->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->string('pin_code', 50)->unique();
            $table->integer('is_used')->length(2)->default(0)->nullable();
            $table->foreignId('used_for')->constrained('users')->onDelete('cascade')->nullable();
            $table->timestamp('used_at')->nullable();
            $table->integer('status')->length(2)->default(0)->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};
