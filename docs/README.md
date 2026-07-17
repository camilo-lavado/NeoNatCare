# CuidarIA

Portal web de acompañamiento neonatal y bienestar del cuidador (0 a 28 días de vida). CuidarIA parte de una premisa clínica simple: un cuidador contenido, informado y con sueño suficiente es la mejor garantía de un cuidado neonatal seguro. Por eso la plataforma atiende dos frentes a la vez: la salud del recién nacido y la salud emocional de quien lo cuida.

## Qué es

Un monolito clásico en Laravel (patrón MVC) con un asistente de IA basado en RAG (Retrieval-Augmented Generation) que responde consultas usando guías oficiales de salud (MINSAL, OMS, UNICEF) para la parte pediátrica, y contenido de psicoeducación perinatal para la parte de contención del cuidador. El sistema ajusta el tono de sus respuestas según el estado emocional reciente que el propio cuidador ha registrado.

## Por qué el nombre

CuidarIA se lee como "cuidaría" (te cuidaría) y encierra "cuidar" + "IA". El nombre describe la promesa central del producto en una sola palabra: una inteligencia que cuida, tanto del bebé como de quien lo cuida.

## Estado actual del proyecto

El proyecto Laravel ya tiene backend real: autenticación completa (Laravel Breeze, login/registro/perfil contra la base de datos) y las 19 vistas de `site/` traducidas a Blade con Tailwind CSS v4. Lo que todavía falta es el modelo de datos del bebé (`Newborn`), la bitácora emocional y el tamizaje persistiendo en base de datos, y el asistente de IA con RAG dual — hoy esas pantallas existen visualmente pero sin backend detrás. Ver `docs/VIEWS.md` para el detalle vista por vista y `docs/ROADMAP.md` para el plan de trabajo.

## Documentos de referencia

- `docs/ARCHITECTURE.md` — modelos, controladores, flujo RAG dual.
- `docs/DESIGN-SYSTEM.md` — paleta Celeste Menta, tipografía, reglas de iconografía.
- `docs/VIEWS.md` — inventario de vistas y estado de implementación.
- `docs/ROADMAP.md` — plan de desarrollo de 4 semanas.

## Stack técnico

- Backend y core: Laravel 13 (PHP 8.3), autenticación con Laravel Breeze
- Base de datos: SQLite en desarrollo local
- Plantillas: Laravel Blade + Tailwind CSS v4 (sin frameworks de frontend)
- IA: cliente HTTP nativo hacia Groq Cloud / Gemini API en producción, o LM Studio local (Llama 3 / Phi-3) para desarrollo offline — todavía no implementado
- `site/`: implementación estática de referencia (HTML/CSS/JS) que sirvió de fuente de verdad visual para traducir a Blade
