<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Some data
        $types = [
            [
                "name" => "General Class",
            ],
            [
                "name" => "First Class",
            ],
            [
                "name" => "Second Class",
            ],
            [
                "name" => "VIP Class",
            ],

        ];

        // Save these data to database
        foreach($types as $type){
            Type::create($type);
        }

    }
}
