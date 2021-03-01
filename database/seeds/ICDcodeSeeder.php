<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\ExcelImport;

class ICDcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Excel::import(new ExcelImport,'CSV\icd_code.xlsx');



        // if($data->count() > 0){
        //     foreach($data->toArray() as $key => $value){
        //         foreach($value as $row){
        //             $insert_data[] = array(
        //                 'icd_code' => $row['icd_code'],
        //                 'name' => $row['name']
        //             );
        //         }
        //     }

        //     if(!empty($insert_data)){
        //         DB::table('i_c_d__c_o_d_e_s')->insert($insert_data);
        //     }
        // }
    }
}
