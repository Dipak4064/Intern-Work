<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employe;
use Illuminate\support\Facades\File;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$student = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com'
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob.smith@example.com'
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie.brown@example.com'
            ]
        ];*/
        // Employe::create([
        //     'name' => 'John Doe',
        //     'email' => 'john.doe@example.com',
        // ]);
        /*
        foreach ($student as $key => $value) {
            Employe::create($value);
        } */

        $json = File::get(path: 'database/json/students.json');
        $student = collect(json_decode($json));
        $student->each(function ($item) {
            // Employe::create(
            //     [
            //         'name' => $item->name,
            //         'email' => $item->email
            //     ]
            // );
            for ($i = 0; $i < 10; $i++) {
                Employe::create(
                    [
                        'name' => fake()->name(),
                        'email' => fake()->unique()->email()
                    ]
                );
            }
        });

    }
}
