<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="shortcut icon" href="{{ asset('Gerak-Maya1/assets/icon/gm.png') }}" type="image/x-icon" />
  <title>Kuis Fisika Gerak</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f7fb;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #2c3e50;
      color: white;
      padding: 1.5rem;
      text-align: center;
    }
    .container {
      max-width: 700px;
      margin: 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .cta-button {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      background-color: #27ae60;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.3s ease;
      cursor: pointer;
      font-size: 1rem;
      margin-top: 1rem;
    }
    .cta-button:hover {
      background-color: #219150;
    }
    .popup, .score-popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      display: none;
      z-index: 999;
      max-width: 90%;
      width: 500px;
      max-height: 90vh;
      overflow-y: auto;
    }
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      z-index: 998;
    }
    .question-box {
      margin-top: 1.5rem;
    }
    .option {
      display: block;
      margin-bottom: 0.75rem;
      font-size: 1rem;
    }
    label input[type="radio"] {
      margin-right: 0.5rem;
    }
    select {
      padding: 0.5rem;
      font-size: 1rem;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <header>
    <h1>🧠 Kuis Fisika Gerak</h1>
    <p>Sudah siap menguji pemahamanmu setelah eksplorasi simulasi?</p>
  </header>

  <div class="container">
    <h2>🎯 Ayo Uji Otak Fisikamu!</h2>
    <p>Pilih tingkat kesulitan dan jawab pertanyaan seputar grak.</p>
    <label for="difficulty">Tingkat Kesulitan:</label>
    <select id="difficulty">
      <option value="easy">Mudah 😊</option>
      <option value="hard">Sulit 🔥</option>
    </select><br><br>
    <button class="cta-button" onclick="startQuiz()">🔍 Mulai Kuis Sekarang</button>
  </div>

  <div class="overlay" id="overlay"></div>

  <div class="popup" id="popup">
    <h2 id="question-title"></h2>
    <div class="question-box">
      <h3 id="question-text"></h3>
      <div id="options"></div>
    </div>
    <br />
    <button class="cta-button" onclick="nextQuestion()">Lanjut ➡️</button>
  </div>

  <div class="score-popup" id="scorePopup">
    <h2>🎉 Kuis Selesai!</h2>
    <div id="scoreText"></div>
    <button class="cta-button" onclick="closeScore()">Tutup</button>
  </div>

  <script>
    const easyQuestions = [
      { question: "Apel jatuh karena adanya gaya...", options: ["Gravitasi 🌍", "Gesek 💨", "Normal ↕️", "Listrik ⚡"], answer: 0 },
      { question: "Benda yang terus bergerak lurus dengan kecepatan tetap tanpa gaya disebut mengalami…", options: ["Gerak Melingkar", "Gerak Lurus Beraturan", "Gerak Acak", "Gerak Parabola"], answer: 1 },
      { question: "Dalam GLBB, percepatan benda ditentukan oleh…", options: ["Gaya dan massa", "Kecepatan awal", "Gesekan", "Waktu tempuh"], answer: 0 },
      { question: "Lintasan yang dihasilkan dari gabungan GLB (horizontal) dan GLBB (vertikal) adalah…", options: ["Garis lurus", "Lingkaran", "Parabola", "Spiral"], answer: 2 },
      { question: "Gaya sentripetal bekerja untuk menjaga benda…", options: ["Berada di lintasan melingkar", "Berhenti", "Melaju lurus", "Berputar balik"], answer: 0 },
      { question: "Apa yang terjadi jika tidak ada gaya yang bekerja pada benda bergerak?", options: ["Melayang", "Diam", "Bergerak lurus konstan", "Bergetar"], answer: 2 },
      { question: "Simulasi difusi menunjukkan gerakan partikel yang disebut…", options: ["Gerak melingkar", "Gerak harmonik", "Gerak acak", "Gerak jatuh bebas"], answer: 2 },
      { question: "Rumus gaya sentripetal yang benar adalah…", options: ["F = m × a", "F = m × v² / r", "F = m × g", "F = m / r"], answer: 1 },
      { question: "Dalam gerak vertikal ke atas, gaya gravitasi selalu bekerja ke arah…", options: ["Atas", "Bawah", "Samping", "Melingkar"], answer: 1 },
      { question: "Gerakan molekul udara yang terus bertumbukan menyebabkan…", options: ["Gerak lurus", "Gerak seragam", "Gerak osilasi", "Gerak Brown"], answer: 3 }
    ];

    const hardQuestions = [
      { question: "Apa bentuk grafik kecepatan terhadap waktu pada GLBB dipercepat?", options: ["Lurus menaik", "Lengkung naik", "Lurus turun", "Datar"], answer: 0 },
      { question: "Apa yang dimaksud dengan Delta Time?", options: ["Perubahan posisi apel per detik", "Durasi setiap langkah waktu dalam simulasi", "Selisih antara kecepatan awal dan akhir", "Waktu total yang dibutuhkan apel untuk jatuh"], answer: 1 },
      { question: "Energi kinetik terbesar saat benda berada di…", options: ["Puncak", "Tengah", "Dasar", "Mengambang"], answer: 2 },
      { question: "Jika massa benda dilipatgandakan, maka gaya sentripetal yang dibutuhkan akan…", options: ["Tetap sama", "Dua kali lipat", "Empt kali lipat", "Tidak terdefinisi"], answer: 1 },
      { question: "Simulasi melingkar melibatkan…", options: ["Kecepatan konstan", "Arah konstan", "Percepatan radial", "Tidak ada gaya"], answer: 2 },
      { question: "Kecepatan sudut dinyatakan dalam satuan…", options: ["Meter per detik (m/s)", "Radian per detik (rad/s)", "Newton", "Kilogram"], answer: 1 },
      { question: "Hukum Newton II dapat dirumuskan sebagai…", options: ["F = m/v", "F = m × a", "F = a/m", "F = ma²"], answer: 1 },
      { question: "Waktu tempuh gerak parabola bergantung pada…", options: ["Massa", "Gravitasi & kecepatan awal", "Jarak", "Gaya normal"], answer: 1 },
      { question: "Pada simulasi difusi dua dimensi, partikel bergerak secara acak ke...", options: ["Satu arah tetap", "Tidak bergerak", "Empat arah (atas, bawah, kiri, kanan)", "Hanya ke kanan dan ke bawah"], answer: 2 },
      { question: "Jika gaya total yang bekerja pada benda adalah nol, maka…", options: ["Benda akan selalu diam", "Benda melaju konstan", "Benda berhenti", "Benda melingkar"], answer: 1 }
    ];

    let selectedQuestions = [];
    let currentQuestion = 0;
    let score = 0;
    let userAnswers = [];

    function shuffleArray(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
    }

    function startQuiz() {
      const level = document.getElementById("difficulty").value;
      selectedQuestions = level === "easy" ? [...easyQuestions] : [...hardQuestions];
      shuffleArray(selectedQuestions);
      selectedQuestions = selectedQuestions.slice(0, 10);
      currentQuestion = 0;
      score = 0;
      userAnswers = [];
      document.getElementById("overlay").style.display = "block";
      document.getElementById("popup").style.display = "block";
      showQuestion();
    }

    function showQuestion() {
      const q = selectedQuestions[currentQuestion];
      document.getElementById("question-title").textContent = `Pertanyaan ${currentQuestion + 1} dari 10`;
      document.getElementById("question-text").textContent = q.question;
      const optionsContainer = document.getElementById("options");
      optionsContainer.innerHTML = "";
      q.options.forEach((option, index) => {
        const label = document.createElement("label");
        label.classList.add("option");
        label.innerHTML = `<input type="radio" name="quiz" value="${index}"> ${option}`;
        optionsContainer.appendChild(label);
      });
    }

    function nextQuestion() {
      const radios = document.getElementsByName("quiz");
      let selected = null;
      for (let r of radios) {
        if (r.checked) selected = parseInt(r.value);
      }
      if (selected === null) {
        alert("Pilih jawaban terlebih dahulu!");
        return;
      }

      userAnswers.push(selected);
      if (selected === selectedQuestions[currentQuestion].answer) {
        score++;
      }
      currentQuestion++;
      if (currentQuestion < selectedQuestions.length) {
        showQuestion();
      } else {
        showScore();
      }
    }

    function showScore() {
      document.getElementById("popup").style.display = "none";
      const scoreText = document.getElementById("scoreText");
      let resultHTML = `<strong>Skor akhir kamu: ${score} dari ${selectedQuestions.length}</strong><br><br>`;

      selectedQuestions.forEach((q, index) => {
        const correct = q.answer;
        const user = userAnswers[index];
        const isCorrect = user === correct;

        resultHTML += `<div style="margin-bottom:1rem;">
          <strong>${index + 1}. ${q.question}</strong><br/>
          Jawabanmu: <span style="color:${isCorrect ? 'green' : 'red'}">
            ${q.options[user] || "(tidak dijawab)"} ${isCorrect ? "✅" : "❌"}
          </span><br/>
          Jawaban benar: <span style="color:green;">${q.options[correct]}</span>
        </div>`;
      });

      scoreText.innerHTML = resultHTML;
      document.getElementById("scorePopup").style.display = "block";
    }

    function closeScore() {
      document.getElementById("overlay").style.display = "none";
      document.getElementById("scorePopup").style.display = "none";
    }
  </script>
</body>
</html>
