(() => {
    'use strict';
    const reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;

    // nav
    const nav = document.getElementById('nav');
    if (nav) {
        const onScroll = () => nav.classList.toggle('is-scrolled', scrollY > 40);
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
    const revealEls = document.querySelectorAll('.reveal');
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
