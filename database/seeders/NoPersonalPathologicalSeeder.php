<?php

namespace Database\Seeders;

use App\Models\NoPersonalPathological;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoPersonalPathologicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NoPersonalPathological::factory(20)->create();
    }
}
