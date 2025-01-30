<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@techhorizons.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'role' => 'editor',
                'image' => 'uploads/profile_pictures/1738176015.jpg',
            ]
        );

        // Manager: Fouad
        User::updateOrCreate(
            ['email' => 'fouad@techhorizons.com'],
            [
                'name' => 'fouad',
                'password' => bcrypt('password'),
                'role' => 'manager',
                'manager_of_theme' => 1,
                'image' => 'uploads/profile_pictures/fouad.jpg',
            ]
        );

        // Manager: Anas
        User::updateOrCreate(
            ['email' => 'anas@techhorizons.com'],
            [
                'name' => 'Anas',
                'password' => bcrypt('password'),
                'role' => 'manager',
                'manager_of_theme' => 2,
                'image' => 'uploads/profile_pictures/anas.jpg',
            ]
        );

        // Manager: Ayman
        User::updateOrCreate(
            ['email' => 'ayman@techhorizons.com'],
            [
                'name' => 'ayman',
                'password' => bcrypt('password'),
                'role' => 'manager',
                'manager_of_theme' => 3,
                'image' => 'uploads/profile_pictures/ayman.jpg',
            ]
        );

        // Manager: Ilyas
        User::updateOrCreate(
            ['email' => 'ilyas@techhorizons.com'],
            [
                'name' => 'ilyas',
                'password' => bcrypt('password'),
                'role' => 'manager',
                'manager_of_theme' => 4,
                'image' => 'uploads/profile_pictures/ilyas.jpg',
            ]
        );

        // Subscriber: Charlie Davis
        User::updateOrCreate(
            ['email' => 'charlie@techhorizons.com'],
            [
                'name' => 'Charlie Davis',
                'password' => bcrypt('password'),
                'role' => 'subscriber',
                'image' => 'uploads/profile_pictures/default-image.jpg',
            ]
        );

        // Subscriber: David Wilson
        User::updateOrCreate(
            ['email' => 'david@techhorizons.com'],
            [
                'name' => 'David Wilson',
                'password' => bcrypt('password'),
                'role' => 'subscriber',
                'image' => 'uploads/profile_pictures/default-image.jpg',
            ]
        );

        // Subscriber: Emily White
        User::updateOrCreate(
            ['email' => 'emily@techhorizons.com'],
            [
                'name' => 'Emily White',
                'password' => bcrypt('password'),
                'role' => 'subscriber',
                'image' => 'uploads/profile_pictures/default-image.jpg',
            ]
        );

        // Subscriber: Frank Green
        User::updateOrCreate(
            ['email' => 'frank@techhorizons.com'],
            [
                'name' => 'Frank Green',
                'password' => bcrypt('password'),
                'role' => 'subscriber',
                'image' => 'uploads/profile_pictures/default-image.jpg',
            ]
        );

        // Subscriber: Grace Taylor
        User::updateOrCreate(
            ['email' => 'grace@techhorizons.com'],
            [
                'name' => 'Grace Taylor',
                'password' => bcrypt('password'),
                'role' => 'subscriber',
                'image' => 'uploads/profile_pictures/default-image.jpg',
            ]
        );

        // Subscriber: Helen Moore
        User::updateOrCreate(
            ['email' => 'helen@techhorizons.com'],
            [
                'name' => 'Helen Moore',
                'password' => bcrypt('password'),
                'role' => 'subscriber',
                'image' => 'uploads/profile_pictures/default-image.jpg',
            ]
        );
    }
}
