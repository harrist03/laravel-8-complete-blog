<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if posts already exist
        if (Post::count() > 0) {
            $this->command->info('Posts table already has data. Skipping post seeding.');
            return;
        }

        $posts = [
            [
                'slug' => 'how-to-stay-in-control-when-gambling',
                'title' => 'How to Stay in Control When Gambling',
                'description' => "Gambling is more than just luck—it's a mix of psychology, strategy, and risk. This article explores why people gamble, the thrill of winning, the dangers of addiction, and tips for responsible betting. Whether you're a casual player or a seasoned gambler, understanding the psychology behind gambling can help you make smarter decisions and enjoy the experience responsibly.",
                'image_path' => '67dd636d3cae0-How to Stay in Control When Gambling.jpg',
                'created_at' => '2025-03-21 13:02:37',
                'updated_at' => '2025-03-23 14:00:35',
                'user_id' => 1,
                'category_id' => 2,
                'views' => 13,
                'likes' => 3
            ],
            [
                'slug' => 'the-house-always-wins',
                'title' => 'The House Always Wins',
                'description' => "Have you ever heard the phrase, \"The house always wins\"? While it's true that casinos are designed to make a profit, understanding how they do it can help you make smarter gambling decisions. In this in-depth guide, we break down the concept of the house edge, the role of probability in different casino games, and the best strategies to improve your chances of winning.

Whether you're into poker, blackjack, roulette, or slot machines, this article will give you insights into how each game works, the difference between luck and skill, and practical tips to play more strategically. 

While no system can guarantee a win, knowing the odds can help you make informed choices and get the most out of your gambling experience.",
                'image_path' => '67dd645d39266-The House Always Wins.png',
                'created_at' => '2025-03-21 13:06:37',
                'updated_at' => '2025-03-23 12:57:17',
                'user_id' => 1,
                'category_id' => 4,
                'views' => 25,
                'likes' => 4
            ],
            [
                'slug' => 'guide-to-casino-games-betting-and-winning-strategies',
                'title' => 'Guide to Casino Games, Betting, and Winning Strategies',
                'description' => "Stepping into the world of gambling can be exciting yet overwhelming, especially for beginners. This comprehensive guide breaks down the basics of popular casino games like blackjack, poker, roulette, and slots, explaining their rules, odds, and the best strategies to increase your chances of winning. We also explore different types of betting, from sports wagering to online casinos, and provide essential tips on bankroll management, avoiding common mistakes, and gambling responsibly. Whether you're a newcomer or looking to refine your skills, this article will help you navigate the thrilling world of gambling with confidence.",
                'image_path' => '67dd672fe6cb8-Guide to Casino Games, Betting, and Winning Strategies.jpg',
                'created_at' => '2025-03-21 13:18:39',
                'updated_at' => '2025-03-21 13:27:13',
                'user_id' => 2,
                'category_id' => 1,
                'views' => 5,
                'likes' => 2
            ],
            [
                'slug' => 'mastering-poker-games-a-pro-s-thinking',
                'title' => "Mastering Poker Games, A Pro's Thinking",
                'description' => "Poker is more than just a game of luck—it's a battle of skill, strategy, and psychological warfare. Whether you're playing Texas Hold'em, Omaha, or Seven-Card Stud, understanding the fundamentals of poker can give you a competitive edge. This article explores key strategies, from bankroll management to bluffing techniques, as well as the importance of reading opponents and making mathematically sound decisions. We also take a look at the mental aspects of poker, the differences between live and online play, and tips from professional players. Whether you're a beginner or looking to refine your skills, this guide will help you elevate your poker game to the next level.",
                'image_path' => "67dd68676f1cb-Mastering Poker Games, A Pro's Thinking.jpg",
                'created_at' => '2025-03-21 13:23:51',
                'updated_at' => '2025-03-23 11:54:59',
                'user_id' => 3,
                'category_id' => 4,
                'views' => 10,
                'likes' => 3
            ],
            [
                'slug' => 'blackjack-secrets-how-to-beat-the-dealer',
                'title' => 'Blackjack Secrets, How to Beat the Dealer',
                'description' => "Blackjack is one of the few casino games where skill can tip the odds in your favor—if you know what you're doing. In this guide, we'll break down the fundamentals of blackjack, including the rules, card values, and essential strategies like basic strategy, card counting, and bankroll management. Learn how to minimize the house edge, spot dealer weaknesses, and avoid common mistakes that cost players money. Whether you're a casual gambler or serious about improving your game, this article will give you the knowledge and techniques to play smarter and increase your chances of walking away a winner.",
                'image_path' => '67dd68f005c69-Blackjack Secrets, How to Beat the Dealer.png',
                'created_at' => '2025-03-21 13:26:08',
                'updated_at' => '2025-03-21 13:27:42',
                'user_id' => 3,
                'category_id' => 1,
                'views' => 4,
                'likes' => 1
            ],
            [
                'slug' => 'sports-betting-smarter-decision-thinking-and-maximize-profits',
                'title' => 'Sports Betting, Smarter Decision Thinking and Maximize Profits',
                'description' => "Sports betting is more than just picking your favorite team—it's about strategy, research, and understanding the odds. In this comprehensive guide, we'll break down how sports betting works, including moneylines, point spreads, parlays, and live betting. We'll explore essential strategies like bankroll management, value betting, and using analytics to make informed decisions. Plus, we'll debunk common betting myths and highlight the biggest mistakes that cost bettors money. Whether you're a casual fan looking to add excitement to the game or a serious bettor aiming for long-term success, this article will help you place smarter bets and increase your chances of winning.",
                'image_path' => '67df68ae95e6b-Sports Betting, Smarter Decision Thinking and Maximize Profits.jpg',
                'created_at' => '2025-03-23 01:49:34',
                'updated_at' => '2025-03-23 12:57:40',
                'user_id' => 1,
                'category_id' => 3,
                'views' => 1,
                'likes' => 0
            ],
            [
                'slug' => 'how-to-enjoy-betting-without-losing-control',
                'title' => 'How to Enjoy Betting Without Losing Control',
                'description' => "Gambling can be an exciting and entertaining activity, but without the right approach, it can also lead to financial and emotional stress. In this guide, we explore the principles of responsible gambling, including setting limits, managing your bankroll, recognizing the signs of problem gambling, and knowing when to walk away. We'll also discuss tools and resources available to help players stay in control, such as self-exclusion programs and gambling addiction support services. Whether you gamble for fun or as a hobby, understanding responsible gambling practices ensures that you can enjoy the experience without unnecessary risks.",
                'image_path' => '67df6942a7181-How to Enjoy Betting Without Losing Control.png',
                'created_at' => '2025-03-23 01:52:02',
                'updated_at' => '2025-03-23 12:57:37',
                'user_id' => 4,
                'category_id' => 2,
                'views' => 3,
                'likes' => 0
            ],
            [
                'slug' => 'betting-on-horses-a-beginner-s-guide-to-winning',
                'title' => "Betting on Horses, A Beginner's Guide to Winning",
                'description' => "Horse racing has been a favorite betting sport for centuries, offering excitement, strategy, and the potential for big wins. But understanding how to bet on horses goes beyond simply picking a favorite. In this guide, we'll cover the basics of horse racing betting, including different bet types like win, place, and exacta, as well as strategies for analyzing odds, track conditions, and horse performance. We'll also explore bankroll management and responsible betting practices to help you make smarter wagers. Whether you're new to horse racing or looking to refine your approach, this article will give you the knowledge to bet with confidence.",
                'image_path' => "67dfeafde63f9-Betting on Horses, A Beginner's Guide to Winning.jpg",
                'created_at' => '2025-03-23 11:05:33',
                'updated_at' => '2025-03-23 13:57:39',
                'user_id' => 3,
                'category_id' => 3,
                'views' => 14,
                'likes' => 1
            ],
        ];

        // Create sample-images directory if it doesn't exist
        if (!file_exists(resource_path('sample-images'))) {
            mkdir(resource_path('sample-images'), 0755, true);
            $this->command->info('Created sample-images directory in resources folder.');
        }

        // Create placeholder images for categories
        $this->createPlaceholderImages();

        // Copy the sample post images to the public directory if they don't exist
        foreach ($posts as $post) {
            $placeholderPath = public_path('assets/placeholders/category-' . $post['category_id'] . '.jpg');
            $destPath = public_path('images/' . $post['image_path']);
            
            // Create directories if they don't exist
            if (!file_exists(public_path('images'))) {
                mkdir(public_path('images'), 0755, true);
            }
            
            if (!file_exists($destPath)) {
                // Try sample image first
                $sourcePath = resource_path('sample-images/' . basename($post['image_path']));
                if (file_exists($sourcePath)) {
                    copy($sourcePath, $destPath);
                } 
                // Fall back to placeholder if sample doesn't exist
                else if (file_exists($placeholderPath)) {
                    copy($placeholderPath, $destPath);
                    $this->command->info("Used placeholder for: {$post['title']}");
                }
                else {
                    $this->command->warn("No image found for: {$post['title']}");
                }
            }
        }

        // Insert all posts
        foreach ($posts as $postData) {
            Post::create($postData);
        }

        $this->command->info('Posts seeded successfully: ' . count($posts) . ' posts created.');
    }

    /**
     * Create placeholder images for posts based on category
     */
    private function createPlaceholderImages()
    {
        // Create assets/placeholders directory if it doesn't exist
        if (!file_exists(public_path('assets/placeholders'))) {
            mkdir(public_path('assets/placeholders'), 0755, true);
        }
        
        // Category colors
        $colors = [
            1 => '#3498db', // Betting Strategies - Blue
            2 => '#e74c3c', // Responsible Gambling - Red
            3 => '#2ecc71', // Sports Analysis - Green
            4 => '#f39c12'  // Casino Games - Orange
        ];
        
        $categoryNames = [
            1 => 'Betting Strategies',
            2 => 'Responsible Gambling',
            3 => 'Sports Analysis',
            4 => 'Casino Games'
        ];
        
        // Create a placeholder for each category
        foreach ($colors as $categoryId => $color) {
            $filename = public_path("assets/placeholders/category-{$categoryId}.jpg");
            
            if (!file_exists($filename)) {
                // Create a simple colored image
                $image = imagecreatetruecolor(800, 600);
                
                // Convert hex color to RGB
                list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
                $background = imagecolorallocate($image, $r, $g, $b);
                $white = imagecolorallocate($image, 255, 255, 255);
                
                // Fill background
                imagefill($image, 0, 0, $background);
                
                // Add text
                $text = $categoryNames[$categoryId];
                $font = 5; // Built-in font
                
                // Center the text
                $textWidth = imagefontwidth($font) * strlen($text);
                $textHeight = imagefontheight($font);
                $centerX = (800 - $textWidth) / 2;
                $centerY = (600 - $textHeight) / 2;
                
                imagestring($image, $font, $centerX, $centerY, $text, $white);
                imagestring($image, 3, $centerX, $centerY + 30, "Gambling Blog Placeholder", $white);
                
                // Save the image
                imagejpeg($image, $filename, 90);
                imagedestroy($image);
                
                $this->command->info("Created placeholder image for {$text}");
            }
        }
    }
}