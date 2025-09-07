<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Azkar;
use Illuminate\Support\Facades\DB;

class AzkarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
            DB::table('azkars')->truncate();

        $json = file_get_contents(database_path('azkrar.json')); 
        $data = json_decode($json, true);

        // function لتنظيف النصوص
        $cleanContent = function ($text) {
            if (!$text) return null;

            $text = str_replace('\n', "\n", $text);  // \n → سطر جديد
            $text = trim($text, "\"' \n\r,");        // إزالة علامات تنصيص وفواصل

            return $text;
        };

        // function لتنظيف count
        $cleanCount = function ($value) {
            // لو فاضي أو مش رقم → خليه 1
            if (!$value || !is_numeric($value)) {
                return 1;
            }
            return (int) $value; // رجعه كعدد صحيح
        };

        foreach ($data as $category => $adhkarList) {
            foreach ($adhkarList as $dhikr) {
                if (isset($dhikr[0]) && is_array($dhikr[0])) {
                    foreach ($dhikr as $subDhikr) {
                        Azkar::create([
                            'category'    => $subDhikr['category'] ?? $category,
                            'content'     => $cleanContent($subDhikr['content'] ?? null),
                            'count'       => $cleanCount($subDhikr['count'] ?? null),
                            'description' => $cleanContent($subDhikr['description'] ?? null),
                            'reference'   => $cleanContent($subDhikr['reference'] ?? null),
                        ]);
                    }
                } else {
                    Azkar::create([
                        'category'    => $dhikr['category'] ?? $category,
                        'content'     => $cleanContent($dhikr['content'] ?? null),
                        'count'       => $cleanCount($dhikr['count'] ?? null),
                        'description' => $cleanContent($dhikr['description'] ?? null),
                        'reference'   => $cleanContent($dhikr['reference'] ?? null),
                    ]);
                }
            }
        }
    }
}
