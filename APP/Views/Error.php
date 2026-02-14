<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $code ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div style="max-width: 500px; width: 100%;">

        <div class="border rounded p-4">

            <h2 class="mb-3"><?= $code ?> — <?= $title ?></h2>

            <p class="text-muted">
                <?= $message ?>
            </p>

            <a href="<?= BASE_URL ?>" class="btn btn-outline-secondary btn-sm mt-2">
                ← Kembali
            </a>

        </div>

    </div>
</div>

</body>
</html>
