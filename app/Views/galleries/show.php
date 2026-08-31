<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="gallery-detail-page">

    <div class="container">

        <a
            href="<?= base_url('/galeri') ?>"
            class="back-link"
        >
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Galeri
        </a>


        <div class="detail-gallery">

            <div class="detail-visual">

                <div class="detail-symbol">
                    <i class="bi bi-camera"></i>
                </div>

                <span>
                    DOKUMENTASI KEGIATAN
                </span>

            </div>


            <div class="detail-content">

                <div class="section-label">
                    Kegiatan Rumah Sakit
                </div>

                <h1>
                    <?= esc($gallery['title']) ?>
                </h1>

                <div class="event-date">

                    <i class="bi bi-calendar3 me-2"></i>

                    <?= date(
                        'd F Y',
                        strtotime($gallery['event_date'])
                    ) ?>

                </div>

                <div class="detail-description">

                    <?= esc($gallery['description']) ?>

                </div>

            </div>

        </div>

    </div>

</section>


<style>

.gallery-detail-page {
    min-height: 75vh;
    padding: 70px 0 110px;
    background: var(--background);
}

.back-link {
    display: inline-flex;
    align-items: center;
    color: var(--muted);
    font-size: 11px;
    font-weight: 700;
    margin-bottom: 30px;
}

.back-link:hover {
    color: var(--blue);
}

.detail-gallery {
    background: white;
    border: 1px solid var(--border);
    border-radius: 25px;
    overflow: hidden;
}

.detail-visual {
    height: 430px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background:
        radial-gradient(
            circle at 25% 20%,
            rgba(19,168,184,.35),
            transparent 25%
        ),
        linear-gradient(
            135deg,
            #082D4C,
            #1268A8 55%,
            #13A8B8
        );
}

.detail-visual::after {
    content: "+";
    position: absolute;
    right: 30px;
    bottom: -130px;
    font-size: 400px;
    line-height: 1;
    color: rgba(255,255,255,.05);
    font-weight: 800;
}

.detail-symbol {
    width: 100px;
    height: 100px;
    border-radius: 28px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.2);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    position: relative;
    z-index: 2;
}

.detail-visual span {
    position: absolute;
    top: 30px;
    left: 30px;
    color: rgba(255,255,255,.65);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1px;
}

.detail-content {
    padding: 45px;
}

.detail-content h1 {
    color: var(--navy);
    font-size: clamp(30px, 4vw, 46px);
    font-weight: 800;
    letter-spacing: -2px;
    line-height: 1.1;
    max-width: 800px;
    margin-bottom: 15px;
}

.event-date {
    color: var(--blue);
    font-size: 11px;
    font-weight: 800;
    margin-bottom: 30px;
}

.detail-description {
    max-width: 800px;
    color: var(--muted);
    font-size: 13px;
    line-height: 2;
    border-top: 1px solid var(--border);
    padding-top: 25px;
}

@media (max-width: 575px) {

    .gallery-detail-page {
        padding: 55px 0 80px;
    }

    .detail-visual {
        height: 300px;
    }

    .detail-content {
        padding: 30px;
    }

}

</style>

<?= $this->endSection() ?>