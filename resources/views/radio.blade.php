<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>📻 إذاعات القرآن الكريم</title>
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
    
    .gradient-text {
      background: linear-gradient(135deg, #d4af37, #22c55e);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    
    .radio-card {
      transition: all 0.3s ease;
    }
    
    .radio-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .radio-card.playing {
      box-shadow: 0 25px 50px -12px rgba(212, 175, 55, 0.25);
      border: 2px solid #d4af37;
      transform: translateY(-4px);
    }
    
    .radio-card.playing .modern-player {
      background: linear-gradient(to right, #fef3c7, #fed7aa);
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .slider {
      -webkit-appearance: none;
      appearance: none;
      background: transparent;
      cursor: pointer;
      position: relative;
      z-index: 2;
    }
    
    .slider::-webkit-slider-track {
      background: transparent;
      height: 8px;
      border-radius: 4px;
    }
    
    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      background: linear-gradient(to right, #d4af37, #22c55e);
      height: 20px;
      width: 20px;
      border-radius: 50%;
      cursor: pointer;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
      border: 2px solid white;
      transition: all 0.2s ease;
    }
    
    .slider::-webkit-slider-thumb:hover {
      transform: scale(1.1);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }
    
    .slider::-moz-range-track {
      background: transparent;
      height: 8px;
      border-radius: 4px;
      border: none;
    }
    
    .slider::-moz-range-thumb {
      background: linear-gradient(to right, #d4af37, #22c55e);
      height: 20px;
      width: 20px;
      border-radius: 50%;
      cursor: pointer;
      border: 2px solid white;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
      transition: all 0.2s ease;
    }
    
    .slider::-moz-range-thumb:hover {
      transform: scale(1.1);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-amber-50 via-green-50 to-yellow-50 min-h-screen font-cairo islamic-pattern">
  <div class="container mx-auto px-4 py-8 max-w-7xl">
    
    <!-- Header Section -->
    <div class="text-center mb-8 animate-fade-in">
      <a href="{{ route('home') }}" 
         class="inline-flex items-center gap-2 mb-6 bg-gradient-to-r from-islamic-600 to-green-600 text-white px-6 py-3 rounded-full shadow-lg hover:from-islamic-700 hover:to-green-700 transform hover:scale-105 transition-all duration-300 font-medium">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        رجوع للصفحة الرئيسية
      </a>
      
      <h1 class="text-4xl md:text-5xl font-bold gradient-text mb-4 font-amiri">
        📻 إذاعات القرآن الكريم
      </h1>
      <p class="text-gray-600 text-lg">استمع إلى أجمل تلاوات القرآن الكريم من مختلف أنحاء العالم</p>
      <div class="w-24 h-1 bg-gradient-to-r from-islamic-400 to-green-400 mx-auto rounded-full mt-4"></div>
    </div>

    <!-- Search Bar -->
    <div class="max-w-2xl mx-auto mb-8 animate-slide-up">
      <div class="relative">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <input type="text" 
               id="searchInput"
               placeholder="ابحث عن إذاعة معينة..." 
               class="w-full pr-10 pl-4 py-4 text-lg border-2 border-islamic-200 rounded-2xl focus:ring-4 focus:ring-islamic-200 focus:border-islamic-400 transition-all duration-300 shadow-lg bg-white">
      </div>
    </div>

    <!-- Radio Grid -->
    <div id="radioGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ($radios as $radio)
        <div class="radio-card bg-white rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden group" 
             data-name="{{ strtolower($radio->name) }}">
          <!-- Image Container -->
          <div class="relative overflow-hidden">
            <img src="{{ $radio->img }}" 
                 alt="{{ $radio->name }}" 
                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            <div class="absolute top-4 right-4">
              <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
            </div>
          </div>
          
          <!-- Content -->
          <div class="p-6">
            <h3 class="font-bold text-xl text-gray-800 mb-4 text-center group-hover:text-islamic-600 transition-colors duration-300">
              {{ $radio->name }}
            </h3>
            
            <!-- Modern Audio Player -->
            <div class="modern-player bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-4 shadow-inner">
              <audio preload="none" 
                     data-radio-id="{{ $radio->id }}"
                     onplay="handlePlay(this)"
                     onpause="handlePause(this)"
                     onended="handleEnded(this)"
                     ontimeupdate="handleTimeUpdate(this)"
                     onloadedmetadata="handleLoadedMetadata(this)">
                <source src="{{ $radio->url }}" type="audio/mpeg">
                <source src="{{ $radio->url }}" type="audio/ogg">
                متصفحك لا يدعم تشغيل الصوت
              </audio>
              
              <!-- Custom Player Controls -->
              <div class="player-controls">
                <!-- Main Control Row -->
                <div class="flex items-center justify-between mb-3">
                  <!-- Play/Pause Button -->
                  <button class="play-pause-btn w-12 h-12 bg-gradient-to-r from-islamic-500 to-green-500 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 group" 
                          onclick="togglePlay(this)">
                    <svg class="play-icon w-6 h-6 text-white transform transition-transform duration-200" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                    <svg class="pause-icon w-6 h-6 text-white transform transition-transform duration-200 hidden" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                    </svg>
                  </button>
                  
                  <!-- Station Info -->
                  <div class="flex-1 mx-4 text-center">
                    <div class="text-sm font-medium text-gray-600 mb-1">الآن</div>
                    <div class="text-xs text-gray-500">بث مباشر</div>
                  </div>
                  
                  <!-- Enhanced Volume Control -->
                  <div class="flex items-center space-x-3 space-x-reverse">
                    <!-- Volume Icon -->
                    <button class="volume-mute-btn p-1 rounded-full hover:bg-gray-200 transition-colors duration-200" 
                            onclick="toggleMute(this)">
                      <svg class="volume-icon w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                      </svg>
                      <svg class="volume-muted-icon w-5 h-5 text-gray-600 hidden" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                      </svg>
                    </button>
                    
                    <!-- Volume Slider Container -->
                    <div class="flex-1 max-w-24">
                      <div class="relative">
                        <input type="range" 
                               class="volume-slider w-full h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer slider" 
                               min="0" max="100" value="70"
                               oninput="setVolume(this)"
                               onchange="setVolume(this)">
                        <div class="absolute top-0 left-0 h-2 bg-gradient-to-r from-islamic-500 to-green-500 rounded-lg pointer-events-none volume-fill" 
                             style="width: 70%"></div>
                      </div>
                    </div>
                    
                    <!-- Volume Percentage -->
                    <div class="volume-percentage text-xs font-medium text-gray-600 min-w-8 text-center">
                      70%
                    </div>
                  </div>
                </div>
                
                <!-- Progress Bar -->
                <div class="progress-container relative">
                  <div class="progress-bar w-full h-2 bg-gray-300 rounded-full overflow-hidden">
                    <div class="progress-fill h-full bg-gradient-to-r from-islamic-500 to-green-500 rounded-full transition-all duration-100" 
                         style="width: 0%"></div>
                  </div>
                  <div class="progress-handle absolute top-1/2 transform -translate-y-1/2 w-4 h-4 bg-white rounded-full shadow-lg border-2 border-islamic-500 cursor-pointer transition-all duration-100" 
                       style="left: 0%"></div>
                </div>
                
                <!-- Time Display -->
                <div class="flex justify-between items-center mt-2 text-xs text-gray-500">
                  <span class="current-time">00:00</span>
                  <span class="duration">--:--</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- No Results Message -->
    <div id="noResults" class="hidden text-center py-12">
      <div class="text-6xl mb-4">🔍</div>
      <h3 class="text-2xl font-bold text-gray-600 mb-2">لم يتم العثور على نتائج</h3>
      <p class="text-gray-500">جرب البحث بكلمات مختلفة</p>
    </div>

  </div>

  <!-- Islamic Pattern Overlay -->
  <div class="fixed inset-0 pointer-events-none opacity-5">
    <div class="absolute inset-0 islamic-pattern"></div>
  </div>

  <script>
    // Global variables
    let currentPlayingAudio = null;
    let isDragging = false;

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const radioGrid = document.getElementById('radioGrid');
    const noResults = document.getElementById('noResults');
    const radioCards = document.querySelectorAll('.radio-card');

    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase().trim();
      let visibleCount = 0;

      radioCards.forEach(card => {
        const radioName = card.getAttribute('data-name');
        const isVisible = radioName.includes(searchTerm);
        
        if (isVisible) {
          card.style.display = 'block';
          card.classList.add('animate-slide-up');
          visibleCount++;
        } else {
          card.style.display = 'none';
          card.classList.remove('animate-slide-up');
        }
      });

      // Show/hide no results message
      if (visibleCount === 0 && searchTerm !== '') {
        noResults.classList.remove('hidden');
        radioGrid.classList.add('hidden');
      } else {
        noResults.classList.add('hidden');
        radioGrid.classList.remove('hidden');
      }
    });

    // Modern Audio Player Functions
    function togglePlay(button) {
      const audio = button.closest('.modern-player').querySelector('audio');
      
      if (currentPlayingAudio && currentPlayingAudio !== audio) {
        currentPlayingAudio.pause();
        updatePlayButton(currentPlayingAudio.closest('.modern-player').querySelector('.play-pause-btn'), false);
        currentPlayingAudio.closest('.radio-card').classList.remove('playing');
      }
      
      if (audio.paused) {
        audio.play();
        currentPlayingAudio = audio;
      } else {
        audio.pause();
        currentPlayingAudio = null;
      }
    }

    function handlePlay(audio) {
      const card = audio.closest('.radio-card');
      const button = audio.closest('.modern-player').querySelector('.play-pause-btn');
      
      card.classList.add('playing');
      updatePlayButton(button, true);
    }

    function handlePause(audio) {
      const card = audio.closest('.radio-card');
      const button = audio.closest('.modern-player').querySelector('.play-pause-btn');
      
      card.classList.remove('playing');
      updatePlayButton(button, false);
    }

    function handleEnded(audio) {
      const card = audio.closest('.radio-card');
      const button = audio.closest('.modern-player').querySelector('.play-pause-btn');
      
      card.classList.remove('playing');
      updatePlayButton(button, false);
      currentPlayingAudio = null;
    }

    function handleTimeUpdate(audio) {
      const progressFill = audio.closest('.modern-player').querySelector('.progress-fill');
      const progressHandle = audio.closest('.modern-player').querySelector('.progress-handle');
      const currentTimeSpan = audio.closest('.modern-player').querySelector('.current-time');
      
      if (audio.duration) {
        const progress = (audio.currentTime / audio.duration) * 100;
        progressFill.style.width = progress + '%';
        progressHandle.style.left = progress + '%';
        currentTimeSpan.textContent = formatTime(audio.currentTime);
      }
    }

    function handleLoadedMetadata(audio) {
      const durationSpan = audio.closest('.modern-player').querySelector('.duration');
      if (audio.duration) {
        durationSpan.textContent = formatTime(audio.duration);
      }
    }

    function updatePlayButton(button, isPlaying) {
      const playIcon = button.querySelector('.play-icon');
      const pauseIcon = button.querySelector('.pause-icon');
      
      if (isPlaying) {
        playIcon.classList.add('hidden');
        pauseIcon.classList.remove('hidden');
        button.classList.add('animate-pulse');
      } else {
        playIcon.classList.remove('hidden');
        pauseIcon.classList.add('hidden');
        button.classList.remove('animate-pulse');
      }
    }

    function setVolume(slider) {
      const audio = slider.closest('.modern-player').querySelector('audio');
      const volumePercentage = slider.closest('.modern-player').querySelector('.volume-percentage');
      const volumeFill = slider.closest('.modern-player').querySelector('.volume-fill');
      const volumeIcon = slider.closest('.modern-player').querySelector('.volume-icon');
      const volumeMutedIcon = slider.closest('.modern-player').querySelector('.volume-muted-icon');
      
      const volume = slider.value / 100;
      audio.volume = volume;
      
      // Update volume percentage display
      volumePercentage.textContent = Math.round(volume * 100) + '%';
      
      // Update volume fill bar
      volumeFill.style.width = slider.value + '%';
      
      // Update volume icons based on level
      if (volume === 0) {
        volumeIcon.classList.add('hidden');
        volumeMutedIcon.classList.remove('hidden');
      } else {
        volumeIcon.classList.remove('hidden');
        volumeMutedIcon.classList.add('hidden');
      }
      
      // Store volume for unmute functionality
      slider.setAttribute('data-previous-volume', slider.value);
    }

    function toggleMute(button) {
      const slider = button.closest('.modern-player').querySelector('.volume-slider');
      const audio = slider.closest('.modern-player').querySelector('audio');
      const volumeIcon = button.querySelector('.volume-icon');
      const volumeMutedIcon = button.querySelector('.volume-muted-icon');
      
      if (audio.volume > 0) {
        // Mute
        slider.setAttribute('data-previous-volume', slider.value);
        slider.value = 0;
        setVolume(slider);
      } else {
        // Unmute
        const previousVolume = slider.getAttribute('data-previous-volume') || '70';
        slider.value = previousVolume;
        setVolume(slider);
      }
    }

    function formatTime(seconds) {
      const mins = Math.floor(seconds / 60);
      const secs = Math.floor(seconds % 60);
      return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    // Progress bar click handling
    document.addEventListener('click', function(e) {
      if (e.target.closest('.progress-container')) {
        const container = e.target.closest('.progress-container');
        const audio = container.closest('.modern-player').querySelector('audio');
        const rect = container.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const percentage = (clickX / rect.width) * 100;
        
        if (audio.duration) {
          audio.currentTime = (percentage / 100) * audio.duration;
        }
      }
    });

    // Progress bar drag handling
    document.addEventListener('mousedown', function(e) {
      if (e.target.closest('.progress-handle')) {
        isDragging = true;
        const handle = e.target.closest('.progress-handle');
        const container = handle.closest('.progress-container');
        const audio = container.closest('.modern-player').querySelector('audio');
        
        function handleMouseMove(e) {
          if (isDragging) {
            const rect = container.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            const percentage = Math.max(0, Math.min(100, (clickX / rect.width) * 100));
            
            const progressFill = container.querySelector('.progress-fill');
            progressFill.style.width = percentage + '%';
            handle.style.left = percentage + '%';
            
            if (audio.duration) {
              audio.currentTime = (percentage / 100) * audio.duration;
            }
          }
        }
        
        function handleMouseUp() {
          isDragging = false;
          document.removeEventListener('mousemove', handleMouseMove);
          document.removeEventListener('mouseup', handleMouseUp);
        }
        
        document.addEventListener('mousemove', handleMouseMove);
        document.addEventListener('mouseup', handleMouseUp);
      }
    });
  </script>

</body>
</html>