# RDS© Portfolio — Panduan Pemasangan

Source ini **ditimpakan ke atas project CI4 appstarter** yang sudah kamu buat di `C:\laragon\www\rizki-portfolio`.

## 1. Pasang file

Salin isi folder ini ke project kamu, timpa file yang sudah ada:

| Dari | Ke |
|---|---|
| `app/Controllers/Pages.php` | `app/Controllers/` |
| `app/Config/Routes.php` | `app/Config/` (timpa) |
| `app/Data/projects.php` | `app/Data/` (buat folder baru) |
| `app/Views/layouts/`, `components/`, `pages/` | `app/Views/` |
| `public/assets/` | `public/` |
| `Dockerfile`, `.dockerignore` | root project |

Hapus `app/Controllers/Home.php` dan `app/Views/welcome_message.php` bawaan (opsional, tapi rapi).

## 2. Jalankan

```bash
php spark serve
```

- `http://localhost:8080` → homepage
- `http://localhost:8080/work/voidspend` → contoh case study

## 3. Isi konten kamu (cari tanda [TODO])

- `app/Data/projects.php` — cerita & fakta tiap project, link live
- `app/Views/pages/home.php` — experience rows + link sosial media
- Gambar project: taruh di `public/assets/img/<slug>/hero.webp`, lalu ganti placeholder di `app/Views/pages/project.php` (petunjuk ada di komentar)

## 4. Font (nanti, sebelum production)

Saat ini font dimuat dari Google Fonts + Fontshare CDN agar langsung jalan.
Sebelum live: download woff2 (Instrument Serif, Satoshi, JetBrains Mono), taruh di `public/assets/fonts/`, ganti `<link>` di `app/Views/layouts/main.php` dengan `@font-face` di `main.css`. Target: total < 150KB.

## 5. Deploy ke Railway

1. Push project ke GitHub (pastikan `.env` tidak ikut — sudah ada di `.gitignore` bawaan CI4).
2. [railway.com](https://railway.com) → New Project → Deploy from GitHub repo.
3. Railway mendeteksi `Dockerfile` otomatis.
4. Set environment variables di tab Variables:
   ```
   CI_ENVIRONMENT=production
   app.baseURL=https://<domain-railway-kamu>/
   ```
5. Settings → Networking → Generate Domain. Selesai.
6. Custom domain: tambah CNAME di DNS kamu ke domain Railway.

## Struktur

```
app/
  Controllers/Pages.php      satu controller, dua method
  Config/Routes.php          / dan /work/{slug}
  Data/projects.php          SEMUA konten project di sini
  Views/
    layouts/main.php         head, fonts, grain, nav, footer
    components/              partial reusable
    pages/home.php           homepage
    pages/project.php        template case study (dipakai 3 project)
public/assets/
  css/main.css               design system penuh, token di :root
  js/main.js                 nav, menu mobile, reveal, parallax — vanilla
```
