<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            [
                'name' => 'Cairo Station'
            ],
            [
                'name' => 'Alexandria Station'
            ],
            [
                'name' => 'Tanta Station'
            ],
            [
                'name' => 'El Mahalla El Kubra Station'
            ],
            [
                'name' => 'Mansoura Station'
            ],
            [
                'name' => 'Damietta Station'
            ],
            [
                'name' => 'Sidi Gaber Station'
            ],
            [
                'name' => 'Fayoum Station'
            ],
            [
                'name' => 'Aswan Station'
            ],
            [
                'name' => 'Qena Station'
            ],
            [
                'name' => 'Beni Suef Station'
            ],
            [
                'name' => 'Assiut Station'
            ],
            [
                'name' => 'Minya Station'
            ],
            [
                'name' => 'Sohag Station'
            ],
            [
                'name' => 'Luxor Station'
            ],
            [
                'name' => 'Suez Station'
            ],
            [
                'name' => 'Giza Station'
            ],
            [
                'name' => 'Damanhour Station'
            ],
            [
                'name' => 'Zagazig Station'
            ],
            [
                'name' => 'Ismailia Station'
            ],
            [
                'name' => 'Port Said Station'
            ],
            [
                'name' => 'Banha Station'
            ],
            [
                'name' => 'Marsa Matrouh Station'
            ],
        ];

        foreach($stations as $station){
            // Save in databases
            Station::create($station);
        }

    }
}
