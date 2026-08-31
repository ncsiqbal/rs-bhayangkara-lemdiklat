<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="gallery-page">

    <div class="container">

        <!-- HEADER -->

        <div class="gallery-heading">

            <div class="section-label">
                Aktivitas Rumah Sakit
            </div>

            <h1>
                Galeri & Kegiatan
            </h1>

            <p>
                Mengenal lebih dekat berbagai kegiatan,
                pelayanan, dan aktivitas Rumah Sakit
                Bhayangkara Lemdiklat.
            </p>

        </div>


        <!-- FEATURED -->

        <?php if (!empty($galleries)): ?>

            <?php $featured = $galleries[0]; ?>

            <a
                href="<?= base_url('/galeri/' . $featured['id']) ?>"
                class="featured-gallery"
            >

                <div class="featured-visual">

                    <div class="featured-pattern">
                        +
                    </div>

                    <span class="featured-badge">
                        KEGIATAN TERBARU
                    </span>

                </div>

                <div class="featured-content">

                    <div class="featured-date">

                        <i class="bi bi-calendar3 me-2"></i>

                        <?= date(
                            'd F Y',
                            strtotime($featured['event_date'])
                        ) ?>

                    </div>

                    <h2>
                        <?= esc($featured['title']) ?>
                    </h2>

                    <p>
                        <?= esc($featured['description']) ?>
                    </p>

                    <span class="read-more">
                        Lihat kegiatan
                        <i class="bi bi-arrow-up-right"></i>
                    </span>

                </div>

            </a>

        <?php endif; ?>


        <!-- ALL ACTIVITIES -->

        <div class="activities-header">

            <div>

                <div class="section-label">
                    Dokumentasi
                </div>

                <h2>
                    Kegiatan Lainnya
                </h2>

            </div>

            <span class="activity-count">
                <?= count($galleries) ?> kegiatan
            </span>

        </div>


        <div class="row g-4">

            <?php foreach ($galleries as $index => $gallery): ?>

                <?php if ($index === 0) continue; ?>

                <div class="col-md-6 col-lg-4">

                    <a
                        href="<?= base_url('/galeri/' . $gallery['id']) ?>"
                        class="activity-card"
                    >

                        <div class="activity-visual">

                            <div class="activity-number">
                                <?= str_pad(
                                    $index + 1,
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                ) ?>
                            </div>

                            <div class="activity-symbol">
                                <i class="bi bi-camera"></i>
                            </div>

                        </div>

                        <div class="activity-content">

                            <div class="activity-date">

                                <?= date(
                                    'd M Y',
                                    strtotime($gallery['event_date'])
                                ) ?>

                            </div>

                            <h3>
                                <?= esc($gallery['title']) ?>
                            </h3>

                            <p>
                                <?= esc($gallery['description']) ?>
                            </p>

                            <span>
                                Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </a>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<style>

.gallery-page {
    min-height: 75vh;
    padding: 90px 0 110px;
    background: var(--background);
}

.gallery-heading {
    max-width: 700px;
    margin-bottom: 50px;
}

.gallery-heading h1 {
    color: var(--navy);
    font-size: clamp(40px, 5vw, 60px);
    font-weight: 800;
    letter-spacing: -3px;
    margin-bottom: 15px;
}

.gallery-heading p {
    color: var(--muted);
    font-size: 14px;
    line-height: 1.8;
    max-width: 600px;
}


/* FEATURED */

.featured-gallery {
    display: grid;
    grid-template-columns: 1.1fr .9fr;
    min-height: 390px;
    overflow: hidden;
    border-radius: 25px;
    background: white;
    border: 1px solid var(--border);
    margin-bottom: 80px;
    color: var(--text);
    transition: .25s ease;
}

.featured-gallery:hover {
    color: var(--text);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(9,43,73,.1);
}

.featured-visual {
    position: relative;
    min-height: 390px;
    overflow: hidden;
    background:
        radial-gradient(
            circle at 25% 20%,
            rgba(19,168,184,.5),
            transparent 25%
        ),
        linear-gradient(
            135deg,
            #082D4C,
            #1268A8 55%,
            #13A8B8
        );
}

.featured-pattern {
    position: absolute;
    right: 20px;
    bottom: -100px;
    color: rgba(255,255,255,.07);
    font-size: 380px;
    font-weight: 800;
    line-height: 1;
}

.featured-badge {
    position: absolute;
    left: 30px;
    top: 30px;
    padding: 8px 12px;
    border-radius: 100px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.2);
    color: white;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1px;
}

.featured-content {
    padding: 55px 45px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.featured-date {
    color: var(--cyan);
    font-size: 10px;
    font-weight: 800;
    margin-bottom: 15px;
}

.featured-content h2 {
    color: var(--navy);
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -1.2px;
    line-height: 1.15;
    margin-bottom: 15px;
}

.featured-content p {
    color: var(--muted);
    font-size: 12px;
    line-height: 1.8;
    margin-bottom: 25px;
}

.read-more {
    color: var(--blue);
    font-size: 11px;
    font-weight: 800;
}


/* ACTIVITIES */

.activities-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 30px;
}

.activities-header h2 {
    color: var(--navy);
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -1px;
}

.activity-count {
    color: var(--muted);
    font-size: 11px;
    font-weight: 700;
}


/* CARD */

.activity-card {
    display: block;
    height: 100%;
    overflow: hidden;
    border-radius: 19px;
    background: white;
    border: 1px solid var(--border);
    color: var(--text);
    transition: .25s ease;
}

.activity-card:hover {
    color: var(--text);
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(9,43,73,.08);
}

.activity-visual {
    position: relative;
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    background:
        radial-gradient(
            circle at 25% 20%,
            rgba(19,168,184,.45),
            transparent 25%
        ),
        linear-gradient(
            145deg,
            #0B365C,
            #1268A8
        );
    overflow: hidden;
}

.activity-card:nth-child(2n) .activity-visual {
    background:
        radial-gradient(
            circle at 70% 20%,
            rgba(255,255,255,.2),
            transparent 25%
        ),
        linear-gradient(
            145deg,
            #07505D,
            #13A8B8
        );
}

.activity-card:nth-child(3n) .activity-visual {
    background:
        linear-gradient(
            145deg,
            #183F60,
            #317BA8
        );
}

.activity-number {
    position: absolute;
    left: 20px;
    top: 20px;
    color: rgba(255,255,255,.5);
    font-size: 10px;
    font-weight: 800;
}

.activity-symbol {
    width: 70px;
    height: 70px;
    border-radius: 22px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 28px;
}

.activity-content {
    padding: 22px;
}

.activity-date {
    color: var(--cyan);
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
    margin-bottom: 9px;
}

.activity-content h3 {
    color: var(--navy);
    font-size: 15px;
    font-weight: 800;
    line-height: 1.35;
    margin-bottom: 8px;
}

.activity-content p {
    color: var(--muted);
    font-size: 10px;
    line-height: 1.7;
    min-height: 35px;
    margin-bottom: 17px;
}

.activity-content > span {
    color: var(--blue);
    font-size: 10px;
    font-weight: 800;
}

.activity-content > span i {
    margin-left: 5px;
    transition: .2s;
}

.activity-card:hover .activity-content > span i {
    transform: translateX(4px);
}


/* MOBILE */

@media (max-width: 767px) {

    .gallery-page {
        padding: 60px 0 80px;
    }

    .featured-gallery {
        grid-template-columns: 1fr;
    }

    .featured-visual {
        min-height: 280px;
    }

    .featured-content {
        padding: 30px;
    }

    .activities-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 10px;
    }

}

</style>

<?= $this->endSection() ?>