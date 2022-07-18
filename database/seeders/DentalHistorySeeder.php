<?php

namespace Database\Seeders;

use App\Models\DentalHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DentalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DentalHistory::factory(20)->create();
        //factory(DentalHistory::class)->create();
        //DentalHistory::factory()->count(20)->create();
    }
}
