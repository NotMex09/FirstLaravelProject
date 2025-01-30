<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    public function run()
    {
        History::create([
            'user_id' => 2, // John Doe
            'article_id' => 1, // The Future of AI in Healthcare
            'viewed_at' => now(),
        ]);

        History::create([
            'user_id' => 3, // Jane Smith
            'article_id' => 3, // Cybersecurity Threats in 2023
            'viewed_at' => now(),
        ]);
    }
}
