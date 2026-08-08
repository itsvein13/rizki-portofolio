<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<header class="hero container">
    <div class="hero__atmosphere" aria-hidden="true"></div>
    <div class="hero__grid" aria-hidden="true"><span></span><span></span><span></span></div>

    <p class="meta hero__label mask"><span class="reveal">Software Developer — Indonesia</span></p>
    <h1 data-hero-parallax="1"><span class="mask"><span class="reveal">Code.</span></span> <span class="mask"><span class="reveal">Design.</span></span> <span class="mask"><span class="reveal"><em>Create</em>.</span></span></h1>
    <p class="hero__sub mask" data-hero-parallax="0.6"><span class="reveal">I'm Rizki, a creative developer from Indonesia passionate about building modern software, intuitive interfaces, and meaningful digital experiences.</span></p>
    <p class="meta hero__scroll mask"><span class="reveal">Scroll ↓</span></p>
</header>

<section id="about" class="container section about">
    <div class="section-head about__head">
        <span class="section-head__ghost" aria-hidden="true">01</span>
        <span class="meta reveal">01</span>
        <h2 class="about__heading mask"><span class="reveal">A little about who I am.</span></h2>
    </div>

    <div class="about__body">
        <div class="about__portrait" data-parallax-subtle>
            <img src="<?= base_url('assets/img/profile-hero.webp') ?>" alt="Rizki Dwi Setyanto" width="910" height="1142" loading="lazy" decoding="async">
        </div>

        <p class="about__desc reveal">I'm Rizki Dwi Setyanto, a software developer based in Indonesia. My work sits between software development, interface design, and product thinking — from building web applications to shaping the experiences around them. I enjoy turning ideas into things that are functional, considered, and genuinely useful.</p>
    </div>
</section>

<section id="works" class="container section">
    <?= view(
        'components/section-heading',
        [
            'num'   => '02',
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
    <?= view('components/section-heading', ['num' => '03', 'label' => 'Approach']) ?>

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
    <?= view('components/section-heading', ['num' => '04', 'label' => 'Experience']) ?>

    <div class="timeline">
        <span class="timeline__line" aria-hidden="true"><span class="timeline__progress"></span></span>

        <article class="timeline__item reveal">
            <span class="timeline__dot" aria-hidden="true"></span>
            <p class="meta">2026 — Present</p>
            <h3>Independent Creative Developer</h3>
            <p class="meta timeline__place">Remote</p>
            <ul>
                <li>Designing and building digital products end to end — from brand identity and UI/UX to development and deployment.</li>
                <li>Shipped VOIDSPEND, a personal finance app focused on effortless tracking, and Vexa Asteria, a Discord bot built for community management.</li>
                <li>Designed and built this portfolio itself — custom design system, CodeIgniter 4, deployed on its own domain.</li>
            </ul>
        </article>

        <article class="timeline__item reveal">
            <span class="timeline__dot" aria-hidden="true"></span>
            <p class="meta">Jan 2025 — May 2026</p>
            <h3>Engineering Administrator</h3>
            <p class="meta timeline__place">Sinarmas Land Plaza Thamrin — Jakarta, Indonesia</p>
            <ul>
                <li>Supported building system and infrastructure operations, including monitoring and troubleshooting of technical equipment.</li>
                <li>Managed and processed operational data using SAP.</li>
                <li>Supported employee administration and operational needs through the GreatDay HR platform.</li>
                <li>Monitored electricity consumption (KWH) and related systems across several buildings.</li>
                <li>Managed access control systems (Pro-Watch, E-Dot Win), including access configuration and user management.</li>
                <li>Supported Building Automation System (BAS) operations to ensure systems run optimally.</li>
                <li>Monitored and troubleshot CCTV systems (IP &amp; analog).</li>
                <li>Troubleshot LAN networks to support smooth office operations.</li>
                <li>Installed, configured, and repaired printers according to operational needs.</li>
                <li>Installed new devices such as webcams to support meeting and office operational needs.</li>
                <li>Provided technical support for internal needs (events, meetings, etc.).</li>
                <li>Handled technical issues during meetings, including configuring HDMI connections to TVs and projectors.</li>
                <li>Prepared technical reports and operational documentation on a regular basis.</li>
            </ul>
        </article>

        <article class="timeline__item reveal">
            <span class="timeline__dot" aria-hidden="true"></span>
            <p class="meta">Dec 2023 — Apr 2024</p>
            <h3>IT Ops / Monitoring</h3>
            <p class="meta timeline__place">PT. Bringin Gigantara — Indonesia</p>
            <ul>
                <li>Monitored systems and handled incidents on ATM and CRM units (±11,000 units in scale).</li>
                <li>Performed initial troubleshooting and coordinated with technical teams to resolve issues.</li>
                <li>Analyzed issue data and system performance using Microsoft Excel.</li>
                <li>Managed and monitored maintenance tickets to ensure timely resolution.</li>
                <li>Prepared operational reports and distributed information to related units.</li>
            </ul>
        </article>

        <article class="timeline__item reveal">
            <span class="timeline__dot" aria-hidden="true"></span>
            <p class="meta">2022 — Present</p>
            <h3>Founder</h3>
            <p class="meta timeline__place">Lost Soul Supply — Indonesia</p>
            <ul>
                <li>Built an independent clothing brand from zero — identity, design, production, and marketing.</li>
            </ul>
        </article>
    </div>
</section>

<section id="contact" class="container section">
    <?= view('components/section-heading', ['num' => '05', 'label' => 'Contact']) ?>

    <p class="meta reveal">Open for work, collaboration, or a good conversation.</p>
    <a class="contact__email reveal" href="mailto:dsikiiw@gmail.com">dsikiiw@gmail.com</a>

    <div class="contact__socials reveal">
        <a class="link meta" href="https://github.com/itsvein13" target="_blank" rel="noopener">GitHub ↗</a>
        <a class="link meta" href="https://www.instagram.com/syntaxvg/" target="_blank" rel="noopener">Instagram ↗</a>
        <a class="link meta" href="https://www.linkedin.com/in/rizki-dwi-s-447487289/" target="_blank" rel="noopener">LinkedIn ↗</a>
        <a class="link meta" href="<?= base_url('Rizki-Dwi-Setyanto-Resume.pdf') ?>" target="_blank" rel="noopener">Résumé ↗</a>
    </div>
</section>

<?= $this->endSection() ?>