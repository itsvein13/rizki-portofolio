# Final Design Review & QA — Changelog

## QA pass final (temuan tambahan, sudah diperbaiki)

- **[Bug] Kolom year di Selected Works meluber** — "2022 — Present" butuh ±111px, kolom hanya 70px, membuat baris Lost Soul Supply wrap dua baris dan merusak ritme index. Kolom dilebarkan ke 130px + year rata kanan.
- **[Bug] Parallax menyisakan celah** — translate 5% pada hero image case study memperlihatkan background di tepi atas/bawah. Gambar kini di-scale 1.1 hanya ketika parallax aktif (class `is-parallax` dari JS), tanpa memengaruhi mobile/reduced-motion.
- **[A11y] Escape menutup menu mobile** + fokus dikembalikan ke tombol Menu setelah tutup.
- **[A11y] Skip-to-content link** — tersembunyi sampai fokus keyboard, standar yang selalu diperiksa reviewer aksesibilitas.
- **[Kualitas] Custom 404** (`app/Views/errors/html/error_404.php`) — sebelumnya 404 bawaan CodeIgniter yang putih polos; kini satu bahasa desain dengan site ("This page is *lost*. But never empty…"), dengan `noindex`.
- **Diperiksa & lolos:** robots.txt (allow all), struktur landmark (nav/main/footer), heading hierarchy per halaman (satu h1), semua link eksternal `rel="noopener"`, tidak ada z-index conflict nav/overlay, grid tablet 768–900px, kontras semua kombinasi warna, escaping XSS via `esc()` di semua output dinamis.

---


Review dilakukan terhadap seluruh halaman (home + 3 case study) dengan standar submission. Tidak ada redesign — semua perubahan mempertahankan design language yang ada. Timpa file project kamu dengan isi folder ini.

## Copy & konten (`app/Data/projects.php`, `home.php`)

- **"I'm Rizky" → "I'm Rizki"** — konsisten dengan wordmark footer dan nama di seluruh site. (Kalau "Rizky" memang disengaja, kembalikan.)
- **Link Lost Soul Supply diperbaiki** — `instagram.com/...` tanpa `https://` menghasilkan URL relatif yang rusak (`/work/instagram.com/...`). Sekarang absolut.
- **Outcome Vexa Asteria: string bullet → array** — sebelumnya "• 481 members • 17 slash commands…" menumpuk dalam satu paragraf. Sekarang dirender sebagai daftar hasil terukur dengan hairline divider dan em-dash mist, konsisten dengan bahasa arsip. Case study lain tetap paragraf (format bebas: string atau array).
- **Intent Vexa dilengkapi** — sebelumnya satu kalimat pendek, timpang dibanding section lain: kini "Build focused automation that stays out of the way — every interaction should feel human…"
- **Dash dinormalisasi** — "2022 - Present" / "2026 - Present" (hyphen) → em dash spasi "2022 — Present", sama di experience, year project, dan seluruh body copy (LSS memakai em dash tanpa spasi, kini konsisten).
- **Stack di Approach** — "JAVASCRIPT · NODE.JS" uppercase manual → "JavaScript · Node.js" (class `.meta` sudah meng-uppercase via CSS; source tetap bersih).
- **Komentar `[TODO]` yang sudah selesai dihapus** dari views dan data.

## Selected Works (`project-row.php`, CSS)

- **Hover preview kini menampilkan gambar project** (hero.webp yang sudah kamu siapkan) dengan `object-fit: cover`, fallback ke tagline tipografi untuk project tanpa gambar. Ini juga menyelesaikan tagline Vexa yang terlalu panjang untuk kotak preview.
- **Counter "(03)"** ditambahkan di heading Selected works — echo referensi "Index of Studies", memberi bobot pada section yang kamu rasa kosong.
- **Preview dinonaktifkan di perangkat touch** (`@media (hover: none)`) — sebelumnya hanya berdasarkan lebar layar, sehingga tablet landscape mendapat hover state yang menggantung.

## SEO & loading (`Pages.php`, `layouts/main.php`, `project.php`)

- **Title & meta description per halaman** — sebelumnya semua halaman berjudul sama. Kini case study: "Vexa Asteria — Rizki Dwi Setyanto" + description dari tagline.
- **Open Graph + twitter:card + theme-color + favicon link** ditambahkan — share preview di WhatsApp/Discord/LinkedIn kini benar.
- **Hero image case study**: `fetchpriority="high"` + `decoding="async"`; preview di index: `loading="la