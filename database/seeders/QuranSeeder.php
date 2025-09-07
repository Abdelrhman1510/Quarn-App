<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Verse;
use App\Models\Surah;

class QuranSeeder extends Seeder
{
    public function run(): void
    {
        $quranData     = json_decode(file_get_contents(database_path('quran_en.json')), true);
        $tafseerDataAr = json_decode(file_get_contents(database_path('ar-tafsir-ibn-kathir.json')), true);
        $tafseerDataEn = json_decode(file_get_contents(database_path('en-tafisr-ibn-kathir.json')), true); // ملف التفسير الإنجليزي

        foreach ($quranData as $surahData) {
            $surah = Surah::create([
                'name_ar'      => $surahData['name'],
                'name_en'      => $surahData['transliteration'],
                'order'        => $surahData['id'],
                'total_verses' => $surahData['total_verses'],
                'type'         => $surahData['type']
            ]);

            foreach ($surahData['verses'] as $verse) {
                $key = $surahData['id'] . ':' . $verse['id'];

                // --- التفسير العربي ---
                $tafseerAr = null;
                if (isset($tafseerDataAr[$key]['text'])) {
                    $tafseerAr = strip_tags($tafseerDataAr[$key]['text'], '<p><br>');
                    $tafseerAr = preg_replace('/\s+/', ' ', $tafseerAr);
                    $tafseerAr = trim($tafseerAr);
                }

                // --- التفسير الإنجليزي ---
                $tafseerEn = null;
               if (isset($tafseerDataEn[$key]['text'])) {
    // السماح بالوسوم الأساسية فقط
    $tafseerEn = strip_tags($tafseerDataEn[$key]['text'], '<p><br>');
    // إزالة أي خصائص HTML مثل class أو lang
    $tafseerEn = preg_replace('/<(\w+)[^>]*>/', '<$1>', $tafseerEn);
    // إزالة المسافات المكررة
    $tafseerEn = preg_replace('/\s+/', ' ', $tafseerEn);
    $tafseerEn = trim($tafseerEn);
}

                Verse::create([
    'surah_id'     => $surah->id,
    'verse_number' => $verse['id'],
    'text_ar'      => $verse['text'],
    'text_en'      => $verse['translation'] ?? null,
    'tafseer'      => $tafseerAr,
    'tafseer_en'   => $tafseerEn,
    'audio_url'    => "https://everyayah.com/data/Alafasy_64kbps/" 
                       . str_pad($surahData['id'], 3, '0', STR_PAD_LEFT) 
                       . str_pad($verse['id'], 3, '0', STR_PAD_LEFT) 
                       . ".mp3"
]);
            }
        }
    }
}
