<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>المصحف الشريف</title>

  <!-- Fancybox -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

  <style>
    body {
      background: #f6efe6;
      font-family: 'Amiri', serif;
      margin: 0;
      padding: 20px;
      text-align: center;
    }
    .home-btn {
      position: fixed;
      top: 16px;
      left: 16px;
      background: #b8941f;
      color: #fff;
      text-decoration: none;
      padding: 8px 14px;
      border-radius: 6px;
      font-weight: bold;
      box-shadow: 0 4px 16px rgba(0,0,0,0.15);
      z-index: 1200;
    }
    h1 {
      color: #b8941f;
      margin-bottom: 20px;
    }
    .book-portfolio-thumb img {
      width: 280px;
      border-radius: 8px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.15);
    }
    .book-portfolio-view {
      display: block;
      margin-top: 8px;
      font-weight: bold;
      color: #d4af37;
    }
    .book-portfolio__inner {
      position: relative;
    }
    .book-portfolio-next, .book-portfolio-prev {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: #d4af37;
      color: white;
      border: none;
      font-size: 20px;
      font-weight: bold;
      padding: 10px 15px;
      cursor: pointer;
      border-radius: 6px;
      z-index: 1000;
    }
    .book-portfolio-next { right: 10px; }
    .book-portfolio-prev { left: 10px; }
  </style>
</head>
<body>

<a href="{{ url('/') }}" class="home-btn">🏠 العودة للرئيسية</a>

<h1>📖 المصحف الشريف</h1>

<!-- Thumbnail (الغلاف) -->
<div class="book-portfolio">
  <a data-fancybox data-options='{"touch": false}' href="#bookPortfolioViewer">
    <span class="book-portfolio-thumb">
      <img src="{{ asset('mushaf/' . $pages[0]) }}" alt="الغلاف" />
    </span>
    <span class="book-portfolio-view">اضغط للعرض</span>
  </a>
</div>

<!-- Book Viewer -->
<div id="bookPortfolioViewer" style="display:none;">
  <div class="book-portfolio__wrap">
    <div class="book-portfolio__inner">
      <div id="bookPortfolio">
        @foreach($pages as $index => $page)
        <div>
          <img src="{{ asset('mushaf/' . $page) }}" 
               alt="صفحة {{ $index+1 }}" 
               style="width:100%; height:auto;" 
               loading="lazy" />
        </div>
        @endforeach
      </div>

      <button type="button" ignore="1" class="book-portfolio-prev">⬅️</button>
      <button type="button" ignore="1" class="book-portfolio-next">➡️</button>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/turn.js/4.1.0/turn.min.js"></script>

<script>
$(document).ready(function() {

  function calcDims() {
    let screenWidth = $(window).width();
    let bookWidth = screenWidth > 1200 ? screenWidth - 320 : screenWidth - 40;
    let bookHeight = ((bookWidth / 2) * 1754) / 1241;
    return { bookWidth, bookHeight };
  }

  function initFlipbook() {
    const dims = calcDims();
    let lastPage = parseInt(localStorage.getItem('lastMushafPage')) || 1;

    $("#bookPortfolio").turn({
      autoCenter: true,
      width: dims.bookWidth,
      height: dims.bookHeight,
      elevation: 50,
      gradients: true,
      duration: 1200,
      direction: "rtl",
      page: lastPage,
      when: {
        turned: function(e, page) {
          localStorage.setItem('lastMushafPage', page);
        }
      }
    });
  }

  Fancybox.bind("[data-fancybox]", {
    on: {
      done: (fancybox, slide) => {
        if (slide.src === "#bookPortfolioViewer" && !$("#bookPortfolio").data("turn")) {
          initFlipbook();
        }
      },
      closing: () => {
        if ($("#bookPortfolio").data("turn")) {
          $("#bookPortfolio").turn("destroy").remove();
          $(".book-portfolio__inner").prepend('<div id="bookPortfolio"></div>');
          @foreach($pages as $index => $page)
          $("#bookPortfolio").append('<div><img src="{{ asset('mushaf/' . $page) }}" style="width:100%; height:auto;" loading="lazy" /></div>');
          @endforeach
        }
      }
    }
  });

  $(window).resize(function() {
    if ($("#bookPortfolio").data("turn")) {
      const dims = calcDims();
      $("#bookPortfolio").turn("size", dims.bookWidth, dims.bookHeight);
    }
  });

  $(document).on("click", ".book-portfolio-next", function() {
    $("#bookPortfolio").turn("next");
  });
  $(document).on("click", ".book-portfolio-prev", function() {
    $("#bookPortfolio").turn("previous");
  });

  $(document).on("keydown", function(e) {
    if (e.key === "ArrowLeft") {
      $("#bookPortfolio").turn("previous");
    } else if (e.key === "ArrowRight") {
      $("#bookPortfolio").turn("next");
    }
  });

});
</script>

</body>
</html>
