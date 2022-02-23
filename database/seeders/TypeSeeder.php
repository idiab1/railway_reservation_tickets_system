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
        $types = [
            [
                "name" => 'First class',
            ],
            [
                "name" => 'Second class',
            ],
            [
                "name" => 'General class',
            ],
            [
                "name" => 'Sleeping class',
            ]
        ];

        foreach($types as $type){
            Type::create($type);
        }
    }
}
