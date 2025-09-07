<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ __('Quran Index') }}</title>
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
        
        .english-text {
            font-family: 'Cairo', sans-serif;
            line-height: 1.8;
            text-align: left;
            direction: ltr;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #d4af37, #22c55e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .surah-card {
            transition: all 0.3s ease;
        }
        
        .surah-card:hover {
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
                    📖 فهرس القرآن الكريم
                </h1>
                <p class="text-lg text-gray-600">Quran Index</p>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full mt-4"></div>
            </div>

            <!-- Search Form -->
            <div class="max-w-2xl mx-auto mb-8">
                <form action="{{ route('surahs.index') }}" method="GET" class="relative">
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               name="search" 
                               value="{{ $search }}" 
                               placeholder="{{ __('Search by Surah name') }}" 
                               class="w-full pr-10 pl-4 py-4 text-lg border-2 border-islamic-200 rounded-2xl focus:ring-4 focus:ring-islamic-200 focus:border-islamic-400 transition-all duration-300 shadow-lg bg-white">
                    </div>
                    <button type="submit" 
                            class="mt-4 w-full bg-gradient-to-r from-islamic-600 to-green-600 hover:from-islamic-700 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            {{ __('Search') }}
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Surahs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($surahs as $surah)
                <div class="surah-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-islamic-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-islamic-500 to-green-500 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                                    <span class="text-islamic-700 font-bold text-lg">{{ $surah->id }}</span>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg font-amiri">{{ $surah->name_ar }}</h3>
                                    <p class="text-islamic-100 text-sm">{{ $surah->name_en }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                @if(strtolower($surah->type) == 'meccan')
                                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">مكية</span>
                                @elseif(strtolower($surah->type) == 'medinan')
                                    <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full font-semibold">مدنية</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <div class="mb-4">
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                                <span class="font-semibold">النوع:</span>
                                <span class="text-islamic-600">
                                    @if(strtolower($surah->type) == 'meccan')
                                        {{ __('Meccan') }} (مكية)
                                    @elseif(strtolower($surah->type) == 'medinan')
                                        {{ __('Medinan') }} (مدنية)
                                    @else
                                        {{ $surah->type }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                        <!-- Action Button -->
                        <a href="{{ route('surahs.show', $surah->id) }}" 
                           class="w-full bg-gradient-to-r from-islamic-600 to-green-600 hover:from-islamic-700 hover:to-green-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ __('View') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
 <div class="flex justify-center mt-8 space-x-2">
    @if ($surahs->onFirstPage())
        <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded">السابق</span>
    @else
        <a href="{{ $surahs->previousPageUrl() }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">السابق</a>
    @endif

    @foreach ($surahs->getUrlRange(1, $surahs->lastPage()) as $page => $url)
        @if ($page == $surahs->currentPage())
            <span class="px-4 py-2 bg-green-600 text-white rounded">{{ $page }}</span>
        @else
            <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-green-200 transition">{{ $page }}</a>
        @endif
    @endforeach

    @if ($surahs->hasMorePages())
        <a href="{{ $surahs->nextPageUrl() }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">التالي</a>
    @else
        <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded">التالي</span>
    @endif
</div>

    <!-- Islamic Pattern Overlay -->
    <div class="fixed inset-0 pointer-events-none opacity-5">
        <div class="absolute inset-0 islamic-pattern"></div>
    </div>

</body>
</html>