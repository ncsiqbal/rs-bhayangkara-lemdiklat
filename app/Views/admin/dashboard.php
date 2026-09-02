<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title) ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #F5F8FA;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #102A43;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 245px;
            background: #092B49;
            padding: 28px 18px;
            color: white;
        }

        .brand {
            padding: 0 12px 30px;
            font-size: 13px;
            font-weight: 800;
        }

        .brand small {
            display: block;
            opacity: .5;
            font-size: 8px;
            letter-spacing: 1px;
            margin-top: 5px;
        }

        .menu-label {
            color: rgba(255,255,255,.4);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 1px;
            padding: 0 12px;
            margin: 20px 0 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,.65);
            padding: 11px 12px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .menu-item:hover,
        .menu-item.active {
            background: rgba(255,255,255,.1);
            color: white;
        }

        .menu-item i {
            font-size: 15px;
        }

        .main {
            margin-left: 245px;
            padding: 40px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .topbar h1 {
            color: #092B49;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -1px;
            margin: 0;
        }

        .topbar p {
            color: #7A8A99;
            font-size: 11px;
            margin: 7px 0 0;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 12px;
            padding: 9px 13px;
        }

        .admin-avatar {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            background: #EAF7FA;
            color: #1268A8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-user strong {
            display: block;
            color: #092B49;
            font-size: 10px;
        }

        .admin-user span {
            display: block;
            color: #94A3B8;
            font-size: 8px;
        }

        .stat-card {
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
            padding: 22px;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(9,43,73,.07);
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #EAF7FA;
            color: #1268A8;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .stat-card span {
            color: #7A8A99;
            display: block;
            font-size: 10px;
            font-weight: 600;
        }

        .stat-card strong {
            display: block;
            color: #092B49;
            font-size: 30px;
            font-weight: 800;
            margin-top: 4px;
        }

        .welcome-card {
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(19,168,184,.15),
                    transparent 30%
                ),
                #092B49;
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-top: 25px;
        }

        .welcome-card h2 {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .welcome-card p {
            color: rgba(255,255,255,.6);
            font-size: 11px;
            line-height: 1.7;
            max-width: 550px;
            margin: 0;
        }

        .quick-card {
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
            padding: 22px;
            height: 100%;
        }

        .quick-card h3 {
            color: #092B49;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .quick-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #1268A8;
            background: #F5F9FB;
            padding: 13px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .quick-action:hover {
            background: #EAF7FA;
            color: #092B49;
        }

        .logout {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 20px;
        }

        @media (max-width: 900px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand,
            .menu-label,
            .menu-item span {
                display: none;
            }

            .menu-item {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                padding: 25px;
            }

        }

    </style>

</head>

<body>

<aside class="sidebar">

    <div class="brand">

        BHAYANGKARA

        <small>
            ADMIN PORTAL
        </small>

    </div>


    <div class="menu-label">
        MAIN MENU
    </div>


    <a
        href="<?= base_url('/admin/dashboard') ?>"
        class="menu-item active"
    >
        <i class="bi bi-grid-1x2"></i>
        <span>Dashboard</span>
    </a>


    <a
        href="<?= base_url('/admin/doctors') ?>"
        class="menu-item"
    >
        <i class="bi bi-person-badge"></i>
        <span>Dokter</span>
    </a>

    <a
        href="<?= base_url('/admin/schedules') ?>"
        class="menu-item"
>
        <i class="bi bi-calendar2-week"></i>
        <span>Jadwal Dokter</span>
    </a>

    <a
        href="<?= base_url('/admin/polyclinics') ?>"
        class="menu-item"
    >
        <i class="bi bi-hospital"></i>
        <span>Unit & Poli</span>
    </a>

    <a
        href="<?= base_url('/admin/galleries') ?>"
        class="menu-item"
    >
        <i class="bi bi-images"></i>
        <span>Galeri</span>
    </a>


    <div class="logout">

        <a
            href="<?= base_url('/admin/logout') ?>"
            class="menu-item"
        >
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
        </a>

    </div>

</aside>


<main class="main">

    <div class="topbar">

        <div>

            <h1>
                Dashboard
            </h1>

            <p>
                Overview informasi website Rumah Sakit Bhayangkara Lemdiklat.
            </p>

        </div>


        <div class="admin-user">

            <div class="admin-avatar">
                <i class="bi bi-person"></i>
            </div>

            <div>

                <strong>
                    <?= esc(session()->get('user_name')) ?>
                </strong>

                <span>
                    Administrator
                </span>

            </div>

        </div>

    </div>


    <!-- STATISTICS -->

    <div class="row g-4">

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-person-badge"></i>
                </div>

                <span>
                    Dokter Aktif
                </span>

                <strong>
                    <?= $doctorCount ?>
                </strong>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-hospital"></i>
                </div>

                <span>
                    Unit / Poli
                </span>

                <strong>
                    <?= $polyclinicCount ?>
                </strong>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>

                <span>
                    Jadwal Aktif
                </span>

                <strong>
                    <?= $scheduleCount ?>
                </strong>

            </div>

        </div>


        <div class="col-md-6 col-xl-3">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-images"></i>
                </div>

                <span>
                    Kegiatan
                </span>

                <strong>
                    <?= $galleryCount ?>
                </strong>

            </div>

        </div>

    </div>


    <!-- WELCOME -->

    <div class="welcome-card">

        <h2>
            Selamat datang, <?= esc(session()->get('user_name')) ?>.
        </h2>

        <p>
            Gunakan dashboard ini untuk mengelola informasi
            yang ditampilkan pada portal Rumah Sakit Bhayangkara
            Lemdiklat.
        </p>

    </div>


    <!-- QUICK ACTION -->

    <div class="row g-4 mt-2">

        <div class="col-lg-6">

            <div class="quick-card">

                <h3>
                    Kelola Konten
                </h3>

                <a
                    href="<?= base_url('/admin/doctors') ?>"
                    class="quick-action"
                >
                    Kelola Dokter
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a
                    href="<?= base_url('/admin/schedules') ?>"
                    class="quick-action"
                >
                    Kelola Jadwal Dokter
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a
                    href="<?= base_url('/admin/polyclinics') ?>"
                    class="quick-action"
                >
                    Kelola Unit & Poli
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a
                    href="<?= base_url('/admin/galleries') ?>"
                    class="quick-action"
                >
                    Kelola Galeri
                    <i class="bi bi-arrow-right"></i>
                </a>
                
            </div>

        </div>


        <div class="col-lg-6">

            <div class="quick-card">

                <h3>
                    Website
                </h3>

                <a
                    href="<?= base_url('/') ?>"
                    target="_blank"
                    class="quick-action"
                >
                    Buka Website
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>

                <a
                    href="<?= base_url('/jadwal-dokter') ?>"
                    target="_blank"
                    class="quick-action"
                >
                    Lihat Jadwal Dokter
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>

                <a
                    href="<?= base_url('/unit-poli') ?>"
                    target="_blank"
                    class="quick-action"
                >
                    Lihat Unit & Poli
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>

                <a
                    href="<?= base_url('/galeri') ?>"
                    target="_blank"
                    class="quick-action"
                >
                    Lihat Galeri
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>

            </div>

        </div>

    </div>

</main>

</body>

</html>