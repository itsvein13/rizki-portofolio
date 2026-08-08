(() => {
    'use strict';
    const reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;

    // nav
    const nav = document.getElementById('nav');
    if (nav) {
        let lastY = scrollY;
        const onScroll = () => {
            const y = scrollY;
            nav.classList.toggle('is-scrolled', y > 40);
            if (!reduced) {
                nav.classList.toggle('is-dimmed', y > lastY && y > 120);
            }
            lastY = y;
        };
        addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // menu mobile
    const toggle  = document.getElementById('nav-toggle');
    const overlay = document.getElementById('nav-overlay');
    if (toggle && overlay) {
        const setOpen = (open) => {
            overlay.classList.toggle('is-open', open);
            overlay.setAttribute('aria-hidden', String(!open));
            toggle.setAttribute('aria-expanded', String(open));
            toggle.textContent = open ? 'Close' : 'Menu';
            document.body.style.overflow = open ? 'hidden' : '';
            if (!open) toggle.focus();
        };
        toggle.addEventListener('click', () =>
            setOpen(!overlay.classList.contains('is-open')));
        overlay.querySelectorAll('a').forEach((a) =>
            a.addEventListener('click', () => setOpen(false)));
        addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && overlay.classList.contains('is-open')) setOpen(false);
        });
    }

    // reveal on scroll
    const revealEls = document.querySelectorAll('.reveal, .about__portrait');
    if (reduced) {
        revealEls.forEach((el) => el.classList.add('is-visible'));
    } else {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((e) => {
                if (e.isIntersecting) {
                    e.target.classList.add('is-visible');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.15 });

        revealEls.forEach((el, i) => {
            if (el.closest('.hero')) el.style.transitionDelay = `${i * 80}ms`;
            io.observe(el);
        });
    }

    // parallax
    const parallaxEls = document.querySelectorAll('[data-parallax]');
    if (!reduced && parallaxEls.length && innerWidth > 768) {
        parallaxEls.forEach((el) => el.classList.add('is-parallax'));
        let ticking = false;
        const update = () => {
            parallaxEls.forEach((el) => {
                const r = el.getBoundingClientRect();
                const progress = (r.top + r.height / 2 - innerHeight / 2) / innerHeight;
                const child = el.firstElementChild;
                if (child) child.style.transform = `translateY(${(-progress * 5).toFixed(2)}%)`;
            });
            ticking = false;
        };
        addEventListener('scroll', () => {
            if (!ticking) { requestAnimationFrame(update); ticking = true; }
        }, { passive: true });
        update();
    }

    // about portrait: subtle parallax, capped in px
    const subtleEls = document.querySelectorAll('[data-parallax-subtle]');
    if (!reduced && subtleEls.length && innerWidth > 768) {
        let ticking2 = false;
        const MAX_PX = 16;
        const updateSubtle = () => {
            subtleEls.forEach((el) => {
                const r = el.getBoundingClientRect();
                const progress = (r.top + r.height / 2 - innerHeight / 2) / innerHeight;
                const px = Math.max(-MAX_PX, Math.min(MAX_PX, -progress * MAX_PX * 2));
                const child = el.firstElementChild;
                if (child) child.style.transform = `translateY(${px.toFixed(1)}px)`;
            });
            ticking2 = false;
        };
        addEventListener('scroll', () => {
            if (!ticking2) { requestAnimationFrame(updateSubtle); ticking2 = true; }
        }, { passive: true });
        updateSubtle();
    }

    // hero: headline/paragraph move at a slightly different rate on the way out
    const heroParallaxEls = document.querySelectorAll('[data-hero-parallax]');
    const heroEl = document.querySelector('.hero');
    if (!reduced && heroParallaxEls.length && heroEl && innerWidth > 768) {
        let ticking3 = false;
        const updateHeroParallax = () => {
            const r = heroEl.getBoundingClientRect();
            const scrolled = Math.min(1, Math.max(0, -r.top / r.height));
            heroParallaxEls.forEach((el) => {
                const factor = parseFloat(el.dataset.heroParallax) || 1;
                el.style.transform = `translateY(${(scrolled * -24 * factor).toFixed(1)}px)`;
            });
            ticking3 = false;
        };
        addEventListener('scroll', () => {
            if (!ticking3) { requestAnimationFrame(updateHeroParallax); ticking3 = true; }
        }, { passive: true });
        updateHeroParallax();
    }

    // section ghost numbers: faint drift, keeps their static -58% centering
    const ghostEls = document.querySelectorAll('.section-head__ghost');
    if (!reduced && ghostEls.length) {
        let ticking4 = false;
        const MAX_GHOST_PX = 10;
        const updateGhosts = () => {
            ghostEls.forEach((el) => {
                const r = el.getBoundingClientRect();
                const progress = (r.top + r.height / 2 - innerHeight / 2) / innerHeight;
                const px = Math.max(-MAX_GHOST_PX, Math.min(MAX_GHOST_PX, -progress * MAX_GHOST_PX * 1.4));
                el.style.transform = `translateY(calc(-58% + ${px.toFixed(1)}px))`;
            });
            ticking4 = false;
        };
        addEventListener('scroll', () => {
            if (!ticking4) { requestAnimationFrame(updateGhosts); ticking4 = true; }
        }, { passive: true });
        updateGhosts();
    }

    // works: preview image drifts toward the cursor's vertical position (desktop only)
    const workRows = document.querySelectorAll('.work-row');
    if (!reduced && workRows.length && matchMedia('(hover: hover) and (pointer: fine)').matches) {
        workRows.forEach((row) => {
            row.addEventListener('mousemove', (e) => {
                const r = row.getBoundingClientRect();
                const relY = (e.clientY - r.top) / r.height - 0.5;
                row.style.setProperty('--cursor-y', `${(relY * 24).toFixed(1)}px`);
            });
        });
    }

    // timeline: garis menyala mengikuti scroll
    const tl = document.querySelector('.timeline');
    if (tl) {
        const prog = tl.querySelector('.timeline__progress');
        const dots = tl.querySelectorAll('.timeline__dot');
        if (reduced) {
            prog.style.height = '100%';
            dots.forEach((d) => d.classList.add('is-lit'));
        } else {
            const updTl = () => {
                const r = tl.getBoundingClientRect();
                const mid = innerHeight * 0.6;
                const p = Math.min(1, Math.max(0, (mid - r.top) / r.height));
                prog.style.height = `${(p * 100).toFixed(2)}%`;
                dots.forEach((d) => {
                    const dr = d.getBoundingClientRect();
                    d.classList.toggle('is-lit', dr.top + dr.height / 2 < mid);
                });
            };
            addEventListener('scroll', updTl, { passive: true });
            updTl();
        }
    }
})();
