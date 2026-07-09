# CuidarIA

Portal web de acompañamiento neonatal y bienestar del cuidador (0 a 28 días de vida). CuidarIA parte de una premisa clínica simple: un cuidador contenido, informado y con sueño suficiente es la mejor garantía de un cuidado neonatal seguro. Por eso la plataforma atiende dos frentes a la vez: la salud del recién nacido y la salud emocional de quien lo cuida.

## Qué es

Un monolito clásico en Laravel (patrón MVC) con un asistente de IA basado en RAG (Retrieval-Augmented Generation) que responde consultas usando guías oficiales de salud (MINSAL, OMS, UNICEF) para la parte pediátrica, y contenido de psicoeducación perinatal para la parte de contención del cuidador. El sistema ajusta el tono de sus respuestas según el estado emocional reciente que el propio cuidador ha registrado.

## Por qué el nombre

CuidarIA se lee como "cuidaría" (te cuidaría) y encierra "cuidar" + "IA". El nombre describe la promesa central del producto en una sola palabra: una inteligencia que cuida, tanto del bebé como de quien lo cuida.

## Estado actual del proyecto

Fase de diseño. Existen maquetas HTML/Tailwind estáticas (no funcionales) de todas las vistas — ver `docs/VIEWS.md` para el inventario completo y su estado. Todavía no se ha creado el proyecto Laravel; eso se hará por separado en un entorno local con Laragon. Este repositorio de documentación es el punto de partida para que Claude Code entienda el contexto completo antes de iniciar el desarrollo del backend.

## Documentos de referencia

- `CLAUDE.md` — contexto y convenciones para Claude Code.
- `docs/ARCHITECTURE.md` — modelos, controladores, flujo RAG dual.
- `docs/DESIGN-SYSTEM.md` — paleta Celeste Menta, tipografía, reglas de iconografía.
- `docs/VIEWS.md` — inventario de vistas, estado y alcance actual (solo HTML).
- `docs/ROADMAP.md` — plan de desarrollo de 4 semanas.

## Stack técnico (para cuando se inicie el backend)

- Backend y core: Laravel 11+ (PHP 8.2+)
- Base de datos: MySQL 8.0, gestionada localmente con Laragon
- Plantillas: Laravel Blade
- IA: cliente HTTP nativo hacia Groq Cloud / Gemini API en producción, o LM Studio local (Llama 3 / Phi-3) para desarrollo offline
- Frontend de las maquetas actuales: HTML + Tailwind (CDN), sin frameworks de componentes todavía
