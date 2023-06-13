<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medical_histories')->insert([
            'user_id'=>1,
            'emergency_phone'=>'672693562',
            'allergies'=>'Polen, Penicilina',
            'other_diseases'=>'ninguna',
            'diabetes'=>false,
            'cancer'=>false,
            'overweight'=>true,
            'epilepsy'=>true,
        ]);


        DB::table('medical_histories')->insert([
            'user_id'=>2,
            'emergency_phone'=>'672693562',
            'allergies'=>'Alergia al polen',
            'other_diseases'=>'Asma',
            'diabetes'=>false,
            'cancer'=>true,
            'overweight'=>false,
            'epilepsy'=>false,
        ]);

        DB::table('medical_histories')->insert([
            'user_id'=>3,
            'emergency_phone'=>'672693562',
            'allergies'=>'Nueces',
            'other_diseases'=>'ninguna',
            'diabetes'=>false,
            'cancer'=>false,
            'overweight'=>false,
            'epilepsy'=>true,
        ]);

        DB::table('medical_histories')->insert([
            'user_id'=>4,
            'emergency_phone'=>'672693562',
            'allergies'=>'Penicilina',
            'other_diseases'=>'ninguna',
            'diabetes'=>false,
            'cancer'=>false,
            'overweight'=>true,
            'epilepsy'=>true,
        ]);

        DB::table('medical_histories')->insert([
            'user_id'=>5,
            'emergency_phone'=>'672693562',
            'allergies'=>'Polen, Penicilina',
            'other_diseases'=>'ninguna',
            'diabetes'=>false,
            'cancer'=>false,
            'overweight'=>true,
            'epilepsy'=>true,
        ]);
    }
}
