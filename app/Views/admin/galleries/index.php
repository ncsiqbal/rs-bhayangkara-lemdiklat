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

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #F5F8FA;
            color: #092B49;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .main {
            max-width: 1200px;
            margin: auto;
            padding: 45px 30px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .subtitle {
            margin-top: 7px;
            color: #718096;
            font-size: 11px;
        }

        .btn-primary-custom {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 12px 17px;
            border-radius: 10px;
            background: #092B49;
            color: white;
            text-decoration: none;
            font-size: 11px;
            font-weight: 800;
        }

        .btn-primary-custom:hover {
            background: #1268A8;
            color: white;
        }

        .alert {
            border: 0;
            border-radius: 10px;
            font-size: 10px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .gallery-card {
            overflow: hidden;
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
            transition: .2s ease;
        }

        .gallery-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(9,43,73,.08);
        }

        .gallery-image {
            position: relative;
            height: 190px;
            overflow: hidden;
            background: #EAF7FA;
        }

        .gallery-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #1268A8;
            background:
                radial-gradient(
                    circle at 30% 20%,
                    rgba(19,168,184,.18),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #EAF7FA,
                    #DCEFF5
                );
        }

        .image-placeholder i {
            font-size: 30px;
        }

.image-placeholder span {
    font-size: 9px;
    font-weight: 700;
}

        .status {
            position: absolute;
            top: 12px;
            right: 12px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: 800;
            backdrop-filter: blur(8px);
        }

        .status-active {
            background: rgba(234,248,240,.95);
            color: #18864B;
        }

        .status-inactive {
            background: rgba(241,245,249,.95);
            color: #64748B;
        }

        .gallery-body {
            padding: 18px;
        }

        .gallery-date {
            color: #1268A8;
            font-size: 9px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .gallery-title {
            font-size: 13px;
            font-weight: 800;
            line-height: 1.4;
        }

        .gallery-description {
            min-height: 34px;
            margin-top: 7px;
            color: #718096;
            font-size: 10px;
            line-height: 1.6;
        }

        .gallery-footer {
            display: flex;
            gap: 8px;
            margin-top: 18px;
            padding-top: 15px;
            border-top: 1px solid #EDF2F7;
        }

        .action {
            flex: 1;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 8px;
            font-size: 10px;
            font-weight: 800;
        }

        .edit {
            background: #EAF7FA;
            color: #1268A8;
            text-decoration: none;
        }

        .edit:hover {
            color: #1268A8;
        }

        .delete {
            background: #FFF1F2;
            color: #DC2626;
        }

        .empty {
            padding: 70px 20px;
            text-align: center;
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 18px;
            color: #718096;
            font-size: 11px;
        }

        .empty i {
            display: block;
            margin-bottom: 15px;
            color: #1268A8;
            font-size: 35px;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            color: #718096;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
        }

        .back:hover {
            color: #1268A8;
        }

        @media (max-width: 900px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .main {
                padding: 30px 18px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>

<body>

<main class="main">

    <div class="topbar">

        <div>

            <h1>
                Galeri & Kegiatan
            </h1>

            <div class="subtitle">
                Kelola dokumentasi kegiatan Rumah Sakit Bhayangkara Lemdiklat.
            </div>

        </div>

        <a
            href="<?= base_url('/admin/galleries/create') ?>"
            class="btn-primary-custom"
        >
            <i class="bi bi-plus-lg"></i>
            Tambah Kegiatan
        </a>

    </div>


    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success mb-4">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger mb-4">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <?php if (!empty($galleries)): ?>

        <div class="gallery-grid">

            <?php foreach ($galleries as $gallery): ?>

                <article class="gallery-card">

                    <div class="gallery-image">

                        <?php
                        $imagePath = FCPATH . 'uploads/gallery/' . ($gallery['image'] ?? '');
                        $imageExists = !empty($gallery['image']) && is_file($imagePath);
                        ?>

                        <?php if ($imageExists): ?>

                            <img
                                src="<?= base_url('uploads/gallery/' . $gallery['image']) ?>"
                                alt="<?= esc($gallery['title']) ?>"
                            >

                        <?php else: ?>

                            <div class="image-placeholder">

                                <i class="bi bi-camera"></i>

                                <span>
                                    Foto belum tersedia
                                </span>

                            </div>

                        <?php endif; ?>

                        <?php if ($gallery['status']): ?>

                            <span class="status status-active">
                                Aktif
                            </span>

                        <?php else: ?>

                            <span class="status status-inactive">
                                Nonaktif
                            </span>

                        <?php endif; ?>

                    </div>


                    <div class="gallery-body">

                        <div class="gallery-date">

                            <?= date(
                                'd M Y',
                                strtotime($gallery['event_date'])
                            ) ?>

                        </div>


                        <div class="gallery-title">

                            <?= esc($gallery['title']) ?>

                        </div>


                        <div class="gallery-description">

                            <?= esc(
                                $gallery['description']
                                    ?: 'Tidak ada deskripsi.'
                            ) ?>

                        </div>


                        <div class="gallery-footer">

                            <a
                                href="<?= base_url('/admin/galleries/edit/' . $gallery['id']) ?>"
                                class="action edit"
                            >
                                <i class="bi bi-pencil me-1"></i>
                                Edit
                            </a>


                            <form
                                action="<?= base_url('/admin/galleries/delete/' . $gallery['id']) ?>"
                                method="post"
                                style="flex: 1;"
                                onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')"
                            >

                                <?= csrf_field() ?>

                                <button
                                    type="submit"
                                    class="action delete w-100"
                                >
                                    <i class="bi bi-trash me-1"></i>
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="empty">

            <i class="bi bi-images"></i>

            Belum ada kegiatan yang tersedia.

        </div>

    <?php endif; ?>


    <a
        href="<?= base_url('/admin/dashboard') ?>"
        class="back"
    >
        ← Kembali ke Dashboard
    </a>

</main>

</body>

</html>