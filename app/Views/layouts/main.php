<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $pageTitle       = $title ?? 'Rizki Dwi Setyanto — Creative Developer';
    $pageDescription = $description ?? 'Creative Developer from Indonesia. Software, design, and brand identity — built with intention.';
    ?>
    <title><?= esc($pageTitle) ?></title>
    <meta name="description" content="<?= esc($pageDescription) ?>">
    <meta name="theme-color" content="#121417">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Rizki Dwi Setyanto">
    <meta property="og:title" content="<?= esc($pageTitle) ?>">
    <meta property="og:description" content="<?= esc($pageDescription) ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:image" content="<?= base_url('og.png') ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?= base_url('og.png') ?>">

    <link rel="icon" href="<?= base_url('favicon.ico') ?>" sizes="48x48">
    <link rel="icon" href="<?= base_url('icon-192.png') ?>" type="image/png" sizes="192x192">
    <link rel="apple-touch-icon" href="<?= base_url('apple-touch-icon.png') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://api.fontshare.com">
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400&display=swap" rel="stylesheet">
        <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700&display=swap" rel="stylesheet">
    </noscript>
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>

<body>

    <a class="skip-link" href="#main">Skip to content</a>

    <div class="grain" aria-hidden="true"></div>

    <?= $this->include('components/nav') ?>

    <main id="main">
        <?= $this->renderSection('content') ?>
    </main>