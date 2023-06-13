<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hospitals')->insert([
            'name'=> 'Hospital Regional',
            'address'=> 'Calle Principal, 123',
            'phone'=> '951234567',
            'province'=> 'Malaga',
            'foundation_year'=> '1998',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Universitario',
            'address'=> 'Avenida Central, 456',
            'phone'=> '958765432',
            'province'=> 'Granada',
            'foundation_year'=> '1985',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Virgen del Rocío',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955432109',
            'province'=> 'Sevilla',
            'foundation_year'=> '1955',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Jaén',
            'address'=> 'Avenida Central, 789',
            'phone'=> '953210987',
            'province'=> 'Jaén',
            'foundation_year'=> '1963',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Córdoba',
            'address'=> 'Calle Principal, 456',
            'phone'=> '957654321',
            'province'=> 'Córdoba',
            'foundation_year'=> '1972',
        ]);
        

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Almería',
            'address'=> 'Avenida Central, 123',
            'phone'=> '950987654',
            'province'=> 'Almería',
            'foundation_year'=> '1980',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Huelva',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959876543',
            'province'=> 'Huelva',
            'foundation_year'=> '1968',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Cádiz',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959876543',
            'province'=> 'Cádiz',
            'foundation_year'=> '1968',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital del poniente',
            'address'=> 'Calle Principal, 789',
            'phone'=> '950123456',
            'province'=> 'Almería',
            'foundation_year'=> '1982',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital San Cecilio',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959876543',
            'province'=> 'Granada',
            'foundation_year'=> '1968',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Virgen de las Nieves',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959876543',
            'province'=> 'Granada',
            'foundation_year'=> '1968',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Infanta Elena',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959321098',
            'province'=> 'Huelva',
            'foundation_year'=> '1987',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de la Merced',
            'address'=> 'Calle Principal, 789',
            'phone'=> '956789012',
            'province'=> 'Cádiz',
            'foundation_year'=> '1973',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Universitario Reina Sofía',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959321098',
            'province'=> 'Córdoba',
            'foundation_year'=> '1987',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Juan Ramón Jiménez',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959321098',
            'province'=> 'Huelva',
            'foundation_year'=> '1987',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Málaga',
            'address'=> 'Calle Principal, 789',
            'phone'=> '959321098',
            'province'=> 'Málaga',
            'foundation_year'=> '1987',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Universitario Virgen Macarena',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Sevilla',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Algeciras',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Cádiz',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital General de Jerez',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Cádiz',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Torrecárdenas',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Almería',
            'foundation_year'=> '1974',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Costa del Sol',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Málaga',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Motril',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Granada',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Úbeda',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Jaen',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Baza',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Granada',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital Virgen del Puerto',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Cádiz',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Linares',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Jaén',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Antequera',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Málaga',
            'foundation_year'=> '1977',
        ]);

        DB::table('hospitals')->insert([
            'name'=> 'Hospital de Osuna',
            'address'=> 'Calle Principal, 789',
            'phone'=> '955678901',
            'province'=> 'Sevilla',
            'foundation_year'=> '1977',
        ]);
    }
}