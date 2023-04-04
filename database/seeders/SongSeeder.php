<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            $song = new Song;
            $song->title = $faker->word();
            $song->album = $faker->word();
            $song->author = $faker->name();
            $song->editor = $faker->company();
            $song->length = $faker->numberBetween(120, 600);
            $song->poster = $faker->imageUrl(640, 480, 'music');
            $song->save();
        }
    }
}
