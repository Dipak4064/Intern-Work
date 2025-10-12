<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Citie;
use Illuminate\support\Facades\File;

class CitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database\json\city.json');
        $data = collect(json_decode($json));
        $data->each(function ($item) {
            Citie::create([
                'city_name' => $item->city
            ]);
        });
    }
}
