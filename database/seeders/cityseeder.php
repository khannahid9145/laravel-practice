<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\city;

class cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //    city::created([
    //     'name'=>'nahid khan',
    //     'email'=>'nahid123khan@gmail.com'
    //    ]);

    for ($i = 0; $i < 10; $i++) {
        city::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'city' => fake()->name(),
            'gender' => fake()->name(),
            'area' => fake()->name()
        ]);
    }
    }
}
