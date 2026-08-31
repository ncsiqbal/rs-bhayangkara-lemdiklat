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

        .table thead th {
            background: #F8FAFC;
            border-bottom: 1px solid #E5EDF3;
            color: #718096;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 17px 20px;
        }

        .table tbody td {
            vertical-align: middle;
            padding: 17px 20px;
            border-color: #EDF2F7;
            font-size: 11px;
        }

        .doctor {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .doctor-avatar {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #EAF7FA;
            color: #1268A8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .doctor-name {
            font-weight: 800;
            color: #092B49;
        }

        .doctor-description {
            color: #94A3B8;
            font-size: 9px;
            margin-top: 3px;
        }

        .specialization {
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
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            text-decoration: none;
            border: 0;
        }

        .action-edit {
            background: #EAF7FA;
            color: #1268A8;
        }

        .action-delete {
            background: #FFF1F2;
            color: #DC2626;
        }

        .empty {
            text-align: center;
            padding: 70px 20px;
            color: #94A3B8;
        }

        .empty i {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .alert {
            border: 0;
            border-radius: 11px;
            font-size: 10px;
        }

        @media (max-width: 768px) {

            .table-container {
                overflow-x: auto;
            }

            .topbar {
                align-items: flex-start;
                gap: 20px;
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<main class="main">

    <div class="topbar">

        <div>

            <h1>
                Dokter
            </h1>

            <div class="subtitle">
                Kelola informasi dokter yang tampil pada website rumah sakit.
            </div>

        </div>

        <a
            href="<?= base_url('/admin/doctors/create') ?>"
            class="btn-primary-custom"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Dokter
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

        <?php if (empty($doctors)): ?>

            <div class="empty">

                <i class="bi bi-person-badge"></i>

                <div>
                    Belum ada data dokter.
                </div>

            </div>

        <?php else: ?>

            <div class="table-container">

                <table class="table">

                    <thead>

                    <tr>

                        <th>
                            Dokter
                        </th>

                        <th>
                            Spesialisasi
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

                    <?php foreach ($doctors as $doctor): ?>

                        <tr>

                            <td>

                                <div class="doctor">

                                    <div class="doctor-avatar">

                                        <i class="bi bi-person"></i>

                                    </div>

                                    <div>

                                        <div class="doctor-name">
                                            <?= esc($doctor['name']) ?>
                                        </div>

                                        <div class="doctor-description">
                                            <?= esc($doctor['description'] ?? 'Dokter Rumah Sakit Bhayangkara Lemdiklat') ?>
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <td class="specialization">

                                <?= esc($doctor['specialization']) ?>

                            </td>

                            <td>

                                <?php if ($doctor['status']): ?>

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
                                    href="<?= base_url('/admin/doctors/edit/' . $doctor['id']) ?>"
                                    class="action action-edit"
                                    title="Edit"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="<?= base_url('/admin/doctors/delete/' . $doctor['id']) ?>"
                                    method="post"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus dokter ini?')"
                                >

                                    <?= csrf_field() ?>

                                    <button
                                        type="submit"
                                        class="action action-delete"
                                        title="Hapus"
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

        <?php endif; ?>

    </div>


    <div class="mt-4">

        <a
            href="<?= base_url('/admin/dashboard') ?>"
            class="text-decoration-none"
            style="font-size:10px;font-weight:700;color:#718096;"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Dashboard
        </a>

    </div>

</main>

</body>

</html>