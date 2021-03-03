<?php

use App\BodyParts;
use Illuminate\Database\Seeder;

class BodyPartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Male muscles: shoulders, Triceps,biceps,forearm,chest,hamstring,quats,calves
        //Female muscles: shoulders,triceps,biceps,forearm,chest,hamstring,quats,calves
        // Male organs, male skeleton, female skeleto: en eshi wrist
        $bodyParts = [
            'Skull', 'Teeth Top', 'Teeth Bottom', 'Jaw', 'Spine', 'Clavicle Left', 'Clavivle Right', 'Scapula Left', 'Scapula Right', 'Humerus Left', 'Humerus Right', 'Radius Left', 'Radius Right', 'Ulna Left', 'Ulna Right',
            'Palm Left','Palm Right', 'Ribs', 'Sternum', 'Pelvic', 'Thigh Left', 'Thigh Right', 'Knee Left', 'Knee Right', 'Fibula Right', 'Fibula Left', 'Tibia Right', 'Tibia Left', 'Foot Left', 'Foot Right','Left Wrist','Right Wrist',

            'Brain','Eye Left','Eye Right','Lungs','Heart','Stomach','Liver','Pancreas','Kidney' ,'Large Intestine' ,'Small Instestine' ,'Urinary' ,'Pelvic' ,

            'Head', 'Neck', 'Traps', 'Lats', 'Rhomboid', 'Left Shoulder', 'Right Shoulder', 'Left Tricep', 'Right Tricep', 'Left Bicep', 'Right Bicep', 'Left Forearm', 'Right Foream', 'Chest',
            'Abs', 'Glutens', 'Abductors', 'Left Hamstring', 'Right Hamstring', 'Left Quad', 'Right Quad', 'Left Calves', 'Right Calves', '', '', '', '',
        ];

        foreach($bodyParts as $part){
            BodyParts::create([
                'name' => $part
            ]);
        }
    }
}