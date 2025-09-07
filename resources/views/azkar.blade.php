<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📿 الأذكار</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
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
                        'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
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
        
        .zekr-card {
            transition: all 0.3s ease;
        }
        
        .zekr-card:hover {
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
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-2 font-amiri">
                    📿 الأذكار
                </h1>
                <p class="text-lg text-gray-600">أذكار يومية مباركة</p>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full mt-4"></div>
            </div>

            <!-- Category Filter -->
            <div class="max-w-md mx-auto">
                <form method="GET" action="{{ route('azkar') }}" class="relative">
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-2 text-center">
                        اختر التصنيف
                    </label>
                    <div class="relative">
                        <select name="category" id="category" 
                                onchange="this.form.submit()"
                                class="w-full px-4 py-3 pr-10 bg-white border-2 border-islamic-300 rounded-xl text-gray-700 font-medium focus:outline-none focus:border-islamic-500 focus:ring-2 focus:ring-islamic-200 transition-all duration-300 appearance-none cursor-pointer">
                            <option value="">-- جميع التصنيفات --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ $category == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
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
        @php
            $grouped = $azkars->groupBy('category');
        @endphp

        @foreach($grouped as $cat => $items)
            <!-- Category Section -->
            <div class="mb-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-islamic-700 mb-2 font-amiri">{{ $cat }}</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full"></div>
                </div>

                <!-- Zekr Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($items as $zekr)
                        <div class="zekr-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-islamic-100 overflow-hidden" 
                             data-id="zekr{{ $zekr->id }}">
                            
                            <!-- Card Header -->
                            <div class="bg-gradient-to-r from-islamic-500 to-green-500 px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-white font-semibold text-sm">{{ $cat }}</span>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-islamic-100" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="p-6">
                                <!-- Zekr Content -->
                                <div class="mb-6">
                                    <p class="arabic-text text-gray-800 text-lg leading-relaxed text-center">
                                        {{ $zekr->content }}
                                    </p>
                                </div>

                                <!-- Reference -->
                                @if($zekr->reference)
                                    <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-600 text-center">
                                            <span class="font-semibold">المرجع:</span> {{ $zekr->reference }}
                                        </p>
                                    </div>
                                @endif

                                <!-- Description -->
                                @if($zekr->description)
                                    <div class="mb-6 p-3 bg-blue-50 rounded-lg border-r-4 border-blue-300">
                                        <p class="text-sm text-blue-800 text-center">
                                            {{ $zekr->description }}
                                        </p>
                                    </div>
                                @endif

                                <!-- Counter -->
                                <div class="text-center mb-6">
                                    <div class="inline-flex items-center gap-3 bg-islamic-50 px-6 py-3 rounded-full border-2 border-islamic-200">
                                        <span class="text-islamic-700 font-semibold">عدد التكرار:</span>
                                        <span class="text-2xl font-bold text-islamic-800 bg-white px-4 py-2 rounded-full shadow-sm" 
                                              id="count-zekr{{ $zekr->id }}">{{ $zekr->count }}</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-3">
                                    <button data-action="done" data-id="zekr{{ $zekr->id }}" data-count="{{ $zekr->count }}"
                                            class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            تم
                                        </div>
                                    </button>
                                    
                                    <button data-action="reset" data-id="zekr{{ $zekr->id }}" data-count="{{ $zekr->count }}"
                                            class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                            إعادة
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Islamic Pattern Overlay -->
    <div class="fixed inset-0 pointer-events-none opacity-5">
        <div class="absolute inset-0 islamic-pattern"></div>
    </div>

    <script>
        // Initialize counters from localStorage
        document.querySelectorAll('.zekr-card').forEach(card => {
            const id = card.dataset.id;
            const countElement = document.getElementById('count-' + id);
            const defaultCount = parseInt(countElement.textContent);
            const saved = localStorage.getItem(id);
            const savedDate = localStorage.getItem(id + "_date");
            const today = new Date().toLocaleDateString();

            if (saved && savedDate === today) {
                countElement.textContent = parseInt(saved);
            } else {
                countElement.textContent = defaultCount;
                localStorage.setItem(id, defaultCount);
                localStorage.setItem(id + "_date", today);
            }
        });

        // Event delegation for buttons
        document.addEventListener('click', function(e) {
            if (e.target.closest('button[data-action]')) {
                const button = e.target.closest('button[data-action]');
                const action = button.dataset.action;
                const id = button.dataset.id;
                const defaultCount = parseInt(button.dataset.count);

                if (action === 'done') {
                    doneZekr(id, defaultCount);
                } else if (action === 'reset') {
                    resetZekr(id, defaultCount);
                }
            }
        });

        function doneZekr(id, defaultCount) {
            const countElement = document.getElementById('count-' + id);
            let count = parseInt(countElement.textContent);

            if (count > 0) {
                count--;
                countElement.textContent = count;
                const today = new Date().toLocaleDateString();
                localStorage.setItem(id, count);
                localStorage.setItem(id + "_date", today);
                
                // Add visual feedback
                countElement.classList.add('animate-pulse');
                setTimeout(() => {
                    countElement.classList.remove('animate-pulse');
                }, 1000);
            }
        }

        function resetZekr(id, defaultCount) {
            const countElement = document.getElementById('count-' + id);
            countElement.textContent = defaultCount;
            const today = new Date().toLocaleDateString();
            localStorage.setItem(id, defaultCount);
            localStorage.setItem(id + "_date", today);
            
            // Add visual feedback
            countElement.classList.add('animate-bounce');
            setTimeout(() => {
                countElement.classList.remove('animate-bounce');
            }, 1000);
        }
    </script>

</body>
</html>