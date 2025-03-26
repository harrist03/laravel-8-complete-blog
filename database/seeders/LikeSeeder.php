<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if likes already exist
        if (Like::count() > 0) {
            $this->command->info('Likes table already has data. Skipping likes seeding.');
            return;
        }

        // Check if required data exists
        $postCount = Post::count();
        $userCount = User::count();

        if ($postCount == 0 || $userCount == 0) {
            $this->command->error('Posts and/or Users tables are empty. Please seed those first.');
            return;
        }

        // Define likes data from your SQL dump
        $likes = [
            [
                'post_id' => 2,
                'user_id' => 2,
                'created_at' => '2025-03-21 13:07:36',
                'updated_at' => '2025-03-21 13:07:36',
            ],
            [
                'post_id' => 1,
                'user_id' => 2,
                'created_at' => '2025-03-21 13:16:12',
                'updated_at' => '2025-03-21 13:16:12',
            ],
            [
                'post_id' => 2,
                'user_id' => 3,
                'created_at' => '2025-03-21 13:24:02',
                'updated_at' => '2025-03-21 13:24:02',
            ],
            [
                'post_id' => 1,
                'user_id' => 3,
                'created_at' => '2025-03-21 13:24:10',
                'updated_at' => '2025-03-21 13:24:10',
            ],
            [
                'post_id' => 3,
                'user_id' => 3,
                'created_at' => '2025-03-21 13:24:15',
                'updated_at' => '2025-03-21 13:24:15',
            ],
            [
                'post_id' => 7,
                'user_id' => 4,
                'created_at' => '2025-03-21 13:27:01',
                'updated_at' => '2025-03-21 13:27:01',
            ],
            [
                'post_id' => 6,
                'user_id' => 4,
                'created_at' => '2025-03-21 13:27:09',
                'updated_at' => '2025-03-21 13:27:09',
            ],
            [
                'post_id' => 3,
                'user_id' => 4,
                'created_at' => '2025-03-21 13:27:13',
                'updated_at' => '2025-03-21 13:27:13',
            ],
            [
                'post_id' => 2,
                'user_id' => 4,
                'created_at' => '2025-03-21 13:27:16',
                'updated_at' => '2025-03-21 13:27:16',
            ],
            [
                'post_id' => 1,
                'user_id' => 4,
                'created_at' => '2025-03-21 13:27:21',
                'updated_at' => '2025-03-21 13:27:21',
            ],
            [
                'post_id' => 6,
                'user_id' => 1,
                'created_at' => '2025-03-21 13:28:18',
                'updated_at' => '2025-03-21 13:28:18',
            ],
            [
                'post_id' => 2,
                'user_id' => 1,
                'created_at' => '2025-03-21 13:28:50',
                'updated_at' => '2025-03-21 13:28:50',
            ],
            [
                'post_id' => 6,
                'user_id' => 3,
                'created_at' => '2025-03-23 11:54:50',
                'updated_at' => '2025-03-23 11:54:50',
            ],
            [
                'post_id' => 11,
                'user_id' => 1,
                'created_at' => '2025-03-23 13:57:39',
                'updated_at' => '2025-03-23 13:57:39',
            ],
        ];

        $successCount = 0;
        $errorCount = 0;
        
        // Insert likes, but handle possible issues with invalid post_id or user_id gracefully
        foreach ($likes as $likeData) {
            try {
                // Verify the post and user exist
                $postExists = Post::where('id', $likeData['post_id'])->exists();
                $userExists = User::where('id', $likeData['user_id'])->exists();
                
                if (!$postExists) {
                    $this->command->warn("Post with ID {$likeData['post_id']} not found. Skipping like.");
                    $errorCount++;
                    continue;
                }
                
                if (!$userExists) {
                    $this->command->warn("User with ID {$likeData['user_id']} not found. Skipping like.");
                    $errorCount++;
                    continue;
                }
                
                // Create the like using firstOrCreate to prevent duplicates
                Like::firstOrCreate(
                    [
                        'post_id' => $likeData['post_id'], 
                        'user_id' => $likeData['user_id']
                    ],
                    [
                        'created_at' => $likeData['created_at'],
                        'updated_at' => $likeData['updated_at']
                    ]
                );
                
                $successCount++;
            } catch (\Exception $e) {
                $this->command->error("Error creating like: {$e->getMessage()}");
                $errorCount++;
            }
        }

        // Also update the like counts on the posts
        $this->updatePostLikeCounts();

        $this->command->info("Likes seeded successfully: {$successCount} likes created.");
        
        if ($errorCount > 0) {
            $this->command->warn("{$errorCount} likes were skipped due to missing posts or users.");
        }
    }

    /**
     * Update the 'likes' count on each post to match the actual number of likes
     */
    private function updatePostLikeCounts()
    {
        $posts = Post::all();
        
        foreach ($posts as $post) {
            // Count the number of likes for this post
            $likeCount = Like::where('post_id', $post->id)->count();
            
            // Update the post's likes count
            $post->likes = $likeCount;
            $post->save();
        }
        
        $this->command->info("Updated like counts on all posts.");
    }
}