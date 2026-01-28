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
        Schema::create('login_users', function (Blueprint $table) {
            $table->charset('utf8');
            $table->collation('utf8_general_ci');
            $table->id()->unique();
            $table->string('username', 20)->unique()->nullable();
            $table->string('sponsor', 20)->nullable();
            $table->string('position', 5)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->string('password')->nullable();
            $table->string('password1', 30)->nullable();
            $table->string('panno', 20)->nullable();
            $table->integer('state')->length(11)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('child', 20)->nullable();
            $table->longText('parent')->nullable();
            $table->integer('today_left')->length(11)->default(1)->nullable();
            $table->integer('today_right')->length(11)->default(1)->nullable();
            $table->integer('total_left')->length(11)->default(1)->nullable();
            $table->integer('total_right')->length(11)->default(1)->nullable();
            $table->integer('initial_stage')->length(2)->default(0)->nullable();
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
        Schema::dropIfExists('login_users');
    }
};
