<?php
/**
 * @var string      $num    Nomor section, mis. "01"
 * @var string      $label  Judul section, mis. "Selected works"
 * @var string|null $count  Opsional, mis. "(03)"
 */
?>
<div class="section-head reveal">
    <span class="section-head__ghost" aria-hidden="true"><?= esc($num) ?></span>
    <span class="meta"><?= esc($num) ?></span>
    <h2><?= esc($label) ?></h2>
    <?php if (! empty($count)): ?>
        <span class="meta section-head__count"><?= esc($count) ?></span>
    <?php endif ?>
</div>
