<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        Subscription::create([
            'user_id' => 1,
            'theme_id' => 1, // Artificial Intelligence
        ]);

        Subscription::create([
            'user_id' => 1,
            'theme_id' => 2, // Internet of Things
        ]);

        Subscription::create([
            'user_id' => 2,
            'theme_id' => 3, // Cybersecurity
        ]);

        Subscription::create([
            'user_id' => 2,
            'theme_id' => 4, // Cloud Computing
        ]);

        Subscription::create([
            'user_id' => 3,
            'theme_id' => 1, // Artificial Intelligence
        ]);

        Subscription::create([
            'user_id' => 3,
            'theme_id' => 4, // Cloud Computing
        ]);

        Subscription::create([
            'user_id' => 4,
            'theme_id' => 2, // Internet of Things
        ]);

        Subscription::create([
            'user_id' => 4,
            'theme_id' => 3, // Cybersecurity
        ]);

        Subscription::create([
            'user_id' => 5,
            'theme_id' => 1, // Artificial Intelligence
        ]);

        Subscription::create([
            'user_id' => 5,
            'theme_id' => 2, // Internet of Things
        ]);

        Subscription::create([
            'user_id' => 6,
            'theme_id' => 3, // Cybersecurity
        ]);

        Subscription::create([
            'user_id' => 6,
            'theme_id' => 4, // Cloud Computing
        ]);

        Subscription::create([
            'user_id' => 7,
            'theme_id' => 1, // Artificial Intelligence
        ]);

        Subscription::create([
            'user_id' => 7,
            'theme_id' => 3, // Cybersecurity
        ]);

        Subscription::create([
            'user_id' => 8,
            'theme_id' => 2, // Internet of Things
        ]);

        Subscription::create([
            'user_id' => 8,
            'theme_id' => 4, // Cloud Computing
        ]);

        Subscription::create([
            'user_id' => 9,
            'theme_id' => 1, // Artificial Intelligence
        ]);

        Subscription::create([
            'user_id' => 9,
            'theme_id' => 4, // Cloud Computing
        ]);

        Subscription::create([
            'user_id' => 10,
            'theme_id' => 2, // Internet of Things
        ]);

        Subscription::create([
            'user_id' => 10,
            'theme_id' => 3, // Cybersecurity
        ]);
    }
}
