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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;

            background:
                radial-gradient(
                    circle at 80% 20%,
                    rgba(19,168,184,.15),
                    transparent 30%
                ),
                #F5F8FA;
        }

        .login-wrapper {
            width: 100%;
            max-width: 430px;
            padding: 25px;
        }

        .login-card {
            background: white;
            border: 1px solid #E5EDF3;
            border-radius: 24px;
            padding: 40px;
            box-shadow:
                0 25px 70px rgba(9,43,73,.08);
        }

        .brand-mark {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #EAF7FA;
            color: #1268A8;
            font-size: 25px;
            margin-bottom: 25px;
        }

        .brand {
            color: #092B49;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: -.3px;
        }

        .brand small {
            display: block;
            color: #7A8A99;
            font-size: 8px;
            letter-spacing: 1px;
            margin-top: 4px;
        }

        h1 {
            margin-top: 35px;
            color: #092B49;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .subtitle {
            color: #66788A;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        label {
            color: #092B49;
            font-size: 10px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .form-control {
            height: 48px;
            border: 1px solid #E5EDF3;
            border-radius: 11px;
            font-size: 12px;
            padding: 0 15px;
        }

        .form-control:focus {
            border-color: #1268A8;
            box-shadow: 0 0 0 3px rgba(18,104,168,.08);
        }

        .btn-login {
            height: 48px;
            width: 100%;
            border: 0;
            border-radius: 11px;
            background: #092B49;
            color: white;
            font-size: 12px;
            font-weight: 800;
            margin-top: 8px;
        }

        .btn-login:hover {
            background: #1268A8;
        }

        .alert {
            border-radius: 10px;
            font-size: 11px;
        }

        .back-home {
            display: block;
            text-align: center;
            color: #66788A;
            font-size: 10px;
            font-weight: 700;
            margin-top: 20px;
        }

        .back-home:hover {
            color: #1268A8;
        }

    </style>

</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="brand-mark">
            <i class="bi bi-hospital"></i>
        </div>

        <div class="brand">

            BHAYANGKARA

            <small>
                RUMAH SAKIT LEMDIKLAT
            </small>

        </div>

        <h1>
            Admin Portal
        </h1>

        <p class="subtitle">
            Masuk untuk mengelola informasi dokter,
            jadwal pelayanan, unit, dan kegiatan rumah sakit.
        </p>


        <?php if (session()->getFlashdata('error')): ?>

            <div class="alert alert-danger">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>

        <?php endif; ?>


        <?php if (session()->getFlashdata('success')): ?>

            <div class="alert alert-success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>

        <?php endif; ?>


        <form
            action="<?= base_url('/admin/login') ?>"
            method="post"
        >

            <?= csrf_field() ?>

            <div class="mb-3">

                <label>
                    EMAIL
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="admin@rsbhayangkara.test"
                    value="<?= old('email') ?>"
                    required
                >

            </div>


            <div class="mb-4">

                <label>
                    PASSWORD
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn-login"
            >
                Masuk ke Dashboard
                <i class="bi bi-arrow-right ms-2"></i>
            </button>

        </form>


        <a
            href="<?= base_url('/') ?>"
            class="back-home"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke website
        </a>

    </div>

</div>

</body>

</html>