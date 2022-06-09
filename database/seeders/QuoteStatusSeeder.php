<?php

namespace Database\Seeders;

use App\Models\QuoteStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

const QUOTES_TYPES = [
    'Atendida',
    'Pendiente',
    'Reprogramada',
    'Cancelada'
];

class QuoteStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(QUOTES_TYPES as $type) {
            QuoteStatus::create(["type" => $type]);
        }
    }
}
