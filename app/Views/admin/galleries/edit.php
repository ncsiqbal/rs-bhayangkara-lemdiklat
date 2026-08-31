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

        .current-image {
            margin-bottom: 15px;
        }

        .current-image img {
            width: 220px;
            height: 135px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #E5EDF3;
        }

        .current-label {
            margin-top: 7px;
            color: #94A3B8;
            font-size: 9px;
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
        Edit Kegiatan
    </h1>


    <div class="subtitle">
        Perbarui dokumentasi kegiatan Rumah Sakit.
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
            action="<?= base_url('/admin/galleries/update/' . $gallery['id']) ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <?= csrf_field() ?>


            <!-- JUDUL -->

            <div class="mb-4">

                <label>
                    JUDUL KEGIATAN
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    placeholder="Contoh: Bakti Sosial Kesehatan"
                    value="<?= old('title', $gallery['title']) ?>"
                    required
                >

            </div>


            <!-- DESKRIPSI -->

            <div class="mb-4">

                <label>
                    DESKRIPSI
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Tuliskan deskripsi singkat mengenai kegiatan..."
                ><?= old('description', $gallery['description']) ?></textarea>

            </div>


            <!-- TANGGAL -->

            <div class="mb-4">

                <label>
                    TANGGAL KEGIATAN
                </label>

                <input
                    type="date"
                    name="event_date"
                    class="form-control"
                    value="<?= old('event_date', $gallery['event_date']) ?>"
                    required
                >

            </div>


            <!-- FOTO -->

            <div class="mb-4">

                <label>
                    FOTO KEGIATAN
                </label>


                <?php if (!empty($gallery['image'])): ?>

                    <div class="current-image">

                        <img
                            src="<?= base_url('uploads/gallery/' . $gallery['image']) ?>"
                            alt="<?= esc($gallery['title']) ?>"
                        >

                        <div class="current-label">
                            Foto saat ini
                        </div>

                    </div>

                <?php endif; ?>


                <div class="upload-box">

                    <div class="upload-icon">

                        <i class="bi bi-cloud-arrow-up"></i>

                    </div>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <div class="upload-helper">
                        Kosongkan jika tidak ingin mengganti foto.
                        JPG, PNG atau WEBP • Maksimal 5 MB
                    </div>

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
                        <?= old('status', $gallery['status']) == 1 ? 'selected' : '' ?>
                    >
                        Aktif
                    </option>

                    <option
                        value="0"
                        <?= old('status', $gallery['status']) == 0 ? 'selected' : '' ?>
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