<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class ClassOrTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'train_id' => 1,
                "class_name" => 'first class',
                'class_price' => '150',
                'seats_count' => '50',
            ],
            [
                'train_id' => 1,
                "class_name" => 'second class',
                'class_price' => '100',
                'seats_count' => '70',
            ],
            [
                'train_id' => 1,
                "class_name" => 'General class',
                'class_price' => '30',
                'seats_count' => '150',
            ],
        ];

        foreach($classes as $class){
            Type::create($class);
        }

    }
}
