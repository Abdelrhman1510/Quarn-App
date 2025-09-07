<?php

namespace App\Http\Controllers;

use App\Models\Surah;
use Illuminate\Http\Request;

class SurahController extends Controller
{
 public function index(Request $request)
{
    $search = $request->input('search');

    $surahs = Surah::when($search, function ($query) use ($search) {
        return $query->where('name_ar', 'like', "%$search%")
                     ->orWhere('name_en', 'like', "%$search%");
    })
    ->orderBy('id', 'asc') // عشان السور تيجي بالترتيب
    ->paginate(20)         // بدل get() نستخدم paginate
    ->appends(['search' => $search]); // عشان يحتفظ بكلمة البحث لما تنقل بين الصفحات

    return view('surahs.index', compact('surahs', 'search'));
}


    public function show($id)
    {
        $surah = Surah::with('verses')->findOrFail($id);

        $prev = Surah::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $next = Surah::where('id', '>', $id)->orderBy('id', 'asc')->first();

        return view('surahs.show', compact('surah', 'prev', 'next'));
    }
}
