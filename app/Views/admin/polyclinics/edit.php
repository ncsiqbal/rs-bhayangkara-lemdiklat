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

        .back:hover {
            color: #1268A8;
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
            display: block;
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

        textarea.form-control {
            min-height: 110px;
            resize: vertical;
        }

        .icon-preview {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #EAF7FA;
            color: #1268A8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            margin-top: 10px;
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
            color: white;
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
        Edit Unit & Poli
    </h1>


    <div class="subtitle">
        Perbarui informasi unit pelayanan rumah sakit.
    </div>


    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert alert-danger mb-4">

            <?php foreach (session()->getFlashdata('errors') as $error): ?>

                <div>
                    <?= esc($error) ?>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <div class="card-form">

        <form
            action="<?= base_url('/admin/polyclinics/update/' . $polyclinic['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <!-- NAMA -->

            <div class="mb-4">

                <label>
                    NAMA UNIT / POLI
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Contoh: Poli Mata"
                    value="<?= old('name', $polyclinic['name']) ?>"
                    required
                >

            </div>


            <!-- DESCRIPTION -->

            <div class="mb-4">

                <label>
                    DESKRIPSI
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Deskripsi singkat mengenai layanan poli..."
                ><?= old('description', $polyclinic['description']) ?></textarea>

            </div>


            <!-- ICON -->

            <div class="mb-4">

                <label>
                    ICON
                </label>

                <input
                    type="text"
                    name="icon"
                    class="form-control"
                    placeholder="fa-solid fa-eye"
                    value="<?= old('icon', $polyclinic['icon']) ?>"
                >

                <div class="helper">
                    Gunakan class Font Awesome, contoh: fa-solid fa-eye
                </div>

                <div class="icon-preview">
                    <i class="<?= esc($polyclinic['icon'] ?: 'bi bi-hospital') ?>"></i>
                </div>

            </div>


            <!-- STATUS -->

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
                        <?= old('status', $polyclinic['status']) == 1 ? 'selected' : '' ?>
                    >
                        Aktif
                    </option>

                    <option
                        value="0"
                        <?= old('status', $polyclinic['status']) == 0 ? 'selected' : '' ?>
                    >
                        Nonaktif
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="btn-save"
            >
                Simpan Perubahan
            </button>

        </form>

    </div>

</main>

</body>

</html>