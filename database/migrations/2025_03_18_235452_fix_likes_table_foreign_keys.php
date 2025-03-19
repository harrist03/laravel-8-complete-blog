<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixLikesTableForeignKeys extends Migration
{
    public function up()
    {
        // Drop the existing likes table if it exists
        Schema::dropIfExists('likes');
        
        // Recreate it with the correct column types
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            // Use unsigned integer for post_id to match posts.id
            $table->unsignedInteger('post_id');
            // when user is deleted, the likes will also be deleted
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // post_id is a foreign key, when a post is deleted, the likes will also be deleted
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            
            // Each user can only like a post once
            $table->unique(['user_id', 'post_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}