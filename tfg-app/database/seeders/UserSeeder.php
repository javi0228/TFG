<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'doctor_id' => 4,
                'name' => 'Sergio',
                'surname' => 'Dasí',
                'birthday' => new Carbon('03/01/2002'),
                'DNI' => '77863256E',
                'email' => 'sergio@gmail.com',
                'password' => Hash::make('sergio'),
                'image' => '1.png',
                'created_at' => Carbon::now(),//2023-06-9 16:19:34
                'updated_at' => Carbon::now(),// "
                
            ]
        );

        DB::table('users')->insert(
            [
                'doctor_id' => 1,
                'name' => 'Juan',
                'surname' => 'Perez',
                'birthday' => new Carbon('05/15/1990'),
                'DNI' => '12345678J',
                'email' => 'juan@gmail.com',
                'password' => Hash::make('juan'),
                'image' => '2.jpg',
                'created_at' => Carbon::now(),//2023-06-9 16:19:34
                'updated_at' => Carbon::now(),// "
                
            ]
        );

        DB::table('users')->insert(
            [
                'doctor_id' => 2,
                'name' => 'Maria',
                'surname' => 'Gonzalez',
                'birthday' => new Carbon('10/20/1992'),
                'DNI' => '98765432S',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('maria'),
                'image' => '3.jpg',
                'created_at' => Carbon::now(),//2023-06-9 16:19:34
                'updated_at' => Carbon::now(),// "
                
            ]
        );

        DB::table('users')->insert(
            [
                'doctor_id' => 3,
                'name' => 'Pedro',
                'surname' => 'López',
                'birthday' => new Carbon('03/08/1985'),
                'DNI' => '55555555E',
                'email' => 'pedro@gmail.com',
                'password' => Hash::make('pedro'),
                'image' => '4.jpg',
                'created_at' => Carbon::now(),//2023-06-9 16:19:34
                'updated_at' => Carbon::now(),// "
                
            ]
        );

        DB::table('users')->insert(
            [
                'doctor_id' => 4,
                'name' => 'Laura',
                'surname' => 'Sánchez',
                'birthday' => new Carbon('03/08/1985'),
                'DNI' => '11111111M',
                'email' => 'laura@gmail.com',
                'password' => Hash::make('laura'),
                'image' => '5.jpeg',
                'created_at' => Carbon::now(),//2023-06-9 16:19:34
                'updated_at' => Carbon::now(),// "
                
            ]
        );
    }
}