<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Issue;
use App\Models\Article;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ThemeSeeder::class,
            SubscriptionSeeder::class,
            ArticleSeeder::class,
            IssueSeeder::class,
            HistorySeeder::class,
            RatingSeeder::class,
            ConversationSeeder::class,
        ]);
         // Attach random articles to issues
         $issues = Issue::all();
         $articles = Article::all();
 
         foreach ($issues as $issue) {
             $randomArticles = $articles->random(8); // Attach 5 random articles per issue
             $issue->articles()->attach($randomArticles->pluck('id'));
         }
    }
}
