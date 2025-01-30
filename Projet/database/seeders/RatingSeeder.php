<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run()
    {
        Rating::create([
            'user_id' => 2, // John Doe
            'article_id' => 1, // The Future of AI in Healthcare
            'rating' => 5,
        ]);

        Rating::create([
            'user_id' => 3, // Jane Smith
            'article_id' => 3, // Cybersecurity Threats in 2023
            'rating' => 4,
        ]);

        Rating::create([
            'user_id' => 4, // Emily Johnson
            'article_id' => 5, // Machine Learning in Finance
            'rating' => 5,
        ]);

        Rating::create([
            'user_id' => 5, // Michael Brown
            'article_id' => 2, // The Rise of Quantum Computing
            'rating' => 3,
        ]);

        Rating::create([
            'user_id' => 6, // Sarah Lee
            'article_id' => 4, // Blockchain: The Future of Finance
            'rating' => 4,
        ]);

        Rating::create([
            'user_id' => 7, // William Davis
            'article_id' => 6, // The Impact of 5G on IoT
            'rating' => 2,
        ]);

        Rating::create([
            'user_id' => 8, // Olivia Miller
            'article_id' => 7, // Autonomous Vehicles: A New Era
            'rating' => 5,
        ]);

        Rating::create([
            'user_id' => 9, // James Wilson
            'article_id' => 8, // Renewable Energy Sources
            'rating' => 3,
        ]);

        Rating::create([
            'user_id' => 10, // Isabella Moore
            'article_id' => 9, // The Role of AI in Education
            'rating' => 4,
        ]);

        Rating::create([
            'user_id' => 11, // Daniel Taylor
            'article_id' => 10, // Cloud Computing: Future or Fad
            'rating' => 5,
        ]);
    }
}
