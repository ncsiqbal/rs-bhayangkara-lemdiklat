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
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            background: #F5F8FA;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #092B49;
        }

        .main {
            max-width: 800px;
            margin: auto;
            padding: 50px 25px;
        }

        h1 {
            font-size: 28px;
            font-weight: 800;
            margin: 25px 0 8px;
        }

        .subtitle {
            color: #718096;
            font-size: 11px;
            margin-bottom: 30px;
        }

        .back {
            color: #718096;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
        }

        .card-form {
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
            padding: 30px;
        }

        label {
            font-size: 10px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 1px solid #E5EDF3;
            border-radius: 10px;
            font-size: 11px;
            padding: 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #1268A8;
            box-shadow: 0 0 0 3px rgba(18,104,168,.08);
        }

        .btn-save {
            background: #092B49;
            color: white;
            border: 0;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 11px;
            font-weight: 800;
        }

        .btn-save:hover {
            background: #1268A8;
        }

        .alert {
            border: 0;
            border-radius: 10px;
            font-size: 10px;
        }

    </style>

</head>

<body>

<main class="main">

    <a
        href="<?= base_url('/admin/schedules') ?>"
        class="back"
    >
        ← Kembali ke Jadwal
    </a>

    <h1>
        Edit Jadwal
    </h1>

    <div class="subtitle">
        Perbarui jadwal pelayanan dokter.
    </div>


    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert alert-danger">

            <?php foreach (session()->getFlashdata('errors') as $error): ?>

                <div>
                    <?= esc($error) ?>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <div class="card-form">

        <form
            action="<?= base_url('/admin/schedules/update/' . $schedule['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="mb-4">

                <label>
                    DOKTER
                </label>

                <select
                    name="doctor_id"
                    class="form-select"
                    required
                >

                    <option value="">
                        Pilih dokter
                    </option>

                    <?php foreach ($doctors as $doctor): ?>

                        <option
                            value="<?= $doctor['id'] ?>"
                            <?= old('doctor_id', $schedule['doctor_id']) == $doctor['id'] ? 'selected' : '' ?>
                        >
                            <?= esc($doctor['name']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="mb-4">

                <label>
                    UNIT / POLI
                </label>

                <select
                    name="polyclinic_id"
                    class="form-select"
                    required
                >

                    <option value="">
                        Pilih poli
                    </option>

                    <?php foreach ($polyclinics as $polyclinic): ?>

                        <option
                            value="<?= $polyclinic['id'] ?>"
                            <?= old('polyclinic_id', $schedule['polyclinic_id']) == $polyclinic['id'] ? 'selected' : '' ?>
                        >
                            <?= esc($polyclinic['name']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="mb-4">

                <label>
                    HARI
                </label>

                <select
                    name="day"
                    class="form-select"
                    required
                >

                    <option value="">
                        Pilih hari
                    </option>

                    <?php foreach ([
                        'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    ] as $day): ?>

                        <option
                            value="<?= $day ?>"
                            <?= old('day', $schedule['day']) === $day ? 'selected' : '' ?>
                        >
                            <?= $day ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label>
                        JAM MULAI
                    </label>

                    <input
                        type="time"
                        name="start_time"
                        class="form-control"
                        value="<?= old('start_time', substr($schedule['start_time'], 0, 5)) ?>"
                        required
                    >

                </div>


                <div class="col-md-6 mb-4">

                    <label>
                        JAM SELESAI
                    </label>

                    <input
                        type="time"
                        name="end_time"
                        class="form-control"
                        value="<?= old('end_time', substr($schedule['end_time'], 0, 5)) ?>"
                        required
                    >

                </div>

            </div>


            <div class="mb-4">

                <label>
                    STATUS
                </label>

                <select
                    name="status"
                    class="form-select"
                    required
                >

                <option
                    value="1"
                    <?= old('status', $schedule['status']) == 1 ? 'selected' : '' ?>
                >
                    Aktif
                </option>

                <option
                    value="0"
                    <?= old('status', $schedule['status']) == 0 ? 'selected' : '' ?>
                >
                    Nonaktif
                </option>

                </select>

            </div>


            <button
                type="submit"
                class="btn-save"
            >
                Simpan Jadwal
            </button>

        </form>

    </div>

</main>

</body>

</html>