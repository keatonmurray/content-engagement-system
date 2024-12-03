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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_user_id'); 
            $table->unsignedBigInteger('fk_post_id'); 

            $table->foreign('fk_user_id')->references('id')->on('users')
            ->onDelete('cascade') 
            ->onUpdate('cascade');

            $table->foreign('fk_post_id')->references('id')->on('posts')
            ->onDelete('cascade') 
            ->onUpdate('cascade');

            $table->string('comment_count');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
