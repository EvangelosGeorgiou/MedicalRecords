<?php

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
        $this->call(ICDcodeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PatientsSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(DietSeeder::class);
        $this->call(HabitsSeeder::class);
        $this->call(ImmunizationSeeder::class);
        $this->call(FamilyHistorySeeder::class);
        $this->call(DiseasesSeeder::class);
        $this->call(DisordersSeeder::class);
        $this->call(AllergiesSeeder::class);
        $this->call(VisitHistorySeeder::class);
        $this->call(DoctorSpecialitySeeder::class);
        $this->call(BodyPartsSeeder::class);
    }
}
