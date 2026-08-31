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
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
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
            max-width: 1200px;
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
            padding: 8px 20px;
        }

        .poli-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px 0;
            border-bottom: 1px solid #EDF2F7;
        }

        .poli-item:last-child {
            border-bottom: 0;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            flex: 0 0 48px;
            border-radius: 12px;
            background: #EAF7FA;
            color: #1268A8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .poli-content {
            flex: 1;
        }

        .poli-name {
            font-size: 12px;
            font-weight: 800;
        }

        .poli-description {
            color: #718096;
            font-size: 10px;
            margin-top: 5px;
        }

        .badge-active,
        .badge-inactive {
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
            width: 34px;
            height: 34px;
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

        .back {
            color: #718096;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
        }

    </style>

</head>

<body>

<main class="main">

    <div class="topbar">

        <div>

            <h1>
                Unit & Poli
            </h1>

            <div class="subtitle">
                Kelola informasi unit pelayanan rumah sakit.
            </div>

        </div>

        <a
            href="<?= base_url('/admin/polyclinics/create') ?>"
            class="btn-primary-custom"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Poli
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

        <?php foreach ($polyclinics as $polyclinic): ?>

            <div class="poli-item">

                <div class="icon-box">

                    <i class="<?= esc($polyclinic['icon'] ?: 'bi bi-hospital') ?>"></i>

                </div>


                <div class="poli-content">

                    <div class="poli-name">
                        <?= esc($polyclinic['name']) ?>
                    </div>

                    <div class="poli-description">
                        <?= esc($polyclinic['description']) ?>
                    </div>

                </div>


                <div>

                    <?php if ($polyclinic['status']): ?>

                        <span class="badge-active">
                            Aktif
                        </span>

                    <?php else: ?>

                        <span class="badge-inactive">
                            Nonaktif
                        </span>

                    <?php endif; ?>

                </div>


                <div>

                    <a
                        href="<?= base_url('/admin/polyclinics/edit/' . $polyclinic['id']) ?>"
                        class="action edit"
                    >
                        <i class="bi bi-pencil"></i>
                    </a>


                    <form
                        action="<?= base_url('/admin/polyclinics/delete/' . $polyclinic['id']) ?>"
                        method="post"
                        class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus poli ini?')"
                    >

                        <?= csrf_field() ?>

                        <button
                            type="submit"
                            class="action delete"
                        >
                            <i class="bi bi-trash"></i>
                        </button>

                    </form>

                </div>

            </div>

        <?php endforeach; ?>

    </div>


    <div class="mt-4">

        <a
            href="<?= base_url('/admin/dashboard') ?>"
            class="back"
        >
            ← Kembali ke Dashboard
        </a>

    </div>

</main>

</body>

</html>