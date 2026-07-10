<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<header class="hero container">
    <div class="hero__atmosphere" aria-hidden="true"></div>
    <div class="hero__grid" aria-hidden="true"><span></span><span></span><span></span></div>

    <p class="meta hero__label reveal">Creative Developer — Indonesia</p>
    <h1 class="reveal">Code. Design. <em>Create</em>.</h1>
    <p class="hero__sub reveal">I'm Rizki, a creative developer from Indonesia passionate about building modern software, intuitive interfaces, and meaningful digital experiences.</p>
    <p class="meta hero__scroll reveal">Scroll ↓</p>
</header>

<section id="works" class="container section">
    <?= view(
        'components/section-heading',
        [
            'num'   => '01',
            'label' => 'Selected works',
            'count' => '(' . str_pad((string) count($projects), 2, '0', STR_PAD_LEFT) . ')',
        ],
        ['saveData' => false]
    ) ?>

    <div class="work-index">
        <?php foreach ($projects as $slug => $project): ?>
            <?= view('components/project-row', ['slug' => $slug, 'project' => $project]) ?>
        <?php endforeach ?>
    </div>
</section>

<section id="approach" class="container section">
    <?= view('components/section-heading', ['num' => '02', 'label' => 'Approach']) ?>

    <div class="approach">
        <p class="approach__statement reveal">Good software solves problems. Great software creates <em>experiences</em>.</p>

        <div class="approach__body">
            <p class="reveal">I build digital products that combine clean code, thoughtful design, and practical solutions. Every project is an opportunity to create something functional, intuitive, and visually engaging.</p>
            <p class="reveal">With a background in Information Systems, I work across software development, networking, and creative design. I enjoy learning new technologies and turning ideas into meaningful digital experiences.</p>
            <p class="meta approach__stack reveal">JavaScript · Node.js · React · PHP · Networking · UI/UX</p>
        </div>
    </div>
</section>

<section id="experience" class="container section">
    <?= view('components/section-heading', ['num' => '03', 'label' => 'Experience']) ?>

    <div class="exp-row reveal">
        <span class="meta">2026 — Present</span>
        <span class="exp-row__role">Independent Creative Developer</span>
        <span class="meta exp-row__place">Remote</span>
    </div>
    <div class="exp-row reveal">
        <span class="meta">2025 — 2026</span>
        <span class="exp-row__role">Engineering Administrator — Sinarmasland Plaza Thamrin</span>
        <span class="meta exp-row__place">Indonesia</span>
    </div>
    <div class="exp-row reveal">
        <span class="meta">2022 — Present</span>
        <span class="exp-row__role">Founder — Lost Soul Supply</span>
        <span class="meta exp-row__place">Indonesia</span>
    </div>
</section>

<section id="contact" class="container section">
    <?= view('components/section-heading', ['num' => '04', 'label' => 'Contact']) ?>

    <p class="meta reveal">Open for work, collaboration, or a good conversation.</p>
    <a class="contact__email reveal" href="mailto:dsikiiw@gmail.com">dsikiiw@gmail.com</a>

    <div class="contact__socials reveal">
        <a class="link meta" href="https://github.com/itsvein13" target="_blank" rel="noopener">GitHub ↗</a>
        <a class="link meta" href="https://www.instagram.com/syntaxvg/" target="_blank" rel="noopener">Instagram ↗</a>
        <a class="link meta" href="https://www.linkedin.com/in/rizki-dwi-s-447487289/" target="_blank" rel="noopener">LinkedIn ↗</a>
    </div>
</section>

<?= $this->endSection() ?>