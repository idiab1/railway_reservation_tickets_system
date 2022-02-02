<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Train::create([
            'name' => 'train 25634',
            'depature_time' => '2/2/2022',
            'arrival_time' => '2/2/2022',
            'station_id' => 1,
        ]);

    }
}
