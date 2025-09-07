<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Quran Splash Screen</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f6efe6;
            font-family: 'Amiri', serif;
            overflow: hidden;
        }

        .splash-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #f8f4e9, #e6d6b8);
            position: relative;
        }

        .book {
            width: 300px;
            height: 400px;
            position: relative;
            perspective: 1500px;
        }

        .cover {
            width: 100%;
            height: 100%;
            background: #d4af37;
            position: absolute;
            transform-origin: left;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 5px solid #a78627;
        }

        .cover.left {
            z-index: 2;
            animation: openLeft 2.5s forwards ease-in-out;
        }

        .cover.right {
            left: 0;
            transform-origin: right;
            z-index: 1;
            animation: openRight 2.5s forwards ease-in-out;
        }

        .page {
            width: 100%;
            height: 100%;
            background: #fffaf0;
            position: absolute;
            z-index: 0;
            border: 2px solid #d4af37;
        }

        @keyframes openLeft {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(-160deg); }
        }

        @keyframes openRight {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(160deg); }
        }

        .title {
            position: absolute;
            text-align: center;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            font-size: 28px;
            color: #8a6b2e;
        }
    </style>
</head>
<body>
    <div class="splash-container">
        <div class="book">
            <div class="cover left"></div>
            <div class="page">
                <div class="title">بسم الله الرحمن الرحيم</div>
            </div>
            <div class="cover right"></div>
        </div>
    </div>

    <script>
        setTimeout(function(){
            window.location.href = "{{ route('surahs.index') }}";
        }, 3000); // بعد 3 ثواني يروح للفهرس
    </script>
</body>
</html>
