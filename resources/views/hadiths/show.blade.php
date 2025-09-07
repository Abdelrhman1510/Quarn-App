<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $hadith->book }} - {{ __('Hadith') }}</title>
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
    </style>
</head>
<body class="bg-gradient-to-br from-amber-50 via-green-50 to-yellow-50 min-h-screen font-cairo islamic-pattern">

    <!-- Header Section -->
    <div class="bg-white shadow-lg border-b border-islamic-200">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('hadiths.index') }}" 
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-islamic-600 to-green-600 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    رجوع إلى الأحاديث
                </a>
            </div>

            <!-- Title -->
            <div class="text-center mb-8 animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-2 font-amiri">
                    📖 {{ $hadith->book }}
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full"></div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Hadith Info Card -->
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 animate-slide-up border-l-4 border-gradient-to-b from-islamic-500 to-green-500">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-islamic-50 to-islamic-100 rounded-xl">
                    <div class="w-10 h-10 bg-gradient-to-r from-islamic-500 to-islamic-600 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 font-medium">الباب</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $hadith->chapter_title_ar }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Chapter</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $hadith->chapter_title_en }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arabic Text Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 animate-slide-up">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-islamic-700 mb-2 font-amiri">النص العربي</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full"></div>
            </div>
            
            <div class="bg-gradient-to-r from-islamic-50 to-green-50 rounded-xl p-6 border-r-4 border-islamic-500">
                <p class="arabic-text text-xl text-gray-800 leading-relaxed">
                    {{ $hadith->arabic_text }}
                </p>
            </div>
        </div>

        <!-- English Translation Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 animate-slide-up">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-green-700 mb-2 font-cairo">English Translation</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-green-400 to-islamic-400 mx-auto rounded-full"></div>
            </div>
            
            <div class="bg-gradient-to-r from-green-50 to-islamic-50 rounded-xl p-6 border-l-4 border-green-500">
                <p class="english-text text-lg text-gray-700 leading-relaxed italic">
                    {{ $hadith->english_text }}
                </p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center animate-fade-in">
            <a href="{{ route('hadiths.index') }}" 
               class="inline-flex items-center gap-2 bg-gradient-to-r from-islamic-600 to-green-600 hover:from-islamic-700 hover:to-green-700 text-white px-8 py-4 rounded-full font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                رجوع إلى الأحاديث
            </a>
        </div>
    </div>

    <!-- Islamic Pattern Overlay -->
    <div class="fixed inset-0 pointer-events-none opacity-5">
        <div class="absolute inset-0 islamic-pattern"></div>
    </div>

</body>
</html>