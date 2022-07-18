<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call([UsersTableSeeder::class]);

        $this->call([
            UserTypeSeeder::class,
            ConsumableSeeder::class,
            ExpenseHourSeeder::class,
            QuoteStatusSeeder::class,
            UserSeeder::class,
            DentistSeeder::class,
            /* PatientSeeder::class,
            InheritFamilySeeder::class,
            DentalHistorySeeder::class,
            NoPersonalPathologicalSeeder::class,
            PersonalPathologicalSeeder::class */
            //TypeMedicalHistorySeeder::class,
            //QuestionSeeder::class
        ]);
    }
}
