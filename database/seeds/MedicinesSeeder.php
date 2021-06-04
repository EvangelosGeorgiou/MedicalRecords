<?php

use App\Medicines;
use Illuminate\Database\Seeder;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicines = array('Nurofen','Panadol',
        'Sildenafil',
        'Fluconazole',
        'Metoclopramide',
        'Atorvastatin',
        'Hydrothiazine',
    'Remedol');

        foreach($medicines as $medicine){
            Medicines::create([
                'name' => $medicine
            ]);
        }
    }
}
