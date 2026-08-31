<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="schedule-page">

    <div class="container">

        <!-- HEADER -->

        <div class="schedule-header">

            <div>

                <div class="section-label">
                    Informasi Pelayanan
                </div>

                <h1>
                    Jadwal Dokter
                </h1>

                <p>
                    Temukan dokter dan jadwal praktik sesuai
                    kebutuhan pelayanan Anda.
                </p>

            </div>

        </div>


        <!-- FILTER -->

        <div class="schedule-filter">

            <form
                action="<?= base_url('/jadwal-dokter') ?>"
                method="get"
            >

                <div class="row g-3 align-items-end">

                    <div class="col-lg-5">

                        <label>
                            Cari Dokter
                        </label>

                        <div class="search-input">

                            <i class="bi bi-search"></i>

                            <input
                                type="text"
                                name="search"
                                value="<?= esc($search ?? '') ?>"
                                placeholder="Nama dokter atau spesialisasi..."
                            >

                        </div>

                    </div>


                    <div class="col-lg-3">

                        <label>
                            Unit / Poli
                        </label>

                        <select
                            name="polyclinic"
                            class="form-select custom-select"
                        >

                            <option value="">
                                Semua Poli
                            </option>

                            <?php foreach ($polyclinics as $polyclinic): ?>

                                <option
                                    value="<?= $polyclinic['id'] ?>"
                                    <?= ($selectedPolyclinic == $polyclinic['id']) ? 'selected' : '' ?>
                                >
                                    <?= esc($polyclinic['name']) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <div class="col-lg-2">

                        <label>
                            Hari
                        </label>

                        <select
                            name="day"
                            class="form-select custom-select"
                        >

                            <option value="">
                                Semua Hari
                            </option>

                            <?php
                            $days = [
                                'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu',
                                'Minggu'
                            ];
                            ?>

                            <?php foreach ($days as $dayOption): ?>

                                <option
                                    value="<?= $dayOption ?>"
                                    <?= ($selectedDay === $dayOption) ? 'selected' : '' ?>
                                >
                                    <?= $dayOption ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <div class="col-lg-2">

                        <button
                            type="submit"
                            class="btn-filter"
                        >
                            <i class="bi bi-funnel me-2"></i>
                            Terapkan
                        </button>

                    </div>

                </div>

            </form>

        </div>


        <!-- RESULT INFO -->

        <div class="result-info">

            <div>

                <strong>
                    <?= count($schedules) ?>
                </strong>

                jadwal ditemukan

            </div>

            <?php if ($search || $selectedPolyclinic || $selectedDay): ?>

                <a href="<?= base_url('/jadwal-dokter') ?>">
                    Reset filter
                    <i class="bi bi-x-circle ms-1"></i>
                </a>

            <?php endif; ?>

        </div>


        <!-- SCHEDULE LIST -->

        <?php if (!empty($schedules)): ?>

            <div class="schedule-list">

                <?php
                $currentDay = null;
                ?>

                <?php foreach ($schedules as $schedule): ?>

                    <?php if ($currentDay !== $schedule['day']): ?>

                        <?php $currentDay = $schedule['day']; ?>

                        <div class="day-divider">

                            <span>
                                <?= esc($currentDay) ?>
                            </span>

                            <div></div>

                        </div>

                    <?php endif; ?>


                    <div class="schedule-card">

                        <div class="doctor-profile">

                            <div class="doctor-photo">

                                <i class="bi bi-person"></i>

                            </div>

                            <div>

                                <h3>
                                    <?= esc($schedule['name']) ?>
                                </h3>

                                <p>
                                    <?= esc($schedule['specialization']) ?>
                                </p>

                            </div>

                        </div>


                        <div class="schedule-detail">

                            <div class="detail-item">

                                <span class="detail-icon">
                                    <i class="bi bi-hospital"></i>
                                </span>

                                <div>

                                    <small>
                                        UNIT / POLI
                                    </small>

                                    <strong>
                                        <?= esc($schedule['polyclinic_name']) ?>
                                    </strong>

                                </div>

                            </div>


                            <div class="detail-item">

                                <span class="detail-icon">
                                    <i class="bi bi-clock"></i>
                                </span>

                                <div>

                                    <small>
                                        JAM PRAKTIK
                                    </small>

                                    <strong>

                                        <?= date(
                                            'H:i',
                                            strtotime($schedule['start_time'])
                                        ) ?>

                                        —

                                        <?= date(
                                            'H:i',
                                            strtotime($schedule['end_time'])
                                        ) ?>

                                    </strong>

                                </div>

                            </div>


                            <div class="available">

                                <span></span>

                                Aktif

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="bi bi-calendar-x"></i>
                </div>

                <h3>
                    Jadwal tidak ditemukan
                </h3>

                <p>
                    Coba gunakan kata kunci atau filter
                    yang berbeda.
                </p>

                <a
                    href="<?= base_url('/jadwal-dokter') ?>"
                    class="btn-primary-custom"
                >
                    Lihat Semua Jadwal
                </a>

            </div>

        <?php endif; ?>

    </div>

