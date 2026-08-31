<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            color: #092B49;
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            margin: 25px 0 8px;
            font-size: 28px;
            font-weight: 800;
        }

        .subtitle {
            margin-bottom: 30px;
            color: #718096;
            font-size: 11px;
        }

        .card-form {
            padding: 30px;
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 10px;
            font-weight: 800;
        }

        .form-control,
        .form-select {
            padding: 12px;
            border: 1px solid #E5EDF3;
            border-radius: 10px;
            font-size: 11px;
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

        .upload-box {
            padding: 25px;
            text-align: center;
            border: 1px dashed #C9D7E2;
            border-radius: 12px;
            background: #FAFCFD;
        }

        .upload-icon {
            margin-bottom: 10px;
            color: #1268A8;
            font-size: 30px;
        }

        .upload-helper {
            margin-top: 7px;
            color: #94A3B8;
            font-size: 9px;
        }

        .btn-save {
            padding: 12px 20px;
            border: 0;
            border-radius: 10px;
            background: #092B49;
            color: white;
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
        href="<?= base_url('/admin/galleries') ?>"
        class="back"
    >
        ← Kembali ke Galeri
    </a>


    <h1>
        Tambah Kegiatan
    </h1>


    <div class="subtitle">
        Tambahkan dokumentasi kegiatan Rumah Sakit.
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
            action="<?= base_url('/admin/galleries/store') ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>


            <div class="mb-4">

                <label>
                    JUDUL KEGIATAN
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    placeholder="Contoh: Bakti Sosial Kesehatan"
                    value="<?= old('title') ?>"
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
                    placeholder="Tuliskan deskripsi singkat mengenai kegiatan..."
                ><?= old('description') ?></textarea>

            </div>


            <div class="mb-4">

                <label>
                    TANGGAL KEGIATAN
                </label>

                <input
                    type="date"
                    name="event_date"
                    class="form-control"
                    value="<?= old('event_date', date('Y-m-d')) ?>"
                    required
                >

            </div>


            <div class="mb-4">

                <label>
                    FOTO KEGIATAN
                </label>

                <div class="upload-box">

                    <div class="upload-icon">

                        <i class="bi bi-cloud-arrow-up"></i>

                    </div>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                        required
                    >

                    <div class="upload-helper">
                        JPG, PNG atau WEBP • Maksimal 5 MB
                    </div>

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
                <i class="bi bi-check-lg me-1"></i>
                Simpan Kegiatan
            </button>

        </form>

    </div>

</main>

</body>

</html>