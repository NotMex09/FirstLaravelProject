<?php

namespace Database\Seeders;

use App\Models\Conversation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    public function run()
    {
        // Define the total number of conversations to generate
        $totalConversations = 50;

        // Define the range of article IDs, theme IDs, and user IDs
        $articleIds = range(1, 28); // 28 articles
        $themeIds = range(1, 4);   // 4 themes
        $userIds = range(1, 11);   // 11 users

        // Example messages pool
        $messages = [
            'This article is amazing! AI is truly the future.',
            'Great insights on cybersecurity trends!',
            'I found this article very informative.',
            'This is a must-read for everyone interested in this topic.',
            'I have some questions about the points raised here.',
            'Can you provide more details about this theme?',
            'Interesting perspective! I hadn’t thought of this before.',
            'This article changed the way I think about this subject.',
            'The examples provided here are very useful.',
            'Thank you for this well-written article.',
            'I strongly agree with the arguments made in this article.',
            'This topic is so relevant in today’s world.',
            'I wish more people would read this.',
            'This helped clarify my understanding of the topic.',
            'Looking forward to more articles like this!',
            'This sparked an interesting discussion with my friends.',
            'Very well researched and presented.',
            'Some points could have been elaborated further.',
            'This article aligns with my personal experiences.',
            'I learned so much from this.',
        ];

        // Create conversations
        for ($i = 0; $i < $totalConversations; $i++) {
            Conversation::create([
                'article_id' => $articleIds[array_rand($articleIds)], // Random article ID
                'user_id' => $userIds[array_rand($userIds)],         // Random user ID
                'theme_id' => $themeIds[array_rand($themeIds)],     // Random theme ID
                'message' => $messages[array_rand($messages)],      // Random message
            ]);
        }
    }
}
