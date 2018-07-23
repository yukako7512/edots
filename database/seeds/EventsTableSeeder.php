<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
        [
          'id' => 1,
          'title' => 'initialpoints',
          'user_id' => 1,
          'category' => 'Initialpoints',
          'content' => 'getting initialpoints',
          'date' => '2018/07/21 15:00:00',
          'place' => 'Nicotama',
          'point' => 1000,
          'status' => 'ongoing',
          'max_capacity' => 1000
        ],
      ]);
    }
}
