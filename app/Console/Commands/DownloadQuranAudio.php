<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Verse;

class DownloadQuranAudio extends Command
{
    protected $signature = 'quran:addaudio {--reciter=Alafasy_64kbps}';
    protected $description = 'Add Quran audio URLs for each verse from EveryAyah.com';

    public function handle()
    {
        $reciter = $this->option('reciter');
        $baseUrl = "https://everyayah.com/data/{$reciter}";

        $this->info("🔊 Adding audio URLs from: {$baseUrl}");

        $verses = Verse::with('surah')->get();

        foreach ($verses as $verse) {
            $surahNum = str_pad($verse->surah->order, 3, '0', STR_PAD_LEFT);
            $ayahNum = str_pad($verse->verse_number, 3, '0', STR_PAD_LEFT);

            $audioUrl = "{$baseUrl}/{$surahNum}{$ayahNum}.mp3";

            // لو حابب تتحقق ان الملف موجود
            $headers = @get_headers($audioUrl);
            if ($headers && strpos($headers[0], '200')) {
                $verse->audio_url = $audioUrl;
                $verse->save();
                $this->info("✅ Added: {$audioUrl}");
            } else {
                $this->warn("❌ Not found: {$audioUrl}");
            }
        }

        $this->info("🎉 Done adding audio URLs!");
    }
}
