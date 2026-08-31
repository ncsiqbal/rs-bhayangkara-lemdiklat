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

        body {
            margin: 0;
            background: #F5F8FA;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #092B49;
        }

        .main {
            max-width: 850px;
            margin: auto;
            padding: 50px 25px;
        }

        .back {
            color: #718096;
            text-decoration: none;
            font-size: 10px;
            font-weight: 700;
        }

        h1 {
            font-size: 28px;
            font-weight: 800;
            margin: 25px 0 7px;
        }

        .subtitle {
            color: #718096;
            font-size: 11px;
            margin-bottom: 30px;
        }

        .form-card {
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
            padding: 30px;
        }

        label {
            font-size: 10px;
            font-weight: 800;
            color: #092B49;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 1px solid #E5EDF3;
            border-radius: 10px;
            font-size: 11px;
            padding: 12px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #1268A8;
            box-shadow: 0 0 0 3px rgba(18,104,168,.08);
        }

        textarea.form-control {
            min-height: 120px;
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
        href="<?= base_url('/admin/doctors') ?>"
        class="back"
    >
        <i class="bi bi-arrow-left me-1"></i>
        Kembali ke Dokter
    </a>


    <h1>
        Edit Dokter
    </h1>

    <div class="subtitle">
        Perbarui informasi dokter.
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


    <div class="form-card">

        <form
            action="<?= base_url('/admin/doctors/update/' . $doctor['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="mb-4">

                <label>
                    NAMA DOKTER
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="<?= old('name', $doctor['name']) ?>"
                    required
                >

            </div>


            <div class="mb-4">

                <label>
                    SPESIALISASI
                </label>

                <input
                    type="text"
                    name="specialization"
                    class="form-control"
                    value="<?= old('specialization', $doctor['specialization']) ?>"
                    required
                >

            </div>


            <div class="mb-4">

                <label>
                    DESKRIPSI
                </label>

                <textarea
                    name="description"
                    class="form-control"
                ><?= old('description', $doctor['description']) ?></textarea>

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
                        <?= old('status', $doctor['status']) == 1 ? 'selected' : '' ?>
                    >
                        Aktif
                    </option>

                    <option
                        value="0"
                        <?= old('status', $doctor['status']) == 0 ? 'selected' : '' ?>
                    >
                        Nonaktif
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="btn-save"
            >
                <i class="bi bi-check-lg me-1"></i>
                Simpan Perubahan
            </button>

        </form>

    </div>

</main>

</body>

</html>