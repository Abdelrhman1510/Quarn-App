<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Radio;

class RadioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        $json = file_get_contents(database_path('radio.json'));
        $data = json_decode($json, true);

        foreach ($data['radios'] as $radio) {
            Radio::create([
                'name' => $radio['name'],
                'url'  => $radio['url'],
                'img'  => $radio['img'],
            ]);
        }
    }
}
