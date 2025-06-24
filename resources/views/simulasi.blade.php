<!DOCTYPE html>
<html>
<head>
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('Gerak-Maya1/assets/icon/gm2.png') }}" type="image/x-icon">
    <title>Gerak Maya | Simulasi Fisika</title>

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
    <link rel="stylesheet" href="{{ asset('Gerak-Maya1/two/custom.css') }}" />

    <!-- p5.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.9.0/p5.min.js"></script>
</head>
<body>

    <!-- todo navbar -->
    <div class="navbar">
      <div class="container">
        <div class="navbar-box">
          <div class="logo-container">
            <img src="{{ asset('Gerak-Maya1/assets/icon/gm2.png') }}" alt="Logo" class="logo">
            <span class="logo-text">GERAK MAYA</span>
          </div>
          <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="#simulasi">Simulasi</a></li>
            <li><a href="quiz.html">Quiz</a></li>
          </ul>
        
          
          <button class="hamburger hamburger--spin" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
    <!-- todo navbar -->
    
    <!-- todo header -->
    <div class="header" id="simulasi">
      <div class="content">
        <h1>⚙️ Simulasi Interaktif Gerak dan Gaya</h1>
        <hr>
        <h2>🔬 Hukum Newton dan Gerak: Dasar dari Segala Pergerakan</h2>
        <p>Setiap benda yang bergerak — baik itu apel yang jatuh, roda yang berputar, atau partikel yang tersebar — bergerak karena adanya <strong>gaya</strong>. Untuk memahami bagaimana dan mengapa benda bergerak, kita harus mengenal <strong>Hukum Newton</strong>. <br><br>
        Isaac Newton merumuskan tiga hukum dasar yang menjelaskan hubungan antara <strong>gaya</strong>, <strong>massa</strong>, dan <strong>percepatan</strong>. Hukum-hukum ini menjadi landasan utama dalam fisika klasik dan menjadi kunci untuk memahami seluruh fenomena gerak.</p>
        <div class="quote-box">
          <ul>
            <li><strong>Hukum Newton I</strong> – Benda akan tetap diam atau bergerak lurus beraturan jika tidak ada gaya yang bekerja padanya.</li>
            <li><strong>Hukum Newton II</strong> – Percepatan sebuah benda sebanding dengan gaya yang bekerja padanya dan berbanding terbalik dengan massanya (<em>F = m × a</em>).</li>
            <li><strong>Hukum Newton III</strong> – Setiap aksi memiliki reaksi yang sama besar dan berlawanan arah.</li>
          </ul>
        </div>

        <div class="row">
          <div class='two col'><div class='text-center'><img src='assets/img/graph.png' class='responsive expand'></div></div>
            <div class='ten col'>
              <p>Dalam fisika komputasi, benda sering kali disederhanakan sebagai partikel titik kecil tanpa dimensi yang posisinya dapat ditentukan dalam ruang 2D (atau bahkan 3D). Sebuah partikel yang tidak mengalami gaya apa pun akan tetap berada di tempatnya. Namun, ketika gaya seperti gravitasi, gesekan, atau tumbukan mulai bekerja, partikel itu akan mulai bergerak, mengikuti hukum-hukum dasar fisika.</p>
            </div>
        </div> 
        
        <h1>🧠 Mari Memahami Gerak Secara Visual</h1>
        <hr>
        <p>Gerak dalam fisika tidak hanya soal berpindah tempat, tetapi juga bagaimana benda itu bergerak: apakah kecepatannya konstan, dipercepat, melambat, atau bahkan berputar. Lewat simulasi interaktif yang kami sediakan, Anda dapat langsung bereksperimen dengan berbagai parameter seperti gaya, kecepatan awal, massa, sudut, dan hambatan. <br><br>
        Dengan mengubah-ubah nilai tersebut, Anda akan menyaksikan bagaimana setiap elemen memengaruhi lintasan dan pola gerak objek. Belajar jadi jauh lebih menarik ketika teori tidak hanya dibaca, tetapi bisa dilihat dan dimainkan. Ayo, eksplorasi gerak dalam dunia maya dan rasakan fisika secara nyata!</p>

        <h2>☰ Simulasi yang Tersedia:</h2>

        <div id="simulasi-container"></div>
         
          <meta charset="utf-8" />

          <div id="Simulasi1">
            <h3>🟢 Partikel Abadi — Gerak Lurus Beraturan (GLB)</h3>
            <p><strong>Visualisasi Hukum Newton I — Kelembaman</strong> <br>
              Bayangkan sebuah partikel kecil di ruang hampa — tidak ada gesekan, tidak ada dorongan tambahan, hanya meluncur dalam garis lurus dengan kecepatan tetap. Inilah <strong>Gerak Lurus Beraturan (GLB)</strong>, bentuk paling murni dari hukum Newton pertama. <br></p>
              <div class="quote-box">
                <ul>
                  <li><q>Benda akan tetap diam atau bergerak lurus beraturan jika tidak ada gaya yang bekerja padanya.</q></li>
                </ul>
              </div>
              <p>Dalam simulasi ini, Anda akan melihat bagaimana ketiadaan gaya menghasilkan gerak konstan. Tak perlu sentuhan atau dorongan lanjutan — kecepatan partikel tidak berubah. Ini adalah dasar untuk memahami konsep kelembaman, inti dari mekanika klasik.</p>
              <p>🎬 Ayo coba klik <strong>START</strong> dan lihat bagaimana partikel tersebut bergerak. <br></p>
            <button id="toggleGLBButton"
              style="margin-bottom: 10px; cursor: pointer; border: none; outline: none; padding: 10px 20px; border-radius: 20px; background-color: #ccc; color: black; font-weight: bold;">
              START
            </button>
            <div id="canvasGLB"></div>
            <p>Dalam simulasi ini, Anda telah menyaksikan sebuah partikel bergerak secara horizontal dengan laju dan arah yang stabil. Perhatikan bagaimana ia mempertahankan kecepatannya, sebuah representasi sempurna dari <strong>Gerak Lurus Beraturan (GLB)</strong>. Dan yang menarik, ketika partikel mencapai batas kanan layar, ia akan muncul kembali dari sisi kiri, melanjutkan gerakannya tanpa henti, menunjukan konsep gerak konstan yang tiada akhir! <br><br></p>
          </div>

          <div id="Simulasi2">
            <h3>🍎 Apel Virtual — Gerak Lurus Berubah Beraturan (GLBB)</h3>
            <p><strong>Eksperimen Hukum Newton II – Gaya dan Percepatan</strong> <br>
            Apa yang terjadi saat gaya mulai bekerja pada sebuah benda? Dalam simulasi ini, kita melepaskan sebuah "apel virtual" dari ketinggian tertentu dan membiarkannya jatuh akibat gravitasi. Hasilnya: apel mempercepat jatuh ke bawah — Inilah <strong>Gerak Lurus Berubah Beraturan (GLBB)</strong>.</p>
            <div class="quote-box">
                <ul>
                  <li><q>Rumus dasarnya: F = m × a, maka a = F/m, dan dalam kasus ini, a = g.</q></li>
                </ul>
              </div>
              <p>Anda dapat mengatur posisi awal Y (ketinggian tempat apel dilepaskan), nilai gravitasi (g) yang bekerja, serta delta time — yaitu durasi tiap langkah waktu dalam simulasi.</p>
              <p>Ketiganya bekerja bersama menentukan bagaimana percepatan terjadi dan seberapa cepat posisi apel berubah dari waktu ke waktu:</p>
              <div class="quote-box">
                <ul>
                  <li><strong>Semakin tinggi posisi awal Y</strong>, semakin lama waktu jatuhnya.</li>
                  <li><strong>Semakin besar gravitasi</strong>, semakin cepat percepatannya.</li>
                  <li><strong>Delta time</strong> memengaruhi resolusi waktu: semakin kecil, semakin halus gerakannya.</li>
                </ul>
              </div>
              <p>Dengan mengubah angka-angka ini, kamu bisa <strong>melihat langsung perubahan gerak apel</strong>. Jadi, kamu nggak cuma belajar teori, tapi juga bisa <strong>bereksperimen sendiri!</strong></p>
              <p style="margin-top: 1em;">🎬 Yuk, isi parameternya dan klik <strong>START</strong> untuk mulai simulasi!</p>
            
            <label for="initialY" style="color: white;">Posisi Awal (Y):</label>
            <input type="number" id="initialY" value="0" step="1"><br>
            
            <label for="gravity" style="color: white;">Gravitasi:</label>
            <input type="number" id="gravity" value="0.5" step="0.1"><br>

            <label for="deltaTime" style="color: white;">Delta Time:</label>
            <input type="number" id="deltaTime" value="1" step="0.1"><br><br>
            <button id="toggleAppleButton" aria-label="START or RESET Sketch" 
                style="margin-bottom: 10px; cursor: pointer; border: none; outline: none; padding: 10px 20px; border-radius: 20px; background-color: #ccc; color: black; font-weight: bold;">
                START
            </button>
            <div id="canvasApple"></div>
            <p>Dalam simulasi ini, Anda telah menyaksikan sebuah apel yang bergerak jatuh secara vertikal. Perhatikan dengan seksama bagaimana kecepatannya terus meningkat seiring waktu, sebuah bukti nyata adanya percepatan gravitasi yang menarik ke bawah. Di sini, Anda bisa mengamati langsung bagimana posisi dan kecepatan apel berubah secara teratur, memberikan pemahaman visual yang jelas tentang konsep <strong>Gerak Lurus Berubah Beraturan (GLBB)</strong>. <br><br></p>
          </div>
        
          <div id="Simulasi3">
            <h3>🌀 Cincin Gerak — Gerak Melingkar</h3>
            <p><strong>Ilustrasi Gaya Sentripetal dan Newton II</strong><br>
            Partikel kini bergerak melingkar. Meski kecepatannya tetap, arah geraknya selalu berubah — artinya, ada <strong>percepatan arah</strong> yang disebut percepatan sentripetal. Menurut hukum Newton II, itu berarti ada gaya yang menyebabkannya.</p>
            <div class="quote-box">
                <ul>
                  <li>F<sub>sentripetal</sub> = m × v<sup>2</sup> / r</li>
                </ul>
              </div>
              <p>Simulasi ini akan memperlihatkan bagaimana <strong>gaya sentripetal menjaga benda tetap berada di lintasan melingkar</strong>, serta bagaimana <strong>hambatan</strong> memengaruhi dinamika geraknya. Anda dapat menambahkan gesekan untuk mengamati bagaimana lintasan melingkar perlahan melemah atau bahkan berhenti — merepresentasikan kondisi nyata di mana tidak ada gerak yang benar-benar bebas hambatan.</p>
              <div class="quote-box">
                <ul>
                  <li><strong>Orientasi Rotasi</strong> – Secara default, objek bergerak searah jarum jam. Klik tombol ini untuk membalik arah rotasi menjadi berlawanan arah jarum jam.</li>
                  <li><strong>Hambatan</strong> – Saat diaktifkan (HAMBATAN: ON), gaya gesek mulai bekerja. Anda akan melihat bagaimana hambatan menyebabkan kecepatan berkurang secara bertahap, memperpendek durasi gerak, dan menjadikan simulasi ini lebih realistis dibandingkan model ideal tanpa gesekan.</li>
                </ul>
              </div>
              <p style="margin-top: 1em;">🎬 Yuk, klik <strong>START</strong> untuk mulai simulasi!</p>
            <button id="toggleCircularButton" style="margin-bottom: 10px; cursor: pointer; border: none; outline: none; padding: 10px 20px; border-radius: 20px; background-color: #ccc; color: black; font-weight: bold;">START</button>
            <button id="toggleDirectionButton" style="cursor: pointer; border: none; outline: none; padding: 10px 20px; border-radius: 20px; background-color: #ccc; color: black; font-weight: bold;">SEARAH JARUM JAM</button>
            <button id="toggleFrictionButton" style="cursor: pointer; border: none; outline: none; padding: 10px 20px; border-radius: 20px; background-color: #ccc; color: black; font-weight: bold;">HAMBATAN: OFF</button>
            <div id="canvasMelingkar"></div>
            <p>Setelah simulasi dimulasi, objek bergerak melingkar karena terus-menerus mengalami percepatan arah ke pusat — itulah gaya sentripetal. Tanpa gaya ini, objek akan keluar dari lintasan. Saat hambatan diaktifkan, gesekan mulai bekerja sehingga memperhambat gerak secara bertahap. Ini memperlihatkan bahwa dalam dunia nyata, tidak ada gerak yang sepenuhnya bebas hambatan. <br><br></p>
          </div>
        
          <div id="Simulasi4">
            <h3>🏀 Sudut Lempar — Kombinasi GLB dan GLBB</h3>
            <p><strong>Perpaduan Hukum Newton I & II dalam Satu Lintasan</strong> <br>
            Lempar bola ke udara secara miring — apa yang terjadi? Ia tidak hanya naik dan turun, tapi juga bergerak ke depan. Gerak ini disebut <strong>parabola</strong>.</p>
            <div class="quote-box">
                <ul>
                  <li><strong>Gerak horizontal (GLB)</strong> → kecepatan konstan</li>
                  <li><strong>Gerak vertikal (GLBB)</strong> → dipercepat oleh gravitasi</li>
                </ul>
              </div>
              <p style="margin-top: 1em;">🎬 Yuk, isi parameternya dan klik <strong>START</strong> untuk mulai simulasi!</p>
            <label style="color: white;">Kecepatan Awal (v₀): <input type="number" id="v0" value="50"></label><br>
            <label style="color: white;">Sudut (°): <input type="number" id="angle" value="45"></label><br><br>
            <button id="toggleParabolaButton" style="margin-bottom: 10px; cursor: pointer; border: none; outline: none; padding: 10px 20px; border-radius: 20px; background-color: #ccc; color: black; font-weight: bold;">
              START
            </button>
            <div id="canvasParabola"></div>
            <p>Simulasi ini menampilkan lintasan <strong>dua dimensi</strong> yang kompleks tapi terprediksi. Anda dapat melihat dengan jelas bagaimana <strong>resultan gaya</strong> dari dua arah berbeda membentuk kurva parabola. Ini adalah pelajaran visual tentang bagaimana hukum-hukum Newton bekerja <strong>bersamaan</strong>, bukan secara terpisah. <br><br></p>
          </div>

          <div id="Simulasi5">
            <h3>🌫️ Awan Difusi — Gerak Acak (Brownian Motion)</h3>
            <p><strong>Fisikanya Molekul & Tumbukan Mikro</strong><br>
            Sekilas terlihat kacau — partikel bergerak tanpa arah pasti, membelok dan memantul secara acak. Tapi jangan salah, <strong>gerak acak</strong> ini tetap mengikuti hukum Newton II.
            Setiap kali partikel bertumbukan dengan partikel lain (seperti molekul udara atau cairan), ada gaya sesaat yang bekerja, menghasilkan percepatan kecil dan perubahan arah.</p>
            <div class="quote-box">
                <ul>
                  <li>F = m × a tetap berlaku — hanya saja dalam skala <strong>mikroskopik</strong> dan <strong>berulang-ulang</strong>.</li>
                </ul>
              </div>
              <p style="margin-top: 1em;">🎬 Yuk, atur laju dan klik <strong>START</strong> untuk mulai simulasi!</p>
            <div id="kontrolDifusi" style="margin-bottom: 10px; display: flex; align-items: center; gap: 20px;">
            <button id="toggleDiffusionButton"
              style="cursor: pointer; border: none; outline: none; padding: 10px 20px; border-radius: 20px; background-color: #ccc; color: black; font-weight: bold;">
              START
            </button>
              <label for="diffusionSlider" style="font-weight: 500; color: white;">
               Laju Difusi:
              </label>
              <input type="range" id="diffusionSlider" min="0.5" max="5" step="0.1" value="2" style="width: 150px;">
            </div>
            <div id="canvasDifusi"></div>
            <p>Sekilas, gerak partikel dalam simulasi ini tampak <strong>acak dan tidak beraturan</strong> — mereka membelok, memantul, dan berubah arah seolah tanpa sebab. Namun di balik kekacauan itu, ada <strong>hukum fisika yang tetap berlaku dengan ketat</strong>. Setiap partikel mengalami <strong>tumbukan mikroskopik</strong> dengan partikel lain di sekitarnya, seperti molekul udara atau cairan. Setiap tumbukan menghasilkan <strong>gaya sesaat</strong>, yang memicu <strong>percepatan kecil</strong> dan mengubah arah geraknya.</p>
            <p>Masih Mengikuti hukum Newton II, gaya yang sangat kecil bekerja dalam waktu yang sangat singkat —tapi tetap menyebabkan percepatan dan perubahan gerak. Peristiwa ini terjadi <strong>berulang-ulang dalam skala mikroskopik</strong>, menciptakan pola gerak acak yang kita kenal sebagai <strong>Brownian Motion</strong>. <br><br></p>
          </div>
       
          <h2>🎓 Penutup: Dari Hukum ke Visual, Dari Konsep ke Pengalaman</h2>
          <p>Hukum Newton tidak lagi hanya kata-kata di buku atau rumus di papan tulis. Lewat simulasi-simulasi ini, kita melihat bagaimana teori bekerja secara nyata — <strong>gerak yang bisa diamati, diubah, dan dianalisis langsung</strong>.</p>
          <p>Dari partikel yang bergerak lurus tanpa gangguan, hingga molekul yang kacau dalam gerak acak — semuanya tunduk pada hukum fisika yang sama. Setiap simulasi memberi kita cara baru untuk <strong>merasa terlibat dalam fisika</strong>, bukan hanya memahaminya.</p>
          <div class="quote-box">
                <ul>
                  <li>Fisika bukan hanya tentang menjawab “apa yang terjadi,” tetapi <strong>mengapa itu terjadi</strong> — dan simulasi memberi kita jendela langsung untuk mengamati dunia itu bekerja.</li>
                </ul>
              </div>

          <h2>🎮 Yuk, Lanjut Eksplorasi!</h2>
          <p>Sudah memahami gerak dasar? Saatnya menjelajah ke simulasi yang lebih kompleks. Karena dalam dunia fisika maya ini, belajar bukan hanya soal tahu — tapi juga soal mencoba dan mengalami.</p>
          <h3>🧵 Simulasi Kain — Fisika Lembut yang Kompleks</h3>
          <p><strong>Dari Titik ke Jaring: Saat Gerak Bertemu Elastisitas</strong></p>
          <p>Setelah memahami gerak partikel satu per satu, kini saatnya naik level ke gerak kolektif: <br>
            Bagaimana jika ratusan titik terhubung membentuk sebuah jaring — dan masing-masing bisa bergerak, tertarik, dan berinteraksi?</p>
          
          <div class="quote-box">
                <ul>
                  <li>Itulah dunia simulasi kain. Di sini, <strong>fisika bekerja secara bersamaan</strong> pada setiap simpul kain:</li>
                  <li>🔗 Gaya tegangan antar titik,</li>
                  <li>🌬️ gravitasi yang menarik ke bawah,</li>
                  <li>⚖️ dan gaya balik dari elastisitas — semuanya saling memengaruhi.</li>
                </ul>
              </div>

          <p><strong>Apa yang Bisa Diamati?</strong></p>
          <p>▶️ <strong>Gerakan realistik</strong> kain saat jatuh, melambai, atau tergantung. <br>
             ▶️ Efek <strong>gaya luar</strong> terhadap permukaan kain. <br>
             ▶️ Bagaimana <strong>stabilitas dan ketegangan</strong> diatur oleh hukum Newton dan integrasi numerik (Verlet Integration).</p>

          <p><strong>Anda bisa mainkan kainnya!</strong></p>
          <p>▶️ Menarik atau merobek bagian kain tertentu.<br>
             ▶️ Mengubah ukuran.<br>
             ▶️ Melihat bagaimana perubahan kecil menghasilkan <strong>gerak dinamis</strong></p>

          <div class="quote-box">
                <ul>
                  <li>Dari sekadar titik ke permukaan yang hidup — <br>
                      <strong>Fisika kain adalah bukti bahwa kompleksitas bisa muncul dari kesederhanaan</strong>.</li>
                </ul>
              </div>

          <p><strong>🕹️ Kain Digital, Aksi Nyata!</strong></p>
          <p>Eksperimen seru dengan gaya, gravitasi, dan gerakan — semua di atas selembar kain virtual. Coba dan rasakan sendiri keajaibannya!</p>

          <a href="cloth.html"> <button class="animated-button">
            <span>Mainkan</span>
            <span></span>
          </button></a> <br><br>
          
        <h1>🧩 Uji Pemahamanmu di Kuis Interaktif!</h1>
        <hr>
        <p>Sudah menjelajahi simulasi dan melihat gaya dan gerak bekerja langsung?
           Kini saatnya mengasah pemahamanmu lewat kuis singkat!</p>

        <div class="quote-box">
                <ul>
                  <li>Karena belajar bukan hanya melihat dan mencoba — <br>
                      tapi juga <strong>merenungkan dan menguji diri</strong>.</li>
                </ul>
              </div>

        <p><strong>✅ Siap? Klik tombol di bawah ini dan mulai tantang dirimu:</strong></p>
        <a href="quiz.html"> <button class="animated-button">
            <span>Kerjakan</span>
            <span></span>
          </button></a> <br><br>
          
        </div>

     </div>
    <!-- todo header -->
   
    <!-- JS -->
     <script src="{{ asset('Gerak-Maya1/assets/js/simulasi-1.js') }}"></script>
     <script src="{{ asset('Gerak-Maya1/assets/js/simulasi-2.js') }}"></script>
     <script src="{{ asset('Gerak-Maya1/assets/js/simulasi-3.js') }}"></script>
     <script src="{{ asset('Gerak-Maya1/assets/js/simulasi-4.js') }}"></script>
     <script src="{{ asset('Gerak-Maya1/assets/js/simulasi-5.js') }}"></script>
     
    <script src="{{ asset('Gerak-Maya1/two/sketch.js') }}"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.11.1/addons/p5.sound.min.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>