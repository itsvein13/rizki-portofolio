<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<article class="case container">

    <header class="case__head">
        <p class="meta reveal"><?= esc($project['num']) ?> — <?= esc($project['year']) ?></p>
        <h1 class="reveal"><?= esc($project['title']) ?></h1>
        <p class="case__tagline reveal"><em><?= esc($project['tagline']) ?></em></p>

        <div class="case__meta reveal">
            <div><span class="meta">Role</span>
                <p><?= esc($project['role']) ?></p>
            </div>
            <div><span class="meta">Stack</span>
                <p><?= esc($project['stack']) ?></p>
            </div>
            <div><span class="meta">Year</span>
                <p><?= esc($project['year']) ?></p>
            </div>
            <div>
                <span class="meta">Link</span>
                <?php if (! empty($project['link'])): ?>
                    <p><a class="link" href="<?= esc($project['link'], 'attr') ?>" target="_blank" rel="noopener">Visit ↗</a></p>
                <?php else: ?>
                    <p>—</p>
                <?php endif ?>
            </div>
        </div>
    </header>

    <?php
    $heroImg  = 'assets/img/' . $slug . '/hero.webp';
    $heroSize = is_file(FCPATH . $heroImg) ? getimagesize(FCPATH . $heroImg) : null;
    ?>
    <div class="case__hero <?= $heroSize ? 'case__hero--img' : '' ?> reveal">
        <?php if ($heroSize): ?>
            <img src="<?= base_url($heroImg) ?>" alt="<?= esc($project['title']) ?>"
                width="<?= $heroSize[0] ?>" height="<?= $heroSize[1] ?>"
                loading="eager" fetchpriority="high" decoding="async">
        <?php else: ?>
            <span class="case__hero-placeholder"><em><?= esc($project['title']) ?></em></span>
        <?php endif ?>
    </div>

    <p class="case__intro reveal"><?= esc($project['intro']) ?></p>

    <div class="case__section">
        <span class="meta case__label reveal">Problem</span>
        <p class="reveal"><?= esc($project['problem']) ?></p>
    </div>

    <div class="case__section">
        <span class="meta case__label reveal">Intent</span>
        <p class="reveal"><?= esc($project['intent']) ?></p>
    </div>

    <div class="case__section">
        <span class="meta case__label reveal">Process</span>
        <p class="reveal"><?= esc($project['process']) ?></p>
    </div>

    <?php if (! empty($project['gallery'])): ?>
        <div class="case__gallery">
            <?php foreach ($project['gallery'] as $img): ?>
                <?php
                    $imgPath = 'assets/img/' . $slug . '/' . $img;
                    if (! is_file(FCPATH . $imgPath)) continue;
                    $size = getimagesize(FCPATH . $imgPath);
                ?>
                <figure class="reveal">
                    <img src="<?= base_url($imgPath) ?>" alt="<?= esc($project['title']) ?> — detail"
                         width="<?= $size[0] ?>" height="<?= $size[1] ?>"
                         loading="lazy" decoding="async">
                </figure>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <div class="case__section">
        <span class="meta case__label reveal">Outcome</span>
        <?php if (is_array($project['outcome'])): ?>
            <ul class="case__outcomes">
                <?php foreach ($project['outcome'] as $item): ?>
                    <li class="reveal"><?= esc($item) ?></li>
                <?php endforeach ?>
            </ul>
        <?php else: ?>
            <p class="reveal"><?= esc($project['outcome']) ?></p>
        <?php endif ?>
    </div>

    <?php if ($next): ?>
        <a href="<?= base_url('work/' . $nextSlug) ?>" class="case__next reveal">
            <span class="meta">Next</span>
            <span class="case__next-title"><?= esc($next['title']) ?> →</span>
        </a>
    <?php endif ?>

</article>

<?= $this->endSection() ?>