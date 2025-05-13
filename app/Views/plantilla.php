<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>

    <!-- Bootstrap 5 CSS (última versión desde CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <!-- Navbar -->
    <?= $navbar ?>

    <!-- Main Content -->
    <main>
        <?= $main ?>
    </main>

    <!-- Footer -->
    <?= $footer ?>

    <!-- Bootstrap JS + Popper (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>