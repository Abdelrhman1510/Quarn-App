<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuranVerse;

class QuranVerseSeeder extends Seeder
{
    public function run()
    {
        // تحميل الملف JSON
        $json = file_get_contents(database_path('hafs_smart_v8.json'));
        
        // تحويل النص JSON لمصفوفة PHP
        $verses = json_decode($json, true);
        
        // إدخال كل آية في قاعدة البيانات
        foreach ($verses as $verse) {
            QuranVerse::updateOrCreate(
                ['id' => $verse['id']],  // لو عايز تتجنب التكرار
                [
                    'jozz' => $verse['jozz'],
                    'sura_no' => $verse['sura_no'],
                    'sura_name_en' => $verse['sura_name_en'],
                    'sura_name_ar' => $verse['sura_name_ar'],
                    'page' => $verse['page'],
                    'line_start' => $verse['line_start'],
                    'line_end' => $verse['line_end'],
                    'aya_no' => $verse['aya_no'],
                    'aya_text' => $verse['aya_text'],
                    'aya_text_emlaey' => $verse['aya_text_emlaey'],
                ]
            );
        }
    }
}
