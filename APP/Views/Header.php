<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Auth'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php if(isset($_SESSION['user'])): ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">

        <div class="ms-auto">
            <span class="text-white me-3">
                <?= $_SESSION['user']['name']; ?>
            </span>

            <a href="<?= BASE_URL ?>/logout" class="btn btn-danger btn-sm">
                Logout
            </a>
        </div>
    </div>
</nav>

<?php endif; ?>

<div class="container mt-5">
