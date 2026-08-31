<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- ==========================================
     HERO
========================================== -->

<section class="hero">

    <div class="container hero-content">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <div class="hero-badge">
                    <span></span>
                    PELAYANAN KESEHATAN
                </div>

                <h1 class="hero-title">
                    Kesehatan Anda,
                    <span class="highlight">Prioritas Kami.</span>
                </h1>

                <p class="hero-description">
                    Temukan informasi layanan kesehatan, jadwal dokter,
                    unit pelayanan, serta berbagai kegiatan Rumah Sakit
                    Bhayangkara Lemdiklat dalam satu portal.
                </p>

                <div class="hero-actions">

                    <a
                        href="<?= base_url('/jadwal-dokter') ?>"
                        class="btn btn-primary-custom"
                    >
                        <i class="bi bi-calendar2-week me-2"></i>
                        Lihat Jadwal Dokter
                    </a>

                    <a
                        href="<?= base_url('/unit-poli') ?>"
                        class="btn btn-outline-custom"
                    >
                        Jelajahi Layanan
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                </div>

            </div>

            <div class="col-lg-5">

                <div class="hero-visual">

                    <div class="hero-card-main">

                        <div class="hero-symbol">
                            <i class="bi bi-plus-lg"></i>
                        </div>

                        <div class="hero-card-content">

                            <small>
                                Rumah Sakit
                            </small>

                            <h3>
                                Bhayangkara
                            </h3>

                            <p>
                                Pelayanan kesehatan yang profesional,
                                terpercaya, dan berorientasi pada pasien.
                            </p>

                        </div>

                    </div>

                    <div class="floating-card access">

                        <div class="floating-icon">
                            <i class="bi bi-hospital"></i>
                        </div>

                        <strong>
                            Unit Pelayanan
                        </strong>

                        <small>
                            <?= count($polyclinics) ?> unit tersedia
                        </small>

                    </div>

                    <div class="floating-card schedule">

                        <div class="floating-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <strong>
                            Jadwal Dokter
                        </strong>

                        <small>
                            Temukan dokter Anda
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     QUICK ACCESS
========================================== -->

<section class="quick-access">

    <div class="container">

        <div class="quick-wrapper">

            <div class="row g-1">

                <div class="col-md-3">

                    <a
                        href="<?= base_url('/jadwal-dokter') ?>"
                        class="quick-item"
                    >

                        <div class="quick-icon">
                            <i class="bi bi-calendar2-week"></i>
                        </div>

                        <div>
                            <strong>Jadwal Dokter</strong>
                            <span>Cek jadwal praktik</span>
                        </div>

                    </a>

                </div>

                <div class="col-md-3">

                    <a
                        href="<?= base_url('/unit-poli') ?>"
                        class="quick-item"
                    >

                        <div class="quick-icon">
                            <i class="bi bi-hospital"></i>
                        </div>

                        <div>
                            <strong>Unit & Poli</strong>
                            <span>Lihat layanan kami</span>
                        </div>

                    </a>

                </div>

                <div class="col-md-3">

                    <a
                        href="<?= base_url('/galeri') ?>"
                        class="quick-item"
                    >

                        <div class="quick-icon">
                            <i class="bi bi-images"></i>
                        </div>

                        <div>
                            <strong>Galeri</strong>
                            <span>Kegiatan rumah sakit</span>
                        </div>

                    </a>

                </div>

                <div class="col-md-3">

                    <a href="#kontak" class="quick-item">

                        <div class="quick-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <div>
                            <strong>Informasi</strong>
                            <span>Hubungi kami</span>
                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     DOCTORS
========================================== -->

<section class="section">

    <div class="container">

        <div class="row align-items-end mb-5">

            <div class="col-lg-7">

                <div class="section-label">
                    Tim Medis
                </div>

                <h2 class="section-title">
                    Temui Dokter Kami
                </h2>

                <p class="section-description">
                    Informasi dokter dan spesialisasi untuk membantu
                    Anda menemukan layanan kesehatan yang sesuai.
                </p>

            </div>

            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">

                <a
                    href="<?= base_url('/jadwal-dokter') ?>"
                    class="btn btn-outline-custom"
                >
                    Lihat Semua Dokter
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>

        <div class="row g-4">

            <?php foreach ($doctors as $doctor): ?>

                <div class="col-sm-6 col-lg-3">

                    <div class="doctor-card">

                        <div class="doctor-avatar">
                            <i class="bi bi-person"></i>
                        </div>

                        <div class="doctor-info">

                            <h5>
                                <?= esc($doctor['name']) ?>
                            </h5>

                            <p>
                                <?= esc($doctor['specialization']) ?>
                            </p>

                            <a
                                href="<?= base_url('/jadwal-dokter') ?>"
                                class="doctor-link"
                            >
                                Lihat Jadwal
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- ==========================================
     POLYCLINICS
========================================== -->

<section class="section bg-white">

    <div class="container">

        <div class="row mb-5">

            <div class="col-lg-7">

                <div class="section-label">
                    Layanan Kesehatan
                </div>

                <h2 class="section-title">
                    Unit & Poli
                </h2>

                <p class="section-description">
                    Berbagai unit pelayanan tersedia untuk memenuhi
                    kebutuhan kesehatan Anda.
                </p>

            </div>

        </div>

        <div class="row g-4">

            <?php foreach ($polyclinics as $polyclinic): ?>

                <div class="col-md-6 col-lg-4">

                    <div class="service-card">

                        <div class="service-icon">

                            <i class="bi bi-heart-pulse"></i>

                        </div>

                        <h5>
                            <?= esc($polyclinic['name']) ?>
                        </h5>

                        <p>
                            <?= esc($polyclinic['description']) ?>
                        </p>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- ==========================================
     GALLERY
========================================== -->

<section class="section">

    <div class="container">

        <div class="row align-items-end mb-5">

            <div class="col-lg-7">

                <div class="section-label">
                    Aktivitas & Informasi
                </div>

                <h2 class="section-title">
                    Kegiatan Terkini
                </h2>

                <p class="section-description">
                    Dokumentasi kegiatan dan aktivitas pelayanan
                    kesehatan Rumah Sakit Bhayangkara Lemdiklat.
                </p>

            </div>

            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">

                <a
                    href="<?= base_url('/galeri') ?>"
                    class="btn btn-outline-custom"
                >
                    Lihat Semua
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>

        <div class="row g-4">

            <?php foreach ($galleries as $index => $gallery): ?>

                <div class="col-md-6 col-lg-4">

                    <div class="gallery-card">

                        <div class="gallery-number">
                            0<?= $index + 1 ?>
                        </div>

                        <div class="gallery-content">

                            <h5>
                                <?= esc($gallery['title']) ?>
                            </h5>

                            <p>
                                <?= esc($gallery['description']) ?>
                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- ==========================================
     CTA
========================================== -->

<section class="section pt-0" id="kontak">

    <div class="container">

        <div class="cta">

            <div class="position-relative" style="z-index:2">

                <div class="section-label">
                    Informasi Rumah Sakit
                </div>

                <h2>
                    Butuh informasi lebih lanjut?
                </h2>

                <p class="mt-3">
                    Hubungi Rumah Sakit Bhayangkara Lemdiklat
                    untuk mendapatkan informasi pelayanan dan
                    kebutuhan kesehatan Anda.
                </p>

                <a
                    href="tel:+620000000000"
                    class="btn btn-light mt-3 fw-bold"
                >
                    <i class="bi bi-telephone me-2"></i>
                    Hubungi Rumah Sakit
                </a>

            </div>

        </div>

    </div>

</section>

<?= $this->endSection() ?>