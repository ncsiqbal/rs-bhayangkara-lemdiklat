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
            max-width: 760px;
            margin: auto;
            padding: 50px 25px;
        }

        .back {
            color: #718096;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
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

        textarea.form-control {
            min-height: 110px;
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

        .helper {
            color: #94A3B8;
            font-size: 9px;
            margin-top: 6px;
        }

    </style>

</head>

<body>

<main class="main">

    <a
        href="<?= base_url('/admin/polyclinics') ?>"
        class="back"
    >
        ← Kembali ke Unit & Poli
    </a>

    <h1>
        Tambah Unit & Poli
    </h1>

    <div class="subtitle">
        Tambahkan informasi unit pelayanan rumah sakit.
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
            action="<?= base_url('/admin/polyclinics/store') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="mb-4">

                <label>
                    NAMA UNIT / POLI
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Contoh: Poli Mata"
                    value="<?= old('name') ?>"
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
                    placeholder="Deskripsi singkat mengenai layanan poli..."
                ><?= old('description') ?></textarea>

            </div>


            <div class="mb-4">

                <label>
                    ICON
                </label>

                <input
                    type="text"
                    name="icon"
                    class="form-control"
                    placeholder="fa-solid fa-eye"
                    value="<?= old('icon') ?>"
                >

                <div class="helper">
                    Gunakan class Font Awesome, contoh: fa-solid fa-eye
                </div>

            </div>


            <div class="mb-4">

                <label>
                    STATUS
                </label>

                <select
                    name="status"
                    class="form-select"
                >

                    <option value="1">
                        Aktif
                    </option>

                    <option value="0">
                        Nonaktif
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="btn-save"
            >
                Simpan Poli
            </button>

        </form>

    </div>

</main>

</body>

</html>