<?php

use Illuminate\Database\Seeder;

class VisitHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\VisitHistory::class, 20)->create();
    }
}
