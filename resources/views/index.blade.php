<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('Gerak-Maya1/assets/icon/gm2.png') }}" type="image/x-icon">

    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Animate Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Hamburger -->
    <link rel="stylesheet" href="{{ asset('Gerak-Maya1/dist/css/hamburgers.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('Gerak-Maya1/dist/css/style.css') }}" />
    <title>Gerak Maya | Simulasi Fisika</title>
  </head>
  <body id="home">
    <!-- todo Navbar -->
    <div class="navbar">
      <div class="container">
        <div class="navbar-box">
          <div class="logo-container">
            <img src="{{ asset('Gerak-Maya1/assets/icon/gm2.png') }}" alt="Logo" class="logo">
            <span class="logo-text">GERAK MAYA</span>
          </div>
          <ul class="menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Services</a></li>
          </ul>
        
          
          <button class="hamburger hamburger--spin" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
    <!-- todo Navbar -->

    <!-- todo Header -->
    <div class="header">
      <div class="container"></div>
      <div class="header-box">
        <div class="title">
          <h1 class="animate__animated animate__jackInTheBox animate__delay-1s">
            Simulasi Fisika <br />
          </h1>
          <h2 class="animate__animated animate__jackInTheBox animate__delay-1s">
            Gerak Maya <br/>
          </h2>
          
        </div>

        <div class="hero-img">
          <img src="{{ asset('Gerak-Maya1/assets/img/ab.png') }}" alt="unsplash.com" />
          <img src="{{ asset('Gerak-Maya1/assets/img/bc.png') }}" alt="unsplash.com" />
          <img src="{{ asset('Gerak-Maya1/assets/img/cd.png') }}" alt="unsplash.com" />
          <img src="{{ asset('Gerak-Maya1/assets/img/de.png') }}" alt="unsplash.com" />
        </div>
      </div>
    </div>
    <!-- todo Header -->

    <!-- todo About -->
     <div class="about" id="about">
        <div class="container">
            <h1 data-aos="zoom-in" data-aos-duration="1000">Selamat Datang di <br> Simulasi Fisika Gerak Maya
            </h1>
            <p data-aos="zoom-in" data-aos-duration="1000">Pahami konsep gerak dengan cara yang lebih mudah, menyenangkan, dan interaktif. Kami menghadirkan simulasi visual sederhana dari berbagai jenis gerak dalam fisika — dari gerak lurus hingga melingkar — serta penjelasan tentang bagaimana gaya mempengaruhi gerakan melalui hukum Newton. <br>🌟 Lihat. Pahami. Rasakan geraknya.</p>
        </div>
     </div>
     <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 100 1440 320">
        <path
          fill="#111111"
          fill-opacity="1"
          d="M0,256L48,250.7C96,245,192,235,288,245.3C384,256,480,288,576,282.7C672,277,768,235,864,229.3C960,224,1056,256,1152,261.3C1248,267,1344,245,1392,234.7L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"
        ></path>
      </svg>
    <!-- todo About -->

    <!-- todo Services -->
    <div class="services" id="services">
      <div class="container">
        <div class="services-box">
          <div class="box">
            <i class="fa-solid fa-award" data-aos="fade-up" data-aos-duration="1000"></i>
            <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Layanan Kami</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">Kuasai simulasi gaya dan gerak dengan kuis seru! <br> 
              Belajar fisika tak pernah semudah ini.</p>
          </div>
          <div class="boxes">
            <div class="boxs">
              <img src="{{ asset('Gerak-Maya1/assets/img/newton.png') }}" alt="" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500" />
              <div class="desc" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                <h1>Gerak dan <br>Hukum Newton</h1>
                <p>Gerak adalah perubahan posisi suatu benda terhadap titik acuan dalam suatu selang waktu. Dalam fisika, gerak dibedakan berdasarkan lintasan, kecepatan, dan percepatan, seperti gerak lurus beraturan, lurus berubah beraturan, melingkar, parabola, hingga gerak acak. Untuk memahami mengapa suatu benda dapat bergerak atau mengalami perubahan gerak, kita perlu memahami konsep gaya. Di sinilah Hukum Newton berperan penting — menjelaskan hubungan antara gaya, massa, dan percepatan — yang menjadi dasar utama dalam menganalisis semua jenis gerak dalam mekanika klasik.</p>
              </div>
            </div>
            <div class="boxs">
              <div class="desc" data-aos="fade-up" data-aos-duration="1000">
                <h1>Uji Pemahaman</h1>
                <p>Siap menguji sejauh mana pemahamanmu tentang konsep-konsep gerak dan Hukum Newton? Kuis singkat ini dirancang khusus untuk mengukur seberapa jauh kamu menguasai materi yang telah dipelajari. Jawab pertanyaan dengan cermat untuk melihat hasil dan identifikasi area yang mungkin perlu kamu tinjau kembali. <br><br>
                Ini adalah kesempatanmu untuk mengevaluasi pemahamanmu secara mandiri. Raih skor terbaikmu dan buktikan penguasaanmu di bidang fisika!</p>
              </div>
              <img src="{{ asset('Gerak-Maya1/assets/img/quiz.png') }}" alt="" data-aos="zoom-in" data-aos-duration="1000" />
            </div>
            <div class="boxs">
              <img src="{{ asset('Gerak-Maya1/assets/img/gerak.jpeg') }}" alt="" data-aos="zoom-in" data-aos-duration="1000" />
              <div class="desc" data-aos="fade-up" data-aos-duration="1000">
                <h1>Jelajahi Simulasi Sekarang</h1>
                <p>🎮 Klik di bawah ini untuk mulai belajar fisika dengan cara baru!</p>
                <a href="{{ url('simulasi') }}">➡️
                  <button class="animated-button">
                    <span>MULAI</span>
                    <span></span>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#111111"
        fill-opacity="1"
        d="M0,128L40,144C80,160,160,192,240,186.7C320,181,400,139,480,149.3C560,160,640,224,720,224C800,224,880,160,960,149.3C1040,139,1120,181,1200,181.3C1280,181,1360,139,1400,117.3L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
      ></path>
    </svg>
    <!-- todo Services -->

    <!-- todo Footer -->
    <div class="footer">
      <div class="container">
        <div class="footer-box">
          <div class="box">
            <div>
              <img src="{{ asset('Gerak-Maya1/assets/icon/gm2.png') }}" alt="">
              <h2>Gerak Maya</h2>
            </div>
            <p>Sebagai mahasiswa Teknik Informatika, saya sedang mengembangkan website simulasi fisika untuk memenuhi tugas akhir. Tujuannya adalah untuk memvisualisasikan simulasi fisika sederhana agar lebih mudah dipahami.</p>
          </div>
          <div class="box">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#services">Services</a>
          </div>
        </div>
      </div>
    </div>
    <!-- todo Footer -->

    <!-- todo Copyright -->
    <div class="copyright">
      <div class="container">
        <div class="copy-box">
          <p>&copy; Copyright 2024 by Shofi Salsabila, All Right Reserved.</p>
        </div>
      </div>
    </div>
    <!-- todo Copyright -->

    <!-- todo Preloader --> 
     <div class="loader"> 
  <div class="wrapper">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="shadow"></div>
    <div class="shadow"></div>
    <div class="shadow"></div>
</div>
  </div>
    <!-- todo Preloader -->

    <!-- JS -->
    <script src="{{ asset('Gerak-Maya1/dist/js/script.js') }}"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
