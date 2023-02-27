<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use  App\Models\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newBooks = new Book();
            $newBooks->title = $faker->unique()->word();
            $newBooks->author = $faker->name();
            $newBooks->description = $faker->paragraph();
            $newBooks->genre = $faker->word();
            $newBooks->price = $faker->numberBetween(1,100);
            $newBooks->cover_image = $faker->unique()->imageUrl();
            $newBooks->publication_date = $faker->date();
            $newBooks->save();
        }
    }
}
