<?php

namespace Database\Seeders;

use App\Models\Plans;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                "title" => 'Premium Plan',
                "identifier" =>  'premium',
                "stripe_id" => 'price_1LNR37DwgXWB6jTg6Tf4hPWZ'
            ],
            [
                "title" => 'Basic Plan',
                "identifier" =>  'Basic',
                "stripe_id" => 'price_1LNR1zDwgXWB6jTglTbzx17q'
            ],
        ];

        foreach($plans as $plan){
            Plans::create($plan);
        }

    }
}
