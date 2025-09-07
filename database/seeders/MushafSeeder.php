<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MushafSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         for ($i = 1; $i <= 604; $i++) {
            $fileName = str_pad($i, 3, '0', STR_PAD_LEFT) . '.png';

            DB::table('mushaf_pages')->insert([
                'page_number' => $i,
                'image' => $fileName,
            ]);
        }
    }
}
