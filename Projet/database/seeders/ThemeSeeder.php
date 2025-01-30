<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        Theme::create([
            'name' => 'Artificial Intelligence',
            'description' => 'Explore the latest advancements in AI.',
            'is_featured' => true,
            'manager_id'=>'2',
            'image' => 'themes/ai.jpg', // Assuming the image is stored in storage/app/public/themes/ai.jpg
        ]);

        Theme::create([
            'name' => 'Internet of Things',
            'description' => 'Discover how IoT is transforming industries.',
            'is_featured' => true,
            'manager_id'=>'3',
            'image' => 'themes/iot.jpg', // Assuming the image is stored in storage/app/public/themes/iot.jpg
        ]);

        Theme::create([
            'name' => 'Cybersecurity',
            'description' => 'Learn about the latest trends in cybersecurity.',
            'is_featured' => false,
            'manager_id'=>'4',
            'image' => 'themes/cybersecurity.jpg', // Assuming the image is stored in storage/app/public/themes/cybersecurity.jpg

        ]);

        Theme::create([
            'name' => 'Virtual Reality',
            'description' => 'Dive into the world of VR and AR technologies.',
            'is_featured' => true,
            'manager_id'=>'5',
            'image' => 'themes/vr.jpg', // Assuming the image is stored in storage/app/public/themes/vr.jpg

        ]);
    }
}
