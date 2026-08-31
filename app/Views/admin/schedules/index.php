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
            color: #092B49;
        }

        .main {
            max-width: 1250px;
            margin: auto;
            padding: 45px 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            font-weight: 800;
            margin: 0;
        }

        .subtitle {
            color: #718096;
            font-size: 11px;
            margin-top: 7px;
        }

        .btn-primary-custom {
            background: #092B49;
            color: white;
            border: 0;
            border-radius: 10px;
            padding: 12px 17px;
            font-size: 11px;
            font-weight: 800;
            text-decoration: none;
        }

        .btn-primary-custom:hover {
            background: #1268A8;
            color: white;
        }

        .content-card {
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
            overflow: hidden;
        }

        .table {
            margin: 0;
        }

        .table th {
            background: #F8FAFC;
            color: #718096;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            padding: 17px 20px;
        }

        .table td {
            padding: 17px 20px;
            vertical-align: middle;
            font-size: 11px;
            border-color: #EDF2F7;
        }

        .doctor-name {
            font-weight: 800;
        }

        .specialization {
            font-size: 9px;
            color: #94A3B8;
            margin-top: 3px;
        }

        .day {
            font-weight: 800;
        }

        .time {
            color: #526579;
            font-weight: 600;
        }

        .badge-active,
        .badge-inactive {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: 800;
        }

        .badge-active {
            background: #EAF8F0;
            color: #18864B;
        }

        .badge-inactive {
            background: #F1F5F9;
            color: #64748B;
        }

        .action {
            width: 32px;
            height: 32px;
            border: 0;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .edit {
            background: #EAF7FA;
            color: #1268A8;
            text-decoration: none;
        }

        .delete {
            background: #FFF1F2;
            color: #DC2626;
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

    <div class="topbar">

        <div>

            <h1>
                Jadwal Dokter
            </h1>

            <div class="subtitle">
                Kelola jadwal pelayanan dokter berdasarkan hari dan unit.
            </div>

        </div>

        <a
            href="<?= base_url('/admin/schedules/create') ?>"
            class="btn-primary-custom"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Jadwal
        </a>

    </div>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <div class="content-card">

        <div class="table-responsive">

            <table class="table">

                <thead>

                <tr>

                    <th>
                        Dokter
                    </th>

                    <th>
                        Poli
                    </th>

                    <th>
                        Hari
                    </th>

                    <th>
                        Jam
                    </th>

                    <th>
                        Status
                    </th>

                    <th class="text-end">
                        Aksi
                    </th>

                </tr>

                </thead>

                <tbody>

                <?php foreach ($schedules as $schedule): ?>

                    <tr>

                        <td>

                            <div class="doctor-name">
                                <?= esc($schedule['doctor_name']) ?>
                            </div>

                            <div class="specialization">
                                <?= esc($schedule['specialization']) ?>
                            </div>

                        </td>

                        <td>
                            <?= esc($schedule['polyclinic_name']) ?>
                        </td>

                        <td class="day">
                            <?= esc($schedule['day']) ?>
                        </td>

                        <td class="time">

                            <?= date('H:i', strtotime($schedule['start_time'])) ?>

                            -

                            <?= date('H:i', strtotime($schedule['end_time'])) ?>

                        </td>

                        <td>

                            <?php if ($schedule['status']): ?>

                                <span class="badge-active">
                                    Aktif
                                </span>

                            <?php else: ?>

                                <span class="badge-inactive">
                                    Nonaktif
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="text-end">

                            <a
                                href="<?= base_url('/admin/schedules/edit/' . $schedule['id']) ?>"
                                class="action edit"
                            >
                                <i class="bi bi-pencil"></i>
                            </a>


                            <form
                                action="<?= base_url('/admin/schedules/delete/' . $schedule['id']) ?>"
                                method="post"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')"
                            >

                                <?= csrf_field() ?>

                                <button
                                    type="submit"
                                    class="action delete"
                                >
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>


    <div class="mt-4">

        <a
            href="<?= base_url('/admin/dashboard') ?>"
            style="font-size:10px;font-weight:700;color:#718096;text-decoration:none;"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Dashboard
        </a>

    </div>

</main>

</body>

</html>