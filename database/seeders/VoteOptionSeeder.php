<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;
class VoteOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'name' => 'Ham',
                'description' => 'Very good',
            ],
            [
                'name' => 'Ham & Cheese',
                'description' => 'Cheesy',
            ],
            [
                'name' => 'Cheese & Pickle',
                'description' => 'Very nice',
            ],
            [
                'name' => 'Tuna',
                'description' => 'A fish',
            ],
        ];

        foreach ($options as $option) {
            Option::create($option);
        }
    }


}
