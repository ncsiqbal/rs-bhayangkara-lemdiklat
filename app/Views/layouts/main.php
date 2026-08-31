<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Rumah Sakit Bhayangkara Lemdiklat') ?></title>

    <meta
        name="description"
        content="Portal informasi Rumah Sakit Bhayangkara Lemdiklat"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --navy: #092B49;
            --blue: #1268A8;
            --cyan: #13A8B8;
            --light-blue: #EAF7FA;
            --surface: #FFFFFF;
            --background: #F7FAFC;
            --text: #102A43;
            --muted: #66788A;
            --border: #E5EDF3;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        /* =========================
           NAVBAR
        ========================= */

        .main-navbar {
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(229,237,243,.8);
        }

        .brand {
            color: var(--navy);
            font-weight: 800;
            letter-spacing: -.6px;
            line-height: 1;
        }

        .brand small {
            display: block;
            margin-top: 6px;
            color: var(--muted);
            font-size: 9px;
            letter-spacing: 1.5px;
            font-weight: 700;
        }

        .nav-link-custom {
            color: #526273 !important;
            font-size: 13px;
            font-weight: 600;
            padding: 10px 13px !important;
            border-radius: 8px;
        }

        .nav-link-custom:hover {
            color: var(--blue) !important;
            background: #F1F7FA;
        }

        .btn-primary-custom {
            background: var(--navy);
            border: 0;
            color: white;
            border-radius: 10px;
            padding: 11px 18px;
            font-size: 13px;
            font-weight: 700;
            transition: .2s ease;
        }

        .btn-primary-custom:hover {
            background: var(--blue);
            color: white;
            transform: translateY(-1px);
        }

        /* =========================
           GLOBAL
        ========================= */

        .section {
            padding: 90px 0;
        }

        .section-label {
            color: var(--cyan);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section-title {
            color: var(--navy);
            font-size: clamp(30px, 4vw, 44px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1.8px;
            margin-bottom: 15px;
        }

        .section-description {
            color: var(--muted);
            line-height: 1.8;
            max-width: 580px;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;
            overflow: hidden;
            min-height: 650px;
            display: flex;
            align-items: center;
            background:
                radial-gradient(circle at 85% 15%, rgba(19,168,184,.16), transparent 28%),
                radial-gradient(circle at 10% 90%, rgba(18,104,168,.10), transparent 30%),
                #F7FAFC;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            border: 1px solid rgba(18,104,168,.08);
            right: -250px;
            top: -180px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            border: 1px solid rgba(19,168,184,.08);
            right: -130px;
            top: -80px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            border-radius: 100px;
            background: white;
            border: 1px solid var(--border);
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 8px 25px rgba(9,43,73,.05);
        }

        .hero-badge span {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--cyan);
        }

        .hero-title {
            margin-top: 24px;
            color: var(--navy);
            font-size: clamp(42px, 6vw, 72px);
            font-weight: 800;
            letter-spacing: -4px;
            line-height: .98;
            max-width: 700px;
        }

        .hero-title .highlight {
            color: var(--blue);
        }

        .hero-description {
            color: var(--muted);
            max-width: 570px;
            font-size: 15px;
            line-height: 1.8;
            margin-top: 25px;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn-outline-custom {
            border: 1px solid var(--border);
            background: white;
            color: var(--navy);
            padding: 11px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
        }

        .btn-outline-custom:hover {
            border-color: var(--blue);
            color: var(--blue);
        }

        /* Hero visual */

        .hero-visual {
            position: relative;
            height: 480px;
        }

        .hero-card-main {
            position: absolute;
            width: 350px;
            height: 420px;
            right: 40px;
            top: 20px;
            border-radius: 30px;
            overflow: hidden;
            background:
                linear-gradient(145deg, #0B365C, #1268A8 55%, #13A8B8);
            box-shadow: 0 35px 80px rgba(9,43,73,.20);
        }

        .hero-card-main::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.18);
            right: -80px;
            top: -50px;
        }

        .hero-card-main::after {
            content: "+";
            position: absolute;
            font-size: 220px;
            font-weight: 800;
            line-height: 1;
            color: rgba(255,255,255,.08);
            right: -5px;
            bottom: -45px;
        }

        .hero-symbol {
            position: absolute;
            left: 40px;
            top: 50px;
            width: 95px;
            height: 95px;
            border-radius: 28px;
            background: rgba(255,255,255,.13);
            border: 1px solid rgba(255,255,255,.18);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
        }

        .hero-card-content {
            position: absolute;
            left: 35px;
            bottom: 35px;
            color: white;
            z-index: 2;
        }

        .hero-card-content small {
            opacity: .7;
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .hero-card-content h3 {
            font-size: 28px;
            font-weight: 800;
            margin: 8px 0;
        }

        .hero-card-content p {
            opacity: .75;
            font-size: 12px;
            margin: 0;
            max-width: 230px;
        }

        .floating-card {
            position: absolute;
            background: white;
            border: 1px solid var(--border);
            box-shadow: 0 20px 50px rgba(9,43,73,.12);
            border-radius: 16px;
            padding: 16px;
        }

        .floating-card.schedule {
            left: 0;
            bottom: 55px;
            width: 190px;
        }

        .floating-card.access {
            right: 0;
            top: 0;
            width: 170px;
        }

        .floating-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--light-blue);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .floating-card strong {
            display: block;
            font-size: 12px;
            color: var(--navy);
        }

        .floating-card small {
            color: var(--muted);
            font-size: 10px;
        }

        /* =========================
           QUICK ACCESS
        ========================= */

        .quick-access {
            margin-top: -40px;
            position: relative;
            z-index: 10;
        }

        .quick-wrapper {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 10px;
            box-shadow: 0 20px 50px rgba(9,43,73,.08);
        }

        .quick-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 17px;
            border-radius: 13px;
            color: var(--navy);
            transition: .2s;
        }

        .quick-item:hover {
            background: #F4F9FB;
        }

        .quick-icon {
            min-width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--light-blue);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .quick-item strong {
            display: block;
            font-size: 12px;
        }

        .quick-item span {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        /* =========================
           CARDS
        ========================= */

        .doctor-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            transition: .25s ease;
            height: 100%;
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(9,43,73,.09);
        }

        .doctor-avatar {
            height: 210px;
            background:
                radial-gradient(circle at 30% 20%, rgba(19,168,184,.3), transparent 25%),
                linear-gradient(145deg, #DFF4F7, #EAF1F7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blue);
            font-size: 70px;
        }

        .doctor-info {
            padding: 20px;
        }

        .doctor-info h5 {
            color: var(--navy);
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .doctor-info p {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 15px;
        }

        .doctor-link {
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================
           POLI
        ========================= */

        .service-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 25px;
            height: 100%;
            transition: .25s;
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 50px rgba(9,43,73,.08);
        }

        .service-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            background: var(--light-blue);
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 20px;
        }

        .service-card h5 {
            color: var(--navy);
            font-size: 14px;
            font-weight: 800;
        }

        .service-card p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
            margin: 0;
        }

        /* =========================
           GALLERY
        ========================= */

        .gallery-card {
            position: relative;
            min-height: 220px;
            border-radius: 18px;
            overflow: hidden;
            background:
                linear-gradient(145deg, #0B365C, #1268A8);
            color: white;
        }

        .gallery-card:nth-child(2n) {
            background:
                linear-gradient(145deg, #0C5963, #13A8B8);
        }

        .gallery-card:nth-child(3n) {
            background:
                linear-gradient(145deg, #17436A, #317BA8);
        }

        .gallery-number {
            position: absolute;
            top: 20px;
            left: 20px;
            opacity: .35;
            font-size: 12px;
            font-weight: 800;
        }

        .gallery-content {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 20px;
        }

        .gallery-content h5 {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .gallery-content p {
            font-size: 10px;
            opacity: .7;
            margin: 0;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            background: var(--navy);
            border-radius: 28px;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .cta::after {
            content: "+";
            position: absolute;
            right: 50px;
            bottom: -100px;
            font-size: 350px;
            line-height: 1;
            color: rgba(255,255,255,.035);
            font-weight: 800;
        }

        .cta h2 {
            color: white;
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        .cta p {
            color: rgba(255,255,255,.6);
            max-width: 600px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #061D32;
            color: white;
        }

        .footer p,
        .footer a {
            color: rgba(255,255,255,.55);
            font-size: 11px;
        }

        .footer-title {
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        @media (max-width: 991px) {
            .hero {
                padding: 80px 0 120px;
            }

            .hero-visual {
                margin-top: 60px;
                height: 420px;
            }

            .hero-card-main {
                right: 50%;
                transform: translateX(50%);
            }

            .floating-card.schedule {
                left: 5%;
            }

            .floating-card.access {
                right: 5%;
            }
        }

        @media (max-width: 575px) {
            .hero-title {
                letter-spacing: -2.5px;
            }

            .hero-visual {
                height: 370px;
            }

            .hero-card-main {
                width: 280px;
                height: 340px;
            }

            .floating-card {
                transform: scale(.8);
            }

            .floating-card.schedule {
                left: -20px;
            }

            .floating-card.access {
                right: -20px;
            }

            .section {
                padding: 65px 0;
            }

            .cta {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top main-navbar">
    <div class="container py-2">

        <a class="navbar-brand brand" href="<?= base_url('/') ?>">
            BHAYANGKARA
            <small>RUMAH SAKIT LEMDIKLAT</small>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMain"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="<?= base_url('/') ?>">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="<?= base_url('/jadwal-dokter') ?>">
                        Jadwal Dokter
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="<?= base_url('/unit-poli') ?>">
                        Unit & Poli
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="<?= base_url('/galeri') ?>">
                        Galeri & Kegiatan
                    </a>
                </li>

            </ul>

            <a href="#kontak" class="btn btn-primary-custom">
                Hubungi Kami
            </a>

        </div>
    </div>
</nav>

<?= $this->renderSection('content') ?>

<footer class="footer py-5">
    <div class="container">

        <div class="row g-5">

            <div class="col-lg-6">
                <div class="brand text-white mb-3">
                    BHAYANGKARA
                    <small class="text-white-50">
                        RUMAH SAKIT LEMDIKLAT
                    </small>
                </div>

                <p class="mb-0">
                    Portal informasi pelayanan kesehatan,
                    jadwal dokter, unit pelayanan, serta kegiatan
                    Rumah Sakit Bhayangkara Lemdiklat.
                </p>
            </div>

            <div class="col-lg-3">
                <div class="footer-title">Navigasi</div>

                <div class="d-flex flex-column gap-2">
                    <a href="<?= base_url('/') ?>">Beranda</a>
                    <a href="<?= base_url('/jadwal-dokter') ?>">Jadwal Dokter</a>
                    <a href="<?= base_url('/unit-poli') ?>">Unit & Poli</a>
                    <a href="<?= base_url('/galeri') ?>">Galeri</a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="footer-title">Technical Test</div>

                <p>
                    Website demonstrasi yang dikembangkan
                    menggunakan CodeIgniter 4 dan MySQL.
                </p>
            </div>

        </div>

        <hr class="border-light opacity-10 my-4">

        <p class="mb-0">
            © <?= date('Y') ?> Rumah Sakit Bhayangkara Lemdiklat
        </p>

    </div>
</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>