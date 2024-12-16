<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beasiswa Walk Together</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    /* Reset Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f7f7f7;
      color: #333;
      overflow-x: hidden;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Hero Section */
    .hero {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #f6e58d, #f9ca24);
      text-align: center;
      animation: fadeIn 2s ease-out;
    }

    .hero h1 {
      font-size: 4rem;
      font-weight: 700;
      letter-spacing: -2px;
      text-transform: uppercase;
      color: #1f2a44;
      animation: slideIn 1.5s ease-out;
    }

    .hero p {
      font-size: 1.2rem;
      font-weight: 500;
      margin-top: 20px;
      color: #1f2a44;
      animation: fadeInText 2s ease-out;
    }

    .cta-btn {
      background-color: #f39c12;
      color: #fff;
      padding: 15px 35px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 30px;
      margin-top: 30px;
      transition: transform 0.3s ease, background-color 0.3s ease;
      animation: fadeInButton 2s ease-out;
    }

    .cta-btn:hover {
      background-color: #e67e22;
      transform: scale(1.05);
    }

    /* Animations */
    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes slideIn {
      0% { transform: translateY(100px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeInText {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes fadeInButton {
      0% { opacity: 0; transform: scale(0.8); }
      100% { opacity: 1; transform: scale(1); }
    }

    /* Card Section */
    .info-section {
      background-color: #fff;
      padding: 80px 0;
      text-align: center;
      animation: fadeIn 3s ease-out;
    }

    .info-section h2 {
      font-size: 3.5rem;
      font-weight: 600;
      margin-bottom: 30px;
      color: #f39c12;
    }

    .card-container {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      padding: 0 20px;
    }

    .card {
      background-color: #fff;
      border-radius: 15px;
      width: 300px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.4s ease, box-shadow 0.3s ease;
      backdrop-filter: blur(10px);
      margin-top: 20px;
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-bottom: 2px solid #f39c12;
    }

    .card-content {
      padding: 20px;
      color: #333;
      text-align: left;
    }

    .card h3 {
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 15px;
      color: #1f2a44;
    }

    .card p {
      font-size: 1rem;
      font-weight: 400;
      margin-bottom: 20px;
    }

    .card-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .price {
      font-size: 1.2rem;
      font-weight: 700;
      color: #f39c12;
    }

    .buy-btn {
      background-color: #f39c12;
      color: #fff;
      padding: 12px 30px;
      border-radius: 30px;
      font-size: 1.1rem;
      font-weight: 600;
      border: none;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .buy-btn:hover {
      background-color: #e67e22;
      transform: scale(1.05);
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }

    .card:hover {
      transform: translateY(-15px);
      box-shadow: 0px 20px 60px rgba(0, 0, 0, 0.2);
    }

    /* Footer Section */
    .footer {
      background-color: #f7f7f7;
      padding: 50px 20px;
      text-align: center;
    }

    .footer p {
      font-size: 1.1rem;
      color: #aaa;
    }

    .social-links a {
      margin: 0 15px;
      color: #f39c12;
      font-size: 1.8rem;
      transition: color 0.3s ease;
    }

    .social-links a:hover {
      color: #e67e22;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 3rem;
      }

      .cta-btn {
        font-size: 1rem;
        padding: 12px 25px;
      }

      .info-section h2 {
        font-size: 2.5rem;
      }

      .card-container {
        gap: 20px;
        justify-content: center;
      }
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero">
    <div>
      <h1>Beasiswa Terbaik Menanti Anda</h1>
      <p>Ambil langkah pertama untuk masa depan gemilang dengan beasiswa kami.</p>
      <a href="#info" class="cta-btn">Cari Beasiswa Sekarang</a>
    </div>
  </section>

  <!-- Info Section (Scholarship Options) -->
  <section id="info" class="info-section">
    <h2>Program Beasiswa Kami</h2>
    <div class="card-container">
      <!-- Card 1: Webinar -->
      <div class="card">
        <img src="assets/img/webinar.jpg" alt="Webinar Beasiswa">
        <div class="card-content">
          <h3>Webinar Beasiswa</h3>
          <p>Ikuti webinar kami untuk mendapatkan wawasan tentang beasiswa di luar negeri.</p>
          <div class="card-footer">
            <span class="price">Gratis</span>
            <button class="buy-btn">Daftar Sekarang</button>
          </div>
        </div>
      </div>

      <!-- Card 2: Mentoring -->
      <div class="card">
        <img src="assets/img/mentoring.jpg" alt="Mentoring Beasiswa">
        <div class="card-content">
          <h3>Mentoring Beasiswa</h3>
          <p>Dapatkan bimbingan langsung dari para mentor ahli di bidang beasiswa.</p>
          <div class="card-footer">
            <span class="price">Rp 500.000</span>
            <button class="buy-btn">Daftar Sekarang</button>
          </div>
        </div>
      </div>

      <!-- Card 3: Workshop -->
      <div class="card">
        <img src="assets/img/workshop.jpg" alt="Workshop Beasiswa">
        <div class="card-content">
          <h3>Workshop Beasiswa</h3>
          <p>Pelajari cara menulis esai beasiswa yang memenangkan hati pemberi beasiswa.</p>
          <div class="card-footer">
            <span class="price">Rp 350.000</span>
            <button class="buy-btn">Daftar Sekarang</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="footer">
    <p>&copy; 2024 Walk Together. Semua hak dilindungi.</p>
    <div class="social-links">
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-instagram"></a>
      <a href="#" class="fa fa-linkedin"></a>
    </div>
  </footer>

</body>
</html>
