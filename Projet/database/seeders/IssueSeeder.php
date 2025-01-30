<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueSeeder extends Seeder
{
    public function run()
    {
         // Temporarily disable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Issue::truncate();
        // Enable foreign key checks back
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Issue::create([
            'title' => 'Issue 1 - January 2025',
            'description' => 'The first issue of Tech Horizons, featuring AI and IoT.',
            'publication_date' => '2025-01-01',
            'is_public' => true,
            'image' => 'issues/issue1.jpg', // Assuming the image is stored in storage/app/public/themes/cybersecurity.jpg

        ]);

        Issue::create([
            'title' => 'Issue 2 - February 2023',
            'description' => 'The second issue of Tech Horizons, focusing on Cybersecurity.',
            'publication_date' => '2025-02-01',
            'is_public' => false,
            'image' => 'issues/issue2.jpg', // Assuming the image is stored in storage/app/public/themes/cybersecurity.jpg

        ]);
    }
}
