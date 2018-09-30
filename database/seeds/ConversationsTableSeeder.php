<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 300; $i++){
            DB::table('conversations')->insert([
                'conversation_id' => $faker->numberBetween(1, 20),
                'fb_page_id' => '1547987665312711',
                'type' => $faker->numberBetween(1,4),
                'date'=> $faker->dateTimeBetween('+1 week', '+1 month'),
                'conversation_status' => $faker->numberBetween(1,7),
                'avg_waiting_time' => $faker->numberBetween(500, 2000),
                'avg_processing_time' => $faker->numberBetween(50, 500)
            ]);
        }
    }
}
