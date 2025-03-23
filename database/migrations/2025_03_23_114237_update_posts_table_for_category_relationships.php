<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Post;

class UpdatePostsTableForCategoryRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Add the category_id column (nullable at first)
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('user_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        // 2. Check if we need to migrate existing data
        if (Schema::hasColumn('posts', 'category')) {
            // Get all categories for mapping
            $categories = Category::all()->pluck('id', 'name')->toArray();
            
            // Simplify category names for more reliable matching
            $simplifiedCategories = [];
            foreach ($categories as $name => $id) {
                $simplifiedName = strtolower(trim($name));
                $simplifiedCategories[$simplifiedName] = $id;
            }

            // Process all posts
            $posts = Post::whereNotNull('category')->get();
            foreach ($posts as $post) {
                // Normalize the category name for comparison
                $categoryName = strtolower(trim($post->category));
                
                // Try to find a matching category
                if (isset($simplifiedCategories[$categoryName])) {
                    $post->category_id = $simplifiedCategories[$categoryName];
                    $post->save();
                }
            }

            // 3. Remove the old category column
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 1. Add the category column back
        Schema::table('posts', function (Blueprint $table) {
            $table->string('category')->nullable()->after('user_id');
        });

        // 2. Migrate data back if category_id exists
        if (Schema::hasColumn('posts', 'category_id')) {
            $posts = Post::whereNotNull('category_id')->get();
            foreach ($posts as $post) {
                if ($post->category) {
                    $post->category = $post->category->name;
                    $post->save();
                }
            }
        }

        // 3. Remove the category_id column
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}