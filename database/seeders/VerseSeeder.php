<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('verses')->insert([
        [
            'surah_id' => 1,
            'verse_number' => 1,
            'text_ar' => 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ',
            'text_en' => 'In the name of Allah, the Entirely Merciful, the Especially Merciful.',
            'tafseer' => 'ابتدأ الله كتابه باسم الله طلبًا للبركة...',
            'audio_url' => 'https://example.com/audio/1.mp3',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'surah_id' => 1,
            'verse_number' => 2,
            'text_ar' => 'الْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ',
            'text_en' => 'All praise is due to Allah, Lord of the worlds –',
            'tafseer' => 'الحمد هو الثناء على الله بجميع صفاته...',
            'audio_url' => 'https://example.com/audio/2.mp3',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);

    }
}
