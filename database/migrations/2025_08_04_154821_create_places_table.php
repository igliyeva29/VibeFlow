<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->ondelete('cascade');
            $table->foreignId('location_id')->constrained()->ondelete('cascade');
            $table->string('slug')->index();
            $table->string('name');
            $table->string('address');
            $table->string('title')->nullable();
            $table->string('title_tm')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('instagram_profile')->nullable();
            $table->string('tiktok_profile')->nullable();
            $table->string('image')->nullable();
            $table->string('map')->nullable();
            $table->integer('viewed')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
