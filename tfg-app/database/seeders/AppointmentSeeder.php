<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointments')->insert([
            'user_id' => 1,
            'office' => '1',
            'cause' => 'Consulta de rutina',
            'diagnosis' => 'Resfriado común',
            'date' => '2023-06-15',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 1,
            'office' => '2',
            'cause' => 'Seguimiento postoperatorio',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-16',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 1,
            'office' => '3',
            'cause' => 'Control de medicación',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-17',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 2,
            'office' => '1',
            'cause' => 'Consulta de seguimiento',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-18',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 2,
            'office' => '2',
            'cause' => 'Evaluación preoperatoria',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-19',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 2,
            'office' => '3',
            'cause' => 'Control de medicación',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-20',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 3,
            'office' => '1',
            'cause' => 'Consulta de seguimiento',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-18',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 3,
            'office' => '2',
            'cause' => 'Evaluación preoperatoria',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-19',
        ]);

        DB::table('appointments')->insert([
            'user_id' => 3,
            'office' => '3',
            'cause' => 'Control de medicación',
            'diagnosis' => 'Correcto',
            'date' => '2023-06-20',
        ]);

    }
}