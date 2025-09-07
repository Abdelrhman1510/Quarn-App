<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🕌 مواقيت الصلاة</title>
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
        
        .prayer-card {
            transition: all 0.3s ease;
        }
        
        .prayer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .prayer-card.active {
            border: 2px solid #d4af37;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
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
                    🕌 مواقيت الصلاة اليوم
                </h1>
                <p class="text-lg text-gray-600">Prayer Times Today</p>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full mt-4"></div>
            </div>

            <!-- Search Form -->
            <div class="max-w-2xl mx-auto mb-8">
                <form onsubmit="getPrayerByCity(event)" class="relative">
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               id="city-input" 
                               placeholder="ابحث باسم المدينة..." 
                               required 
                               class="w-full pr-10 pl-4 py-4 text-lg border-2 border-islamic-200 rounded-2xl focus:ring-4 focus:ring-islamic-200 focus:border-islamic-400 transition-all duration-300 shadow-lg bg-white">
                    </div>
                    <button type="submit" 
                            class="mt-4 w-full bg-gradient-to-r from-islamic-600 to-green-600 hover:from-islamic-700 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            بحث
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Prayer Times Display -->
        <div id="prayer-times" class="mb-8">
            <div class="text-center py-12">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-islamic-600 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600">⏳ جاري تحديد موقعك وجلب المواقيت...</p>
            </div>
        </div>

        <!-- Next Prayer Display -->
        <div id="next-prayer" class="text-center mb-8"></div>
    </div>

    <!-- Islamic Pattern Overlay -->
    <div class="fixed inset-0 pointer-events-none opacity-5">
        <div class="absolute inset-0 islamic-pattern"></div>
    </div>

    <script>
        let timings = {};
        let prayers = [];
        const prayerDetails = {
            "الفجر": { rakaat: "2 فرض", sunnah: "2 سنة قبلية", icon: "🌅", color: "from-blue-500 to-indigo-600" },
            "الظهر": { rakaat: "4 فرض", sunnah: "2 قبلية + 2 أو 4 بعدية", icon: "☀️", color: "from-yellow-500 to-orange-600" },
            "العصر": { rakaat: "4 فرض", sunnah: "لا يوجد", icon: "🌤️", color: "from-orange-500 to-red-600" },
            "المغرب": { rakaat: "3 فرض", sunnah: "2 بعدية", icon: "🌅", color: "from-red-500 to-pink-600" },
            "العشاء": { rakaat: "4 فرض", sunnah: "2 بعدية + 3 وتر", icon: "🌙", color: "from-purple-500 to-indigo-600" }
        };

        async function getPrayerTimes(lat, lon) {
            try {
                const response = await fetch(`https://api.aladhan.com/v1/timings?latitude=${lat}&longitude=${lon}&method=5`);
                const data = await response.json();
                timings = data.data.timings;

                prayers = [
                    { name: "الفجر", time: timings.Fajr },
                    { name: "الظهر", time: timings.Dhuhr },
                    { name: "العصر", time: timings.Asr },
                    { name: "المغرب", time: timings.Maghrib },
                    { name: "العشاء", time: timings.Isha }
                ];

                renderPrayers();
                updateNextPrayer();
                setInterval(updateNextPrayer, 1000);
            } catch (error) {
                document.getElementById("prayer-times").innerHTML = 
                    "<div class='text-center py-12'><p class='text-red-600 text-lg'>⚠️ حدث خطأ في جلب المواقيت. جرب البحث بالمدينة.</p></div>";
            }
        }

       async function getPrayerByCity(event) {
    event.preventDefault();
    const city = document.getElementById("city-input").value;

    // ✅ خزن اسم المدينة في localStorage
    localStorage.setItem("lastCity", city);

    try {
        const response = await fetch(`https://api.aladhan.com/v1/timingsByCity?city=${city}&country=&method=5`);
        const data = await response.json();
        timings = data.data.timings;

        prayers = [
            { name: "الفجر", time: timings.Fajr },
            { name: "الظهر", time: timings.Dhuhr },
            { name: "العصر", time: timings.Asr },
            { name: "المغرب", time: timings.Maghrib },
            { name: "العشاء", time: timings.Isha }
        ];

        renderPrayers();
        updateNextPrayer();
        setInterval(updateNextPrayer, 1000);

    } catch (error) {
        document.getElementById("prayer-times").innerHTML = 
            "<div class='text-center py-12'><p class='text-red-600 text-lg'>⚠️ لم يتم العثور على المدينة. جرب اسم مدينة آخر.</p></div>";
    }
}

        function renderPrayers() {
            let html = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">';
            
            prayers.forEach(p => {
                const details = prayerDetails[p.name];
                html += `
                    <div class="prayer-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-islamic-100 overflow-hidden">
                        <div class="bg-gradient-to-r ${details.color} px-6 py-4">
                            <div class="text-center">
                                <div class="text-3xl mb-2">${details.icon}</div>
                                <h3 class="text-white font-bold text-lg font-amiri">${p.name}</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="text-center mb-4">
                                <div class="text-3xl font-bold text-islamic-700 mb-2">${p.time}</div>
                                <div class="text-sm text-gray-600">${details.rakaat}</div>
                            </div>
                            <div class="text-xs text-gray-500 text-center">
                                السنة: ${details.sunnah}
                            </div>
                        </div>
                    </div>
                `;
            });
            
            html += '</div>';
            document.getElementById("prayer-times").innerHTML = html;
        }

        function updateNextPrayer() {
            const now = new Date();
            let next = null;

            for (let p of prayers) {
                const [h, m] = p.time.split(":").map(Number);
                const prayerDate = new Date();
                prayerDate.setHours(h, m, 0, 0);

                if (prayerDate > now) {
                    next = { name: p.name, time: prayerDate };
                    break;
                }
            }

            if (!next) {
                const [h, m] = prayers[0].time.split(":").map(Number);
                const prayerDate = new Date();
                prayerDate.setDate(prayerDate.getDate() + 1);
                prayerDate.setHours(h, m, 0, 0);
                next = { name: prayers[0].name, time: prayerDate };
            }

            const diff = next.time - now;
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById("next-prayer").innerHTML = `
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-islamic-100">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-islamic-700 mb-4 font-amiri">🕑 الوقت المتبقي لصلاة ${next.name}</h3>
                        <div class="text-4xl font-bold text-green-600 mb-2">
                            ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}
                        </div>
                        <p class="text-gray-600">ساعة : دقيقة : ثانية</p>
                    </div>
                </div>
            `;
        }
        const azanAudio = new Audio("file:///C:/Users/DELL/Desktop/laravel-desktop/audio/azan.mp3"); // ضع المسار الصحيح
let lastNotifiedPrayer = null;

function updateNextPrayer() {
    const now = new Date();
    let next = null;

    for (let p of prayers) {
        const [h, m] = p.time.split(":").map(Number);
        const prayerDate = new Date();
        prayerDate.setHours(h, m, 0, 0);

        if (prayerDate > now) {
            next = { name: p.name, time: prayerDate };
            break;
        }
    }

    if (!next) {
        const [h, m] = prayers[0].time.split(":").map(Number);
        const prayerDate = new Date();
        prayerDate.setDate(prayerDate.getDate() + 1);
        prayerDate.setHours(h, m, 0, 0);
        next = { name: prayers[0].name, time: prayerDate };
    }

    const diff = next.time - now;
    const hours = Math.floor(diff / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    document.getElementById("next-prayer").innerHTML = `
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-islamic-100">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-islamic-700 mb-4 font-amiri">🕑 الوقت المتبقي لصلاة ${next.name}</h3>
                <div class="text-4xl font-bold text-green-600 mb-2">
                    ${hours.toString().padStart(2,'0')}:${minutes.toString().padStart(2,'0')}:${seconds.toString().padStart(2,'0')}
                </div>
                <p class="text-gray-600">ساعة : دقيقة : ثانية</p>
            </div>
        </div>
    `;

    // تشغيل الأذان عند وقت الصلاة
    if (hours === 0 && minutes === 0 && seconds === 0 && lastNotifiedPrayer !== next.name) {
        lastNotifiedPrayer = next.name;
        azanAudio.play();

        new Notification(`🕌 حان وقت صلاة ${next.name}`, {
            body: "الله أكبر! توجه للصلاة"
        });
    }
}
window.addEventListener("DOMContentLoaded", () => {
    const lastCity = localStorage.getItem("lastCity");

    if (lastCity) {
        // ✅ لو فيه مدينة محفوظة، نجيب المواقيت منها مباشرة
        document.getElementById("city-input").value = lastCity; // نحطها في الـ input كمان
        fetch(`https://api.aladhan.com/v1/timingsByCity?city=${lastCity}&country=&method=5`)
            .then(res => res.json())
            .then(data => {
                timings = data.data.timings;

                prayers = [
                    { name: "الفجر", time: timings.Fajr },
                    { name: "الظهر", time: timings.Dhuhr },
                    { name: "العصر", time: timings.Asr },
                    { name: "المغرب", time: timings.Maghrib },
                    { name: "العشاء", time: timings.Isha }
                ];

                renderPrayers();
                updateNextPrayer();
                setInterval(updateNextPrayer, 1000);
            })
            .catch(() => {
                console.warn("⚠️ حصل خطأ أثناء جلب المواقيت للمدينة المخزنة.");
                fetchLocationAndTimes(); // fallback للموقع
            });
    } else {
        // ✅ لو مفيش مدينة محفوظة، نحاول نجيب الموقع الجغرافي
        fetchLocationAndTimes();
    }
});


        function fetchLocationAndTimes() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (pos) => {
                        const lat = pos.coords.latitude;
                        const lon = pos.coords.longitude;
                        getPrayerTimes(lat, lon);
                    },
                    (err) => {
                        document.getElementById("prayer-times").innerHTML =
                            "<div class='text-center py-12'><p class='text-yellow-600 text-lg'>⚠️ لم يتم السماح بالوصول للموقع. استخدم البحث بالمدينة.</p></div>";
                    }
                );
            } else {
                document.getElementById("prayer-times").innerHTML =
                    "<div class='text-center py-12'><p class='text-red-600 text-lg'>❌ المتصفح لا يدعم تحديد الموقع.</p></div>";
            }
        }

        fetchLocationAndTimes();
    </script>

</body>
</html>