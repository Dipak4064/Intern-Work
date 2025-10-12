<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Customer::factory(3)->create();
        Order::factory(5)->create();
    }
}
