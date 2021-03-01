<?php

use Illuminate\Database\Seeder;

class AllergiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Allergies::class, 20)->create();
    }
}
