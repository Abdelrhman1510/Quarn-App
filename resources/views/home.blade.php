<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('الصفحة الرئيسية') }} - المصحف والتفسير</title>
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
        
        .nav-card {
            transition: all 0.3s ease;
        }
        
        .nav-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
        .floating-element:nth-child(2) { top: 20%; right: 15%; animation-delay: 2s; }
        .floating-element:nth-child(3) { bottom: 30%; left: 20%; animation-delay: 4s; }
        .floating-element:nth-child(4) { bottom: 20%; right: 10%; animation-delay: 1s; }
    </style>
</head>
<body class="bg-gradient-to-br from-amber-50 via-green-50 to-yellow-50 min-h-screen font-cairo islamic-pattern">

    <!-- Floating Islamic Elements -->
    <div class="floating-elements">
        <div class="floating-element text-6xl text-islamic-300">🕌</div>
        <div class="floating-element text-4xl text-green-300">📖</div>
        <div class="floating-element text-5xl text-islamic-400">🌙</div>
        <div class="floating-element text-3xl text-green-400">✨</div>
    </div>

    <!-- Main Container -->
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="max-w-6xl w-full">
            
            <!-- Header Section -->
            <div class="text-center mb-12 animate-fade-in">
                <!-- Logo -->
                <div class="mb-8">
                    <img src="{{ asset('mushaf/logo.png') }}" alt="Logo" class="w-24 h-24 mx-auto mb-4 animate-float">
                </div>
                
                <!-- Title -->
                <h1 class="text-5xl md:text-6xl font-bold gradient-text mb-4 font-amiri">
                    {{ __('المصحف والتفسير') }}
                </h1>
                <p class="text-xl text-gray-600 mb-6">{{ __('Quran & Tafseer Application') }}</p>
                <div class="w-32 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full"></div>
            </div>

            <!-- Navigation Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Mushaf Card -->
                <a href="{{ route('mushaf.full') }}" class="nav-card group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-islamic-100 overflow-hidden">
                    <div class="bg-gradient-to-br from-islamic-500 to-islamic-600 px-6 py-8 text-center">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">📖</div>
                        <h3 class="text-white font-bold text-xl font-amiri mb-2">{{ __('المصحف كامل') }}</h3>
                        <p class="text-islamic-100 text-sm">{{ __('Complete Mushaf') }}</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-center text-sm">{{ __('قراءة القرآن الكريم بصفحات المصحف') }}</p>
                    </div>
                </a>

                <!-- Tafseer Card -->
                <a href="{{ route('surahs.index') }}" class="nav-card group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-islamic-100 overflow-hidden">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 px-6 py-8 text-center">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">📚</div>
                        <h3 class="text-white font-bold text-xl font-amiri mb-2">{{ __('تفسير القرآن') }}</h3>
                        <p class="text-green-100 text-sm">{{ __('Quran Tafseer') }}</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-center text-sm">{{ __('تفسير القرآن الكريم مع التفاسير المختلفة') }}</p>
                    </div>
                </a>

                <!-- Prayer Times Card -->
                <a href="{{ route('pray.timeline') }}" class="nav-card group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-islamic-100 overflow-hidden">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 px-6 py-8 text-center">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">🕌</div>
                        <h3 class="text-white font-bold text-xl font-amiri mb-2">{{ __('مواقيت الصلاة') }}</h3>
                        <p class="text-blue-100 text-sm">{{ __('Prayer Times') }}</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-center text-sm">{{ __('مواقيت الصلاة اليومية') }}</p>
                    </div>
                </a>

                <!-- Azkar Card -->
                <a href="{{ route('azkar') }}" class="nav-card group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-islamic-100 overflow-hidden">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 px-6 py-8 text-center">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">📿</div>
                        <h3 class="text-white font-bold text-xl font-amiri mb-2">{{ __('الأذكار اليومية') }}</h3>
                        <p class="text-purple-100 text-sm">{{ __('Daily Azkar') }}</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-center text-sm">{{ __('أذكار يومية مباركة') }}</p>
                    </div>
                </a>

                <!-- Hadiths Card -->
                <a href="{{ route('hadiths.index') }}" class="nav-card group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-islamic-100 overflow-hidden">
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 px-6 py-8 text-center">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">📖</div>
                        <h3 class="text-white font-bold text-xl font-amiri mb-2">{{ __('الأحاديث') }}</h3>
                        <p class="text-orange-100 text-sm">{{ __('Hadiths') }}</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-center text-sm">{{ __('مجموعة من الأحاديث الشريفة') }}</p>
                    </div>
                </a>

                <!-- Radio Card -->
                <a href="{{ route('radio') }}" class="nav-card group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-islamic-100 overflow-hidden">
                    <div class="bg-gradient-to-br from-teal-500 to-teal-600 px-6 py-8 text-center">
                        <div class="text-6xl mb-4 group-hover:scale-110 transition-transform duration-300">📻</div>
                        <h3 class="text-white font-bold text-xl font-amiri mb-2">{{ __('إذاعات القرآن') }}</h3>
                        <p class="text-teal-100 text-sm">{{ __('Quran Radios') }}</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-center text-sm">{{ __('استمع إلى إذاعات القرآن الكريم') }}</p>
                    </div>
                </a>
            </div>

            <!-- Date and Ramadan Section -->
            <div class="max-w-4xl mx-auto">
                <!-- Date Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Gregorian Date Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-islamic-100 animate-slide-up">
                        <div class="text-center">
                            <div class="text-3xl mb-4">📅</div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-3">{{ __('التاريخ الميلادي') }}</h3>
                            <div id="gregorian-date" class="text-gray-600 font-medium"></div>
                        </div>
                    </div>

                    <!-- Hijri Date Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-islamic-100 animate-slide-up">
                        <div class="text-center">
                            <div class="text-3xl mb-4">🌙</div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-3">{{ __('التاريخ الهجري') }}</h3>
                            <div id="hijri-date" class="text-gray-600 font-medium"></div>
                        </div>
                    </div>
                </div>

                <!-- Ramadan Countdown Card -->
                <div class="bg-gradient-to-r from-islamic-50 to-green-50 rounded-2xl shadow-lg p-8 border-2 border-dashed border-islamic-300 animate-pulse-slow">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🌙</div>
                        <h3 class="text-2xl font-bold text-islamic-700 mb-4 font-amiri">{{ __('العد التنازلي لرمضان') }}</h3>
                        <div id="ramadan-countdown" class="text-lg text-gray-700 font-medium">
                            ⏳ {{ __('يتم حساب الوقت المتبقي لرمضان...') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Islamic Pattern Overlay -->
    <div class="fixed inset-0 pointer-events-none opacity-5">
        <div class="absolute inset-0 islamic-pattern"></div>
    </div>

<script>
    // Gregorian Date
    const today = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('gregorian-date').innerText = today.toLocaleDateString('ar-EG', options);

    // Hijri Date (API)
    fetch("https://api.aladhan.com/v1/gToH?date=" + today.getDate() + "-" + (today.getMonth()+1) + "-" + today.getFullYear())
        .then(res => res.json())
        .then(data => {
            const hijri = data.data.hijri;
            document.getElementById('hijri-date').innerText = hijri.weekday.ar + "، " + hijri.day + " " + hijri.month.ar + " " + hijri.year + " هـ";
        })
        .catch(error => {
            console.error('Error fetching Hijri date:', error);
            document.getElementById('hijri-date').innerText = "خطأ في تحميل التاريخ الهجري";
        });

    // Ramadan Countdown
    const ramadanDate = new Date("2026-03-01T00:00:00");
    function updateCountdown() {
        const now = new Date();
        const diff = ramadanDate - now;

        if (diff <= 0) {
            document.getElementById('ramadan-countdown').innerHTML = 
                '<div class="text-2xl font-bold text-green-600">🌙 رمضان مبارك!</div>';
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((diff / (1000 * 60)) % 60);

        document.getElementById('ramadan-countdown').innerHTML = 
            `<div class="text-lg text-gray-700 font-medium">
                <div class="mb-2">🌙 متبقي على رمضان المبارك</div>
                <div class="flex justify-center gap-4 text-2xl font-bold text-islamic-600">
                    <div class="bg-white px-4 py-2 rounded-lg shadow-sm">${days} يوم</div>
                    <div class="bg-white px-4 py-2 rounded-lg shadow-sm">${hours} ساعة</div>
                    <div class="bg-white px-4 py-2 rounded-lg shadow-sm">${minutes} دقيقة</div>
                </div>
            </div>`;
    }

    // Update countdown every minute
    setInterval(updateCountdown, 60000);
    updateCountdown();

    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
</script>

</body>
</html>
