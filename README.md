# CuidarIA

Portal web de acompañamiento neonatal y bienestar del cuidador (0 a 28 días de vida): guías clínicas oficiales para el bebé y contención emocional para quien lo cuida, ajustando el tono según el estado emocional reciente del cuidador.

## Estado del proyecto

Backend Laravel 13 (PHP 8.3) con autenticación real (Laravel Breeze: login/registro/perfil persisten en base de datos) y las 19 pantallas del diseño traducidas a vistas Blade sobre Tailwind CSS v4, con un sistema de diseño propio ("Celeste Menta") implementado como Blade Components reutilizables. Lo que falta: conectar los datos de dominio (bebé, bitácora emocional, tamizaje) a modelos reales, e integrar el asistente de IA.

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
- [`mockups/`](mockups) — mockup de diseño original importado (una sola página con las 13 pantallas), referencia visual histórica.
- [`site/`](site) — implementación estática de referencia (HTML/CSS/JS, sin build) de las 19 pantallas, que sirvió de fuente de verdad visual para traducir a Blade.