</section>


<style>

.schedule-page {
    padding: 90px 0 110px;
    background: var(--background);
    min-height: 75vh;
}

.schedule-header {
    max-width: 700px;
    margin-bottom: 40px;
}

.schedule-header h1 {
    color: var(--navy);
    font-size: clamp(38px, 5vw, 58px);
    font-weight: 800;
    letter-spacing: -2.5px;
    margin-bottom: 15px;
}

.schedule-header p {
    color: var(--muted);
    line-height: 1.8;
    font-size: 14px;
}

.schedule-filter {
    background: white;
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 25px;
    box-shadow: 0 15px 40px rgba(9,43,73,.05);
}

.schedule-filter label {
    display: block;
    color: var(--navy);
    font-size: 11px;
    font-weight: 800;
    margin-bottom: 8px;
}

.search-input {
    position: relative;
}

.search-input i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--muted);
}

.search-input input {
    width: 100%;
    height: 46px;
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 0 15px 0 42px;
    font-size: 12px;
    outline: none;
}

.search-input input:focus {
    border-color: var(--blue);
    box-shadow: 0 0 0 3px rgba(18,104,168,.08);
}

.custom-select {
    height: 46px;
    border-color: var(--border);
    border-radius: 10px;
    font-size: 12px;
}

.btn-filter {
    width: 100%;
    height: 46px;
    border: 0;
    border-radius: 10px;
    background: var(--navy);
    color: white;
    font-size: 12px;
    font-weight: 700;
}

.btn-filter:hover {
    background: var(--blue);
}

.result-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 35px 0 20px;
    color: var(--muted);
    font-size: 11px;
}

.result-info strong {
    color: var(--navy);
}

.result-info a {
    color: var(--blue);
    font-weight: 700;
}

.day-divider {
    display: flex;
    align-items: center;
    gap: 18px;
    margin: 35px 0 15px;
}

.day-divider span {
    color: var(--navy);
    font-size: 13px;
    font-weight: 800;
}

.day-divider div {
    height: 1px;
    background: var(--border);
    flex: 1;
}

.schedule-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    background: white;
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 22px;
    margin-bottom: 12px;
    transition: .2s ease;
}

.schedule-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(9,43,73,.07);
}

.doctor-profile {
    display: flex;
    align-items: center;
    gap: 16px;
    min-width: 280px;
}

.doctor-photo {
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    border-radius: 17px;
    background: linear-gradient(145deg, #DFF4F7, #EAF1F7);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--blue);
    font-size: 30px;
}

.doctor-profile h3 {
    color: var(--navy);
    font-size: 14px;
    font-weight: 800;
    margin: 0 0 5px;
}

.doctor-profile p {
    color: var(--muted);
    font-size: 11px;
    margin: 0;
}

.schedule-detail {
    display: flex;
    align-items: center;
    gap: 35px;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.detail-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: var(--light-blue);
    color: var(--blue);
    display: flex;
    align-items: center;
    justify-content: center;
}

.detail-item small {
    display: block;
    color: #94A3B8;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: .7px;
    margin-bottom: 3px;
}

.detail-item strong {
    display: block;
    color: var(--navy);
    font-size: 11px;
}

.available {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 7px 10px;
    border-radius: 100px;
    background: #ECFDF5;
    color: #15803D;
    font-size: 9px;
    font-weight: 700;
}

.available span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #22C55E;
}

.empty-state {
    text-align: center;
    background: white;
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 70px 20px;
    margin-top: 30px;
}

.empty-icon {
    width: 65px;
    height: 65px;
    border-radius: 18px;
    background: var(--light-blue);
    color: var(--blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    margin: 0 auto 20px;
}

.empty-state h3 {
    color: var(--navy);
    font-weight: 800;
    font-size: 18px;
}

.empty-state p {
    color: var(--muted);
    font-size: 12px;
    margin-bottom: 25px;
}

@media (max-width: 991px) {

    .schedule-card {
        align-items: flex-start;
        flex-direction: column;
    }

    .schedule-detail {
        width: 100%;
        justify-content: space-between;
        flex-wrap: wrap;
    }

}

@media (max-width: 575px) {

    .schedule-page {
        padding: 60px 0 80px;
    }

    .schedule-filter {
        padding: 18px;
    }

    .schedule-detail {
        align-items: flex-start;
        flex-direction: column;
        gap: 15px;
    }

    .doctor-profile {
        min-width: 0;
    }

}

</style>

<?= $this->endSection() ?>