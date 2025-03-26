<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table with sample data.
     *
     * @return void
     */
    public function run()
    {
        // Check if users already exist
        if (User::count() > 0) {
            $this->command->info('Users table already has data. Skipping user seeding.');
            return;
        }

        // Use updateOrCreate to avoid duplicate entries
        User::updateOrCreate(
            ['email' => 'john@gmail.com'],
            [
                'name' => 'John Doe',
                'password' => '$2y$10$riIfPLcV9aMxsa8skaXObuD3j.ElbvW6f2enuEzQfGMQLVyxaDHNe',
                'remember_token' => 'UdwMNOomIllbC7qTwSlQ1wBYy6KxmLIvkhKuC72sKztQAYJnuVoxUQZkH2Uu',
                'created_at' => '2025-03-21 13:01:43',
                'updated_at' => '2025-03-21 13:01:43',
            ]
        );

        User::updateOrCreate(
            ['email' => 'nick@gmail.com'],
            [
                'name' => 'Nick Murphy',
                'password' => '$2y$10$JvevZqYgoK45.Q5uO.Sr1uOhRG6NaHXdf0uB/ZIFNJib0m7/gA9NC',
                'remember_token' => null,
                'created_at' => '2025-03-21 13:07:29',
                'updated_at' => '2025-03-21 13:07:29',
            ]
        );

        User::updateOrCreate(
            ['email' => 'ben@yahoo.com'],
            [
                'name' => 'Ben Mills',
                'password' => '$2y$10$.0IIh3rVExaiADl1Z3biYOTo0dJ2AGvtWjcrybFsZYuNO4qqKfIZW',
                'remember_token' => null,
                'created_at' => '2025-03-21 13:19:54',
                'updated_at' => '2025-03-21 13:19:54',
            ]
        );

        User::updateOrCreate(
            ['email' => 'amy@gmail.com'],
            [
                'name' => 'Amy',
                'password' => '$2y$10$A8k2BvWwwdpSkAXK4qsbS.V39sKacQyvHXfyY4DVMJrFSYjAwqyLO',
                'remember_token' => null,
                'created_at' => '2025-03-21 13:26:56',
                'updated_at' => '2025-03-21 13:26:56',
            ]
        );

        $this->command->info('Users seeded successfully:');
        $this->command->info('- john@gmail.com (John Doe)');
        $this->command->info('- nick@gmail.com (Nick Murphy)');
        $this->command->info('- ben@yahoo.com (Ben Mills)');
        $this->command->info('- amy@gmail.com (Amy)');
        $this->command->info('Note: These accounts use their original hashed passwords from your database.');
    }
}