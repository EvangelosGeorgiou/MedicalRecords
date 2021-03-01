<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        foreach($collection as $key => $value){
            if($key>0){
                // dd($key,$value);
                DB::table('i_c_d__c_o_d_e_s')->insert([
                    'icd_code' => $value[0],
                    'name' => $value[1],
                ]);
            }
        }
    }
}
