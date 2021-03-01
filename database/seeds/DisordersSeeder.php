<?php

use Illuminate\Database\Seeder;

class DisordersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Disorders::class, 20)->create();
    }
}
