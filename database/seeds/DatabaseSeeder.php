<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
    }
}


class FilmsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        DB::table('films')->delete();
        DB::table('films_genres')->delete();
        DB::table('films_comments')->delete();

        $genres = [
            'comedy',
            'fantastic',
            'thriller',
            'science',
            'historic',
            'romance',
            'animation',
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert(['name' => $genre]);
        }


        DB::table('films')->insert([
            'slug' => 'frozen-land',
            'name' => 'Frozen Land to animated movie',
            'description' => 'Frozen Land',
            'release_date' => '2005-01-14',
            'rating' => '4',
            'ticket_price' => '$9',
            'country' => 'USA',
            'photo_url' => '/xfilms-test/public/img/maxresdefault.jpg',
        ]);

        DB::table('films')->insert([
            'slug' => 'kiara-the-brave',
            'name' => 'kiara the brave',
            'description' => 'After her father evil brother takes him captive, a courageous princess sets out to rescue her father and restore him to the throne',
            'release_date' => '2011-10-20',
            'rating' => '5',
            'ticket_price' => '$5',
            'country' => 'USA',
            'photo_url' => '/xfilms-test/public/img/592564a51413.jpg',
        ]);

        DB::table('films')->insert([
            'slug' => 'wall-e',
            'name' => 'WALL-E',
            'description' => 'WALL-E is an exciting heroic adventure where a robot named WALL-E finds a new purpose of life',
            'release_date' => '2008-01-25',
            'rating' => '3',
            'ticket_price' => '$3',
            'country' => 'USA',
            'photo_url' => '/xfilms-test/public/img/1363697573.jpg',
        ]);

        $film1 = DB::table('films')->where('slug', '=', 'kiara-the-brave')->select('id')->first();
        $film2 = DB::table('films')->where('slug', '=', 'wall-e')->select('id')->first();
        $film3 = DB::table('films')->where('slug', '=', 'frozen-land')->select('id')->first();

        // Genres
        DB::table('films_genres')->insert(['film_id' => $film1->id, 'genre_id' => DB::table('genres')->where('name', '=', 'comedy')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film1->id, 'genre_id' => DB::table('genres')->where('name', '=', 'thriller')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film2->id, 'genre_id' => DB::table('genres')->where('name', '=', 'comedy')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film2->id, 'genre_id' => DB::table('genres')->where('name', '=', 'fantastic')->select(['id'])->first()->id]);
        DB::table('films_genres')->insert(['film_id' => $film3->id, 'genre_id' => DB::table('genres')->where('name', '=', 'animation')->select(['id'])->first()->id]);

        //Comments
        DB::table('films_comments')->insert(['film_id' => $film1->id, 'author_name' => 'xxss sss', 'comment_body' => 'Nice film about me =)']);
        DB::table('films_comments')->insert(['film_id' => $film2->id, 'author_name' => 'You Smith', 'comment_body' => 'It`s great, want to review it forever']);
        DB::table('films_comments')->insert(['film_id' => $film3->id, 'author_name' => 'awddd ', 'comment_body' => 'Are you ready, children?']);


    }

}