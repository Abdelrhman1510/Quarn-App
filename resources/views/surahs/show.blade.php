<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $surah->name_ar }} - {{ __('The Holy Quran') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f6efe6;
            font-family: 'Amiri', serif;
            margin: 0;
            padding: 0;
            color: #3b3b3b;
        }
        .mushaf {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px 40px;
            background: #fffaf0;
            border: 8px solid #d4af37;
            box-shadow: 0 6px 30px rgba(0,0,0,0.08);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 5px;
            font-weight: 700;
            font-size: 3rem;
            color: #4a3c1a;
        }
        .meta {
            text-align: center;
            color: #8a6b2e;
            margin-bottom: 30px;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .ayah {
            margin: 20px 0;
            padding: 15px 20px;
            background: #fff8e1;
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }
        .text-ar {
            font-size: 28px;
            line-height: 2.4;
            text-align: justify;
            direction: rtl;
            font-weight: 600;
            color: #2b2b2b;
            position: relative;
            padding-left: 40px;
        }
        .text-ar::before {
            content: "﴿";
            position: absolute;
            left: 10px;
            top: 0;
            font-size: 34px;
            color: #d4af37;
        }
        .translation {
            font-size: 18px;
            color: #555;
            margin-top: 6px;
            padding-left: 10px;
            line-height: 1.6;
            font-style: italic;
        }
        .tafseer-tabs {
            margin-top: 15px;
            display: none;
        }
        .tab-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }
        .tab-buttons button {
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            background: #d4af37;
            color: white;
            border-radius: 5px;
            font-weight: bold;
        }
        .tab-buttons button.active {
            background: #b28f20;
        }
.ayah.highlight-verse .text-ar {
    background-color: #fff3b0; /* لون مميز للنص العربي */
    color: #a67c00; /* لون الخط */
    transition: background-color 0.3s ease, color 0.3s ease;
    border-radius: 6px;
    padding: 2px 6px;
}
        .tab-content {
            background: #fdf5e6;
            border-left: 5px solid #d4af37;
            border-radius: 5px;
            padding: 15px;
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            direction: rtl;
            text-align: justify;
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .verse-num {
            color: #d4af37;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .btn {
            background: #d4af37;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 700;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #b28f20;
        }
        .nav-links {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .nav-links a {
            max-width: 48%;
            display: inline-block;
            text-align: center;
        }
        .toggle-tafseer-btn {
            background: #4a3c1a;
            color: #fff;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }
        .toggle-tafseer-btn:hover {
            background: #2d2410;
        }

        /* ======= Audio Player Modern Style ======= */
        .audio-player {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff8e1;
            border-radius: 8px;
            padding: 8px 12px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 350px;
            user-select: none;
            margin-top: 10px;
        }
        .play-btn {
            font-size: 20px;
            background: #d4af37;
            border: none;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
        .play-btn:hover {
            background: #b28f20;
        }
        .progress-bar {
            flex: 1;
            height: 6px;
            background: #e0d1a7;
            border-radius: 3px;
            cursor: pointer;
            position: relative;
        }
        .progress {
            background: #d4af37;
            height: 100%;
            width: 0%;
            border-radius: 3px;
            transition: width 0.1s;
        }
        .time {
            font-size: 14px;
            color: #555;
            min-width: 40px;
            text-align: right;
            font-family: monospace;
        }
    </style>
</head>
<body>

<div style="text-align:center; margin: 25px 0;">
    <a class="btn" href="{{ route('surahs.index') }}">⬅ {{ __('Back to Index') }}</a>
</div>

<div class="mushaf">
    <h1>{{  $surah->name_ar   }} {{  $surah->name_en   }}</h1> 
    
    <div class="meta">
        {{ __('Number of verses :  عدد الآيات') }} : {{ $surah->total_verses }} &nbsp;&mdash;&nbsp; 
        {{ __('Type | النوع') }}: 
        @if(strtolower($surah->type) == 'meccan')
            {{ __('Meccan') }} (مكية)
        @elseif(strtolower($surah->type) == 'medinan')
            {{ __('Medinan') }} (مدنية)
        @else
            {{ $surah->type }}
        @endif
    </div>

    @foreach($surah->verses as $verse)
    <div class="ayah">
        <div class="verse-num">{{ $verse->verse_number }}</div>
        <div class="text-ar">{{ $verse->text_ar }}</div>
        <div class="translation">{{ app()->getLocale() === 'ar' ? '' : $verse->text_en }}</div>

        {{-- مشغل الصوت المودرن --}}
        @if(!empty($verse->audio_url))
            <div class="audio-player" data-src="{{ $verse->audio_url }}">
                <button class="play-btn" aria-label="Play audio">▶️</button>
                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress"></div>
                </div>
                <span class="time">00:00</span>
            </div>
        @endif

        @if(!empty($verse->tafseer) || !empty($verse->tafseer_en))
            <button class="toggle-tafseer-btn">📖التفسير | Tafsir</button>
            <div class="tafseer-tabs">
                <div class="tab-buttons">
                    @if(!empty($verse->tafseer))
                        <button class="tab-btn active">التفسير العربي</button>
                    @endif
                    @if(!empty($verse->tafseer_en))
                        <button class="tab-btn {{ empty($verse->tafseer) ? 'active' : '' }}">Tafsir English</button>
                    @endif
                </div>
                @if(!empty($verse->tafseer))
                    <div class="tab-content active">{!! $verse->tafseer !!}</div>
                @endif
                @if(!empty($verse->tafseer_en))
                    <div class="tab-content {{ empty($verse->tafseer) ? 'active' : '' }}">{!! $verse->tafseer_en !!}</div>
                @endif
            </div>
        @endif
    </div>
@endforeach

    <div class="nav-links">
        <div>
            @if($prev)
                <a class="btn" href="{{ route('surahs.show', $prev->id) }}">{{ __('Previous Surah') }}: {{ app()->getLocale() === 'ar' ? $prev->name_ar : $prev->name_en }}</a>
            @endif
        </div>
        <div>
            @if($next)
                <a class="btn" href="{{ route('surahs.show', $next->id) }}">{{ __('Next Surah') }}: {{ app()->getLocale() === 'ar' ? $next->name_ar : $next->name_en }}</a>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Tafseer tabs switching (unchanged)
    document.querySelectorAll('.tafseer-tabs').forEach(function (tabs) {
        const buttons = tabs.querySelectorAll('.tab-btn');
        const contents = tabs.querySelectorAll('.tab-content');
        
        buttons.forEach((btn, idx) => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => b.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));
                btn.classList.add('active');
                contents[idx].classList.add('active');
            });
        });
    });

    // Toggle Tafseer Show/Hide (close others when opening new)
    const tafseerSections = document.querySelectorAll('.tafseer-tabs');
    document.querySelectorAll('.toggle-tafseer-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const currentTafseer = btn.nextElementSibling;
            tafseerSections.forEach(section => {
                if (section !== currentTafseer) {
                    section.style.display = 'none';
                }
            });
            currentTafseer.style.display = 
                (currentTafseer.style.display === 'none' || currentTafseer.style.display === '') 
                ? 'block' 
                : 'none';
        });
    });

    // Audio Player logic
    const players = document.querySelectorAll('.audio-player');
    let currentAudio = null;
    let currentPlayer = null;

    players.forEach(player => {
        const playBtn = player.querySelector('.play-btn');
        const progressBar = player.querySelector('.progress-bar');
        const progress = player.querySelector('.progress');
        const timeLabel = player.querySelector('.time');
        const ayahDiv = player.closest('.ayah');
        const audioSrc = player.getAttribute('data-src');
        const audio = new Audio(audioSrc);

        playBtn.addEventListener('click', () => {
            // Pause other audios and remove highlight
            if (currentAudio && currentAudio !== audio) {
                currentAudio.pause();
                currentAudio.currentTime = 0;
                if(currentPlayer) {
                    currentPlayer.querySelector('.play-btn').textContent = '▶️';
                    currentPlayer.querySelector('.progress').style.width = '0%';
                    currentPlayer.querySelector('.time').textContent = '00:00';
                    currentPlayer.closest('.ayah').classList.remove('highlight-verse');
                }
            }

            if (audio.paused) {
                audio.play();
                playBtn.textContent = '⏸️';
                ayahDiv.classList.add('highlight-verse');  // Highlight verse
                currentAudio = audio;
                currentPlayer = player;
            } else {
                audio.pause();
                playBtn.textContent = '▶️';
                ayahDiv.classList.remove('highlight-verse');
                currentAudio = null;
                currentPlayer = null;
            }
        });

        audio.addEventListener('timeupdate', () => {
            if (audio.duration) {
                const percent = (audio.currentTime / audio.duration) * 100;
                progress.style.width = percent + '%';

                const minutes = Math.floor(audio.currentTime / 60).toString().padStart(2, '0');
                const seconds = Math.floor(audio.currentTime % 60).toString().padStart(2, '0');
                timeLabel.textContent = `${minutes}:${seconds}`;
            }
        });

        audio.addEventListener('ended', () => {
            playBtn.textContent = '▶️';
            progress.style.width = '0%';
            timeLabel.textContent = '00:00';
            ayahDiv.classList.remove('highlight-verse');  // Remove highlight when ended
            currentAudio = null;
            currentPlayer = null;
        });

        progressBar.addEventListener('click', e => {
            const rect = progressBar.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            if(audio.duration) {
                const newTime = (clickX / rect.width) * audio.duration;
                audio.currentTime = newTime;
            }
        });
    });
});
</script>

</body>
</html>
