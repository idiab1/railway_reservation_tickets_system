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
        $train = Train::create([
            'name' => 'train 25634',
            'depature_at' => '2022-02-07 01:24:46',
            'arrival_at' => '2022-02-07 04:30:00',
            'depature_station' => 'Cairo Station',
            'arrival_station' => 'Alexandria Station',
            'status' => 0,
            'seats_count' => 100,
            'train_type' => "General class",
            "price" => 25,
        ]);

        $train->stations()->attach([1, 2]);

    }
}
