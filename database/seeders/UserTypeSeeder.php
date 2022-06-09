<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

const PREDEFINED_TYPES = [
    'Administrador',
    'Dentista',
    'Asistente'
];

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(PREDEFINED_TYPES as $type) {
            UserType::create(["type" => $type]);
        }
    }
}
