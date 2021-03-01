<?php

use Illuminate\Database\Seeder;

class DoctorSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DoctorSpeciality::class, 9)->create();
    }
}
