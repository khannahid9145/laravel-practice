<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;

class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $students = collect([
        //     [
        //         'name'=>'nahid khan',
        //         'email'=>'nahidkhan@gmail.com'
        //     ],
        //     [
        //         'name'=>'amal khan',
        //         'email'=>'amalkhan@gmail.com'
        //     ],
        //     [
        //         'name'=>'maliha khan',
        //         'email'=>'malihakhan@gmail.com'
        //     ]
        //     ]
        //     );

        //     $students->each(function($student){
        //         student::insert($student);
        //     });

        // student::create([
        //     'name'=>'nahid khan',
        //     'email'=>'nahid123khan@gmail.com'
        // ]);
        for ($i = 0; $i < 10; $i++) {
            student::create([
                'name' => fake()->name(),
                'email' => fake()->email()
            ]);
        }
    }
}
