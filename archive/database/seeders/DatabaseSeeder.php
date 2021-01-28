<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('events')->insert([
            [
                'event_name' => 'Apache 207 Tour',
                'event_year' => 2021
            ],
            [
                'event_name' => 'Balkan Circus',
                'event_year' => 2019
            ],
            [
                'event_name' => 'Third March',
                'event_year' => 2020,
                'description' => 'Bulgarian National Holiday'
            ],
            [
                'event_name' => 'Cinema under the Stars',
                'event_year' => 2020,
                'description' => 'Summer Cinema under the stars, watch different movies every evening at 8pm.'
            ],
            [
                'event_name' => 'Hills Of Rock',
                'event_year' => 2021,
                'description' => 'If you are a fan of rock, this event is just for you.'
            ]
        ]);

        DB::table('types')->insert([
            [
                'name' => 'Concert'
            ],
            [
                'name' => 'Circus'
            ],
            [
                'name' => 'Summer Cinema'
            ],
            [
                'name' => 'National Holiday'
            ]
        ]);

        DB::table('event_types')->insert([
            [
                'event_id' => 1,
                'type_id' => 1
            ],
            [
                'event_id' => 2,
                'type_id' => 2
            ],
            [
                'event_id' => 3,
                'type_id' => 4
            ],
            [
                'event_id' => 4,
                'type_id' => 3
            ],
            [
                'event_id' => 5,
                'type_id' => 1
            ]
        ]);
    }
}
