# CuidarIA (NeoNatCare)

Portal web de acompañamiento neonatal y bienestar del cuidador (0 a 28 días de vida): guías clínicas oficiales para el bebé y contención emocional para quien lo cuida, ajustando el tono de la IA según el estado emocional reciente del cuidador.

Ver [`CLAUDE.md`](CLAUDE.md) para el contexto completo del proyecto y las convenciones vigentes.

## Estado del proyecto

**Fase 1 (actual): diseño e implementación estática.** Todavía no existe el proyecto Laravel — eso se hace en una segunda etapa, en un entorno local con Laragon (ver `docs/ROADMAP.md`).

- [`docs/`](docs) — documentación de producto: arquitectura, sistema de diseño, roadmap, inventario de vistas.
- [`mockups/`](mockups) — mockup de diseño importado desde claude.ai/design (referencia visual, una sola página con las 13 pantallas).
- [`site/`](site) — implementación real en HTML/CSS/JS estático de esas 13 pantallas más "Privacidad y datos de salud" y "Ayuda y contacto" (que en el mockup eran enlaces sin destino), sin dependencias de build. Es la base que se traduce a vistas Blade en la Fase 2.

## Fase 2 (pendiente)

Proyecto Laravel 11+ / PHP 8.2+ / MySQL 8.0 en Laragon, traduciendo `site/` a vistas Blade y construyendo los modelos, controladores y el flujo RAG dual descritos en `docs/ARCHITECTURE.md`.
