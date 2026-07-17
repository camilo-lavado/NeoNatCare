# CuidarIA

Portal web de acompañamiento neonatal y bienestar del cuidador (0 a 28 días de vida): guías clínicas oficiales para el bebé y contención emocional para quien lo cuida. Ver [`docs/README.md`](docs/README.md) para el pitch de producto completo.

## Estado del proyecto

Backend Laravel 13 (PHP 8.3) con autenticación real (Laravel Breeze) y las 19 pantallas del diseño traducidas a vistas Blade sobre Tailwind CSS v4, con el sistema de diseño "Celeste Menta" (ver [`docs/DESIGN-SYSTEM.md`](docs/DESIGN-SYSTEM.md)). El modelo de datos del bebé y el asistente de IA con RAG dual (ver [`docs/ARCHITECTURE.md`](docs/ARCHITECTURE.md)) todavía no están conectados. El detalle de qué vista está implementada vs. pendiente vive en [`docs/VIEWS.md`](docs/VIEWS.md) y el plan de trabajo en [`docs/ROADMAP.md`](docs/ROADMAP.md).

## Stack técnico

- Laravel 13 (PHP 8.3) · autenticación con Laravel Breeze
- Blade + Tailwind CSS v4 (sin frameworks de frontend)
- SQLite en desarrollo local
- Vite (`laravel-vite-plugin`) para assets y fuentes autohospedadas (Quicksand, Nunito Sans)

## Cómo correrlo localmente

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
composer run dev
```

Abre `http://127.0.0.1:8000` y crea una cuenta en `/register`.

## Estructura del repositorio

- [`app/`](app), [`routes/`](routes), [`resources/views/`](resources/views) — el proyecto Laravel.
- [`docs/`](docs) — documentación de producto: arquitectura, sistema de diseño, roadmap, inventario de vistas.
- [`mockups/`](mockups) — mockup de diseño original importado (una sola página con las 13 pantallas), referencia visual.
- [`site/`](site) — implementación estática de referencia (HTML/CSS/JS, sin build) de las 19 pantallas, fuente de verdad visual traducida a Blade en `resources/views/`.
