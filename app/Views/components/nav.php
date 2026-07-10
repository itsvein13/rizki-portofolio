<nav id="nav" class="nav">
    <div class="container nav__inner">
        <a href="<?= base_url() ?>" class="nav__brand">RDS©</a>

        <div class="nav__links">
            <a class="link" href="<?= base_url() ?>#works">Works</a>
            <a class="link" href="<?= base_url() ?>#approach">Approach</a>
            <a class="link" href="<?= base_url() ?>#contact">Contact</a>
        </div>

        <button class="nav__toggle" id="nav-toggle" aria-expanded="false" aria-controls="nav-overlay">Menu</button>
    </div>
</nav>

<div class="nav-overlay" id="nav-overlay" aria-hidden="true">
    <div class="container nav-overlay__inner">
        <a href="<?= base_url() ?>#works">Works</a>
        <a href="<?= base_url() ?>#approach">Approach</a>
        <a href="<?= base_url() ?>#contact">Contact</a>
    </div>
</div>
