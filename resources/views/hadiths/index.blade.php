<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جميع الأحاديث</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'amiri': ['Amiri', 'serif'],
                        'cairo': ['Cairo', 'sans-serif'],
                    },
                    colors: {
                        'islamic': {
                            50: '#fefdf8',
                            100: '#fdf9e7',
                            200: '#faf0c7',
                            300: '#f5e3a3',
                            400: '#efd16e',
                            500: '#e6c04a',
                            600: '#d4af37',
                            700: '#b8941f',
                            800: '#9a7a1a',
                            900: '#7d6215',
                        },
                        'green': {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.4s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .islamic-pattern {
            background-image: 
                radial-gradient(circle at 25px 25px, rgba(212, 175, 55, 0.1) 2px, transparent 0),
                radial-gradient(circle at 75px 75px, rgba(34, 197, 94, 0.1) 2px, transparent 0);
            background-size: 100px 100px;
        }
        
        .arabic-text {
            font-family: 'Amiri', serif;
            line-height: 2.5;
            text-align: right;
            direction: rtl;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #d4af37, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hadith-card {
            transition: all 0.3s ease;
        }
        
        .hadith-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-amber-50 via-green-50 to-yellow-50 min-h-screen font-cairo islamic-pattern">

    <!-- Header Section -->
    <div class="bg-white shadow-lg border-b border-islamic-200">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <!-- Back to Home Button -->
            <div class="mb-6">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-islamic-600 to-green-600 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    رجوع للصفحة الرئيسية
                </a>
            </div>

            <!-- Title -->
            <div class="text-center mb-8 animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-2 font-amiri">
                    📖 جميع الأحاديث
                </h1>
                <p class="text-lg text-gray-600">All Hadiths Collection</p>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full mt-4"></div>
            </div>

            <!-- Filter Form -->
            <div class="max-w-2xl mx-auto mb-8">
    @php
        $bookNames = [
            'Sahih al-Bukhari' => 'البخاري | Bukhari',
            'Sahih Muslim' => 'مسلم | Muslim',
            'Sunan an-Nasa\'i' => 'النسائي | Nasa\'i',
            'Sunan Abi Dawud' => 'أبو داود | Abu Dawood',
            'Jami` at-Tirmidhi' => 'الترمذي | Tirmidhi',
            'Sunan Ibn Majah' => 'ابن ماجه | Ibn Majah',
        ];
    @endphp

                <form method="GET" action="{{ route('hadiths.index') }}" class="relative">
                    <label for="book" class="block text-sm font-semibold text-gray-700 mb-2 text-center">
                        اختر كتاب الحديث
                    </label>
                    <div class="relative">
                        <select name="book" id="book" 
                                onchange="this.form.submit()"
                                class="w-full px-4 py-3 pr-10 bg-white border-2 border-islamic-300 rounded-xl text-gray-700 font-medium focus:outline-none focus:border-islamic-500 focus:ring-2 focus:ring-islamic-200 transition-all duration-300 appearance-none cursor-pointer">
            <option value="">📚 اختر كتاب| Choose Book</option>
            @foreach(\App\Models\Hadith::select('book')->distinct()->pluck('book') as $book)
                <option value="{{ $book }}" {{ request('book') == $book ? 'selected' : '' }}>
                    {{ $bookNames[$book] ?? $book }}
                </option>
            @endforeach
        </select>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-islamic-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
    </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Hadiths Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($hadiths as $hadith)
                <a href="{{ route('hadiths.show', $hadith->id) }}" class="hadith-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-islamic-100 overflow-hidden block">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-islamic-500 to-green-500 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-islamic-700" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg font-amiri">{{ $bookNames[$hadith->book] ?? $hadith->book }}</h3>
                                    <p class="text-islamic-100 text-sm">حديث شريف</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <div class="mb-4">
                            <p class="arabic-text text-gray-800 leading-relaxed text-sm">
                                {{ Str::limit($hadith->arabic_text, 150) }}
                            </p>
                        </div>
                        
                        <!-- Action Button -->
                        <div class="flex items-center justify-center gap-2 text-islamic-600 font-semibold">
                            <span>اقرأ المزيد</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
            </a>
        @endforeach
    </div>

    <!-- Pagination -->
     
@php
    $total = $hadiths->lastPage();
    $current = $hadiths->currentPage();
    $start = max(1, $current - 2);
    $end = min($total, $current + 2);
@endphp

<div class="flex justify-center mt-8 space-x-1 rtl:space-x-reverse flex-wrap gap-1">
    <!-- Previous -->
    @if ($hadiths->onFirstPage())
        <span class="px-3 py-1 bg-gray-300 text-gray-600 rounded">السابق</span>
    @else
        <a href="{{ $hadiths->previousPageUrl() }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition">السابق</a>
    @endif

    <!-- First Page + ellipsis -->
    @if ($start > 1)
        <a href="{{ $hadiths->url(1) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-green-200 transition">1</a>
        @if ($start > 2)
            <span class="px-3 py-1 text-gray-500">...</span>
        @endif
    @endif

    <!-- Pages Around Current -->
    @for ($i = $start; $i <= $end; $i++)
        @if ($i == $current)
            <span class="px-3 py-1 bg-green-600 text-white rounded">{{ $i }}</span>
        @else
            <a href="{{ $hadiths->url($i) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-green-200 transition">{{ $i }}</a>
        @endif
    @endfor

    <!-- Last Page + ellipsis -->
    @if ($end < $total)
        @if ($end < $total - 1)
            <span class="px-3 py-1 text-gray-500">...</span>
        @endif
        <a href="{{ $hadiths->url($total) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-green-200 transition">{{ $total }}</a>
    @endif

    <!-- Next -->
    @if ($hadiths->hasMorePages())
        <a href="{{ $hadiths->nextPageUrl() }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition">التالي</a>
    @else
        <span class="px-3 py-1 bg-gray-300 text-gray-600 rounded">التالي</span>
    @endif
</div>

    <!-- Islamic Pattern Overlay -->
    <div class="fixed inset-0 pointer-events-none opacity-5">
        <div class="absolute inset-0 islamic-pattern"></div>
</div>

</body>
</html>