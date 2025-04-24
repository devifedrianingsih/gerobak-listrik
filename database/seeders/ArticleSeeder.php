<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Article::create([
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'image' => $faker->imageUrl(640, 480, 'articles', true, 'Article'),
                'date_time_of_publication' => $faker->dateTimeBetween('-1 years', 'now'),
                'category_article' => $faker->randomElement(['Tech', 'Health', 'Finance', 'Travel', 'Lifestyle']),
                'tags' => implode(',', $faker->words(3)),
                'author_id' => $faker->numberBetween(1, 3), // Pastikan author_id ini sesuai dengan data yang ada
                'views' => $faker->numberBetween(0, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
