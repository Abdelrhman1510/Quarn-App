<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AzkarController extends Controller
{
    public function index(Request $request)
{
    $category = $request->get('category');

    $azkars = \App\Models\Azkar::where('category', '!=', 'stop')
        ->when($category, function($query, $category) {
            $query->where('category', $category);
        })->get();

    $categories = \App\Models\Azkar::select('category')
        ->where('category', '!=', 'stop')
        ->distinct()
        ->pluck('category');

    return view('azkar', compact('azkars', 'categories', 'category'));
}
}
