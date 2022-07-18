<?php

namespace Database\Seeders;

use App\Models\PersonalPathological;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalPathologicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalPathological::factory(20)->create();
    }
}
