<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="polyclinic-detail">

    <div class="container">

        <a
            href="<?= base_url('/unit-poli') ?>"
            class="back-link"
        >
            <i class="bi bi-arrow-left me-2"></i>
            Kembali ke Unit & Poli
        </a>


        <div class="detail-hero">

            <div class="detail-icon">

                <i class="bi bi-heart-pulse"></i>

            </div>

            <div>

                <div class="section-label">
                    Unit Pelayanan
                </div>

                <h1>
                    <?= esc($polyclinic['name']) ?>
                </h1>

                <p>
                    <?= esc($polyclinic['description']) ?>
                </p>

            </div>

        </div>


        <div class="doctor-section">

            <div class="section-label">
                Tim Medis
            </div>

            <h2>
                Dokter di Unit Ini
            </h2>

            <?php if (!empty($doctors)): ?>

                <div class="row g-3 mt-3">

                    <?php foreach ($doctors as $doctor): ?>

                        <div class="col-md-6">

                            <div class="doctor-schedule-card">

                                <div class="mini-doctor">

                                    <div class="mini-avatar">
                                        <i class="bi bi-person"></i>
                                    </div>

                                    <div>

                                        <h3>
                                            <?= esc($doctor['name']) ?>
                                        </h3>

                                        <p>
                                            <?= esc($doctor['specialization']) ?>
                                        </p>

                                    </div>

                                </div>


                                <div class="practice-time">

                                    <span>
                                        <i class="bi bi-calendar3 me-1"></i>
                                        <?= esc($doctor['day']) ?>
                                    </span>

                                    <strong>
                                        <?= date('H:i', strtotime($doctor['start_time'])) ?>
                                        —
                                        <?= date('H:i', strtotime($doctor['end_time'])) ?>
                                    </strong>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="empty-doctor">

                    <i class="bi bi-person-x"></i>

                    <p>
                        Belum ada informasi dokter untuk unit ini.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>


<style>

.polyclinic-detail {
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
    margin-bottom: 35px;
}

.back-link:hover {
    color: var(--blue);
}

.detail-hero {
    display: flex;
    align-items: center;
    gap: 25px;
    padding: 45px;
    border-radius: 24px;
    background:
        radial-gradient(
            circle at 90% 10%,
            rgba(19,168,184,.15),
            transparent 30%
        ),
        white;
    border: 1px solid var(--border);
    margin-bottom: 65px;
}

.detail-icon {
    width: 75px;
    height: 75px;
    flex-shrink: 0;
    border-radius: 22px;
    background: var(--light-blue);
    color: var(--blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
}

.detail-hero h1 {
    color: var(--navy);
    font-size: clamp(30px, 4vw, 48px);
    font-weight: 800;
    letter-spacing: -2px;
    margin-bottom: 10px;
}

.detail-hero p {
    color: var(--muted);
    font-size: 13px;
    line-height: 1.8;
    margin: 0;
    max-width: 700px;
}

.doctor-section h2 {
    color: var(--navy);
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -1px;
}

.doctor-schedule-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 20px;
    transition: .2s;
}

.doctor-schedule-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(9,43,73,.07);
}

.mini-doctor {
    display: flex;
    align-items: center;
    gap: 14px;
}

.mini-avatar {
    width: 55px;
    height: 55px;
    flex-shrink: 0;
    border-radius: 15px;
    background: linear-gradient(145deg, #DFF4F7, #EAF1F7);
    color: var(--blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
}

.mini-doctor h3 {
    color: var(--navy);
    font-size: 13px;
    font-weight: 800;
    margin-bottom: 5px;
}

.mini-doctor p {
    color: var(--muted);
    font-size: 10px;
    margin: 0;
}

.practice-time {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid var(--border);
}

.practice-time span {
    color: var(--muted);
    font-size: 10px;
}

.practice-time strong {
    color: var(--blue);
    font-size: 11px;
}

.empty-doctor {
    padding: 50px;
    text-align: center;
    background: white;
    border: 1px solid var(--border);
    border-radius: 18px;
    color: var(--muted);
}

.empty-doctor i {
    font-size: 30px;
    margin-bottom: 10px;
}

.empty-doctor p {
    font-size: 12px;
    margin: 0;
}

@media (max-width: 575px) {

    .polyclinic-page,
    .polyclinic-detail {
        padding: 60px 0 80px;
    }

    .detail-hero {
        align-items: flex-start;
        flex-direction: column;
        padding: 28px;
    }

}

</style>

<?= $this->endSection() ?>