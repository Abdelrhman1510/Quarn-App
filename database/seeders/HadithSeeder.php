<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hadith;

class HadithSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run()
    {
        $files = glob(database_path('hadiths/*.json'));

        foreach ($files as $file) {
            $json = file_get_contents($file);
            $hadiths = json_decode($json, true);

            foreach ($hadiths as $h) {
                Hadith::updateOrCreate(
                    [
                        'book' => $h['Book'],
                        'arabic_text' => $h['Arabic_Text'],
                    ],
                    [
                        'chapter_number'      => $h['Chapter_Number'] ?? null,
                        'chapter_title_ar'    => $h['Chapter_Title_Arabic'] ?? null,
                        'chapter_title_en'    => $h['Chapter_Title_English'] ?? null,
                        'english_text'        => $h['English_Text'] ?? null,
                        'grade'               => $h['Grade'] ?? null,
                        'reference'           => $h['Reference'] ?? null,
                        'in_book_reference'   => $h['In-book reference'] ?? null,
                    ]
                );
            }
        }
    }
}
