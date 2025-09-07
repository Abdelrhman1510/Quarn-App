<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surahs')->insert([
        [
            'name_ar' => 'الفاتحة',
            'name_en' => 'Al-Fatihah',
            'order' => 1,
            'total_verses' => 7,
            'type' => 'مكية',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_ar' => 'البقرة',
            'name_en' => 'Al-Baqarah',
            'order' => 2,
            'total_verses' => 286,
            'type' => 'مدنية',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    }
}
