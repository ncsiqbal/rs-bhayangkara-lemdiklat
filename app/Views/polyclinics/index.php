<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="polyclinic-page">

    <div class="container">

        <div class="page-heading">

            <div class="section-label">
                Layanan Kesehatan
            </div>

            <h1>
                Unit & Poli
            </h1>

            <p>
                Temukan berbagai unit pelayanan kesehatan
                yang tersedia di Rumah Sakit Bhayangkara Lemdiklat.
            </p>

        </div>


        <div class="row g-4">

            <?php foreach ($polyclinics as $index => $polyclinic): ?>

                <div class="col-md-6 col-lg-4">

                    <a
                        href="<?= base_url('/unit-poli/' . $polyclinic['id']) ?>"
                        class="polyclinic-card"
                    >

                        <div class="polyclinic-top">

                            <div class="polyclinic-icon">

                                <i class="bi bi-heart-pulse"></i>

                            </div>

                            <span class="card-number">
                                <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>
                            </span>

                        </div>


                        <h2>
                            <?= esc($polyclinic['name']) ?>
                        </h2>

                        <p>
                            <?= esc($polyclinic['description']) ?>
                        </p>


                        <div class="card-link">

                            Lihat detail

                            <i class="bi bi-arrow-up-right"></i>

                        </div>

                    </a>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<style>

.polyclinic-page {
    min-height: 75vh;
    padding: 90px 0 110px;
    background: var(--background);
}

.page-heading {
    max-width: 700px;
    margin-bottom: 50px;
}

.page-heading h1 {
    color: var(--navy);
    font-size: clamp(40px, 5vw, 60px);
    font-weight: 800;
    letter-spacing: -3px;
    margin-bottom: 15px;
}

.page-heading p {
    color: var(--muted);
    font-size: 14px;
    line-height: 1.8;
    max-width: 600px;
}

.polyclinic-card {
    display: block;
    height: 100%;
    padding: 28px;
    background: white;
    border: 1px solid var(--border);
    border-radius: 20px;
    color: var(--text);
    transition: all .25s ease;
}

.polyclinic-card:hover {
    color: var(--text);
    transform: translateY(-6px);
    border-color: rgba(18,104,168,.25);
    box-shadow: 0 22px 55px rgba(9,43,73,.09);
}

.polyclinic-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 35px;
}

.polyclinic-icon {
    width: 52px;
    height: 52px;
    border-radius: 15px;
    background: var(--light-blue);
    color: var(--blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
}

.card-number {
    color: #CBD5E1;
    font-size: 11px;
    font-weight: 800;
}

.polyclinic-card h2 {
    color: var(--navy);
    font-size: 18px;
    font-weight: 800;
    letter-spacing: -.5px;
    margin-bottom: 10px;
}

.polyclinic-card p {
    color: var(--muted);
    font-size: 11px;
    line-height: 1.8;
    min-height: 60px;
    margin-bottom: 25px;
}

.card-link {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: var(--blue);
    font-size: 11px;
    font-weight: 800;
    border-top: 1px solid var(--border);
    padding-top: 17px;
}

.card-link i {
    transition: .2s;
}

.polyclinic-card:hover .card-link i {
    transform: translate(3px, -3px);
}

</style>

<?= $this->endSection() ?>