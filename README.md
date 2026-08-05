# rizki-portfolio

Source code for my personal portfolio, built with CodeIgniter 4.

Live at [rizkidwis.online](https://rizkidwis.online)

## Stack

- PHP 8.3 + CodeIgniter 4
- Vanilla JS (no framework, no build step)
- Plain CSS with custom properties
- Deployed on Railway via Docker

## Structure

```
app/
  Controllers/Pages.php     one controller, home + project pages
  Data/projects.php         all project content lives here
  Views/
    layouts/main.php
    components/             nav, footer, project row, section heading
    pages/                  home, project (case study template)
public/
  assets/
    css/main.css
    js/main.js
    img/                    per-project images
```

## Running locally

```bash
composer install
cp env .env
php spark serve
```

Visit `http://localhost:8080`.

## Editing content

All project data (title, tagline, case study copy, gallery images) is in `app/Data/projects.php`. Add or edit a project there and it shows up automatically on the home page and gets its own `/work/{slug}` page.

## Deployment

Runs on Railway using the included `Dockerfile`. Push to `main` and it redeploys automatically.

Required environment variables:

```
CI_ENVIRONMENT=production
app.baseURL=https://rizkidwis.online/
```
