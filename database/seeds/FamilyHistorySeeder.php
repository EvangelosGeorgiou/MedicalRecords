<?php

use Illuminate\Database\Seeder;

class FamilyHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FamilyHistory::class, 20)->create();
    }
}
