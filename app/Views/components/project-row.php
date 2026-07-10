<?php
/**
 * @var string $slug
 * @var array  $project  Satu entri dari app/Data/projects.php
 */
$previewImg = 'assets/img/' . $slug . '/hero.webp';
?>
<a href="<?= base_url('work/' . $slug) ?>" class="work-row reveal">
    <span class="work-row__num"><?= esc($project['num']) ?></span>
    <span class="work-row__title"><?= esc($project['title']) ?></span>
    <span class="work-row__cat"><?= esc($project['category']) ?></span>
    <span class="work-row__year"><?= esc($project['year']) ?></span>

    <span class="work-row__preview" aria-hidden="true">
        <?php if (is_file(FCPATH . $previewImg)): ?>
            <img src="<?= base_url($previewImg) ?>" alt="" loading="lazy" decoding="async">
        <?php else: ?>
            <em><?= esc($project['tagline']) ?></em>
        <?php endif ?>
    </span>
</a>
