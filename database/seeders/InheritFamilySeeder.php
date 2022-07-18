<?php

namespace Database\Seeders;

use App\Models\InheritFamily;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InheritFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InheritFamily::factory(20)->create();
    }
}
