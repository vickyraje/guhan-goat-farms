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
        Schema::create('plans', function (Blueprint $table) {
            $table->charset('utf8');
            $table->collation('utf8_general_ci');
            $table->id()->unique();
            $table->string('name', 20)->unique();
            $table->double('amount', 15,2);
            $table->integer('dividend')->length(11);
            $table->json('amounts')->nullable();
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
        Schema::dropIfExists('plans');
    }
};
