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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_post_id')->nullable(); 
            $table->foreign('fk_post_id')->references('id')->on('posts')
                  ->onDelete('cascade') 
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('fk_like_id')->nullable(); 
            $table->foreign('fk_like_id')->references('fk_post_id')->on('shares')
                ->onDelete('cascade') 
                ->onUpdate('cascade');
            $table->string('like_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
