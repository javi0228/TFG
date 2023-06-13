<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->insert([
            'name'=>'Dr. Rodríguez',
            'surname'=>'Gómez',
            'birthday'=>'1990-03-23',
            'specialism'=>'Cardiología',
            'phone'=>'689341203',
            'years_of_experience'=>10,
            'image'=>'1.jpg',
            'hospital_id'=>1
        ]);

        DB::table('doctors')->insert([
            'name'=>'Dr. Martinez',
            'surname'=>'Hernandez',
            'birthday'=>'1995-11-23',
            'specialism'=>'Pediatría',
            'phone'=>'681237290',
            'years_of_experience'=>8,
            'image'=>'2.jpg',
            'hospital_id'=>2
        ]);

        DB::table('doctors')->insert([
            'name'=>'Dr. López',
            'surname'=>'Pérez',
            'birthday'=>'1980-07-12',
            'specialism'=>'Oftalmología',
            'phone'=>'678141650',
            'years_of_experience'=>12,
            'image'=>'3.jpg',
            'hospital_id'=>3
        ]);

        DB::table('doctors')->insert([
            'name'=>'Dra. Sánchez',
            'surname'=>'González',
            'birthday'=>'1978-08-07',
            'specialism'=>'Dermatología',
            'phone'=>'689341203',
            'years_of_experience'=>6,
            'image'=>'4.png',
            'hospital_id'=>4
        ]);

        DB::table('doctors')->insert([
            'name'=>'Dr. Romero',
            'surname'=>'Pérez',
            'birthday'=>'1970-01-21',
            'specialism'=>'Ginecología',
            'phone'=>'672379013',
            'years_of_experience'=>4,
            'image'=>'5.jpg',
            'hospital_id'=>5
        ]);
    }
}