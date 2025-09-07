<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class MushafController extends Controller
{
    public function index()
    {
        $files = File::files(public_path('mushaf'));

        $pages = collect($files)->sortBy(function($file) {
            return (int) pathinfo($file->getFilename(), PATHINFO_FILENAME);
        })->map(function($file) {
            return $file->getFilename();
        });

        return view('mushaf.full', compact('pages'));
    }
}
