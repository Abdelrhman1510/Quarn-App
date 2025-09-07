<?php

namespace App\Http\Controllers;

use App\Models\Hadith;
use Illuminate\Http\Request;

class HadithController extends Controller
{
    // عرض كل الأحاديث (مع pagination)
    public function index(Request $request)
    {
         $query = Hadith::orderBy('id');

    if ($request->has('book') && $request->book != '') {
        $query->where('book', $request->book);
    }

    $hadiths = $query->paginate(20);

    return view('hadiths.index', compact('hadiths'));
    }

    // عرض حديث واحد بالتفصيل
    public function show($id)
    {
        $hadith = Hadith::findOrFail($id);
        return view('hadiths.show', compact('hadith'));
    }
}
