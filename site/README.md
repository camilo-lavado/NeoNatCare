# CuidarIA — sitio estático (Fase 1: HTML/CSS/JS)

Implementación real (no maqueta de canvas) de las 15 pantallas descritas en `docs/VIEWS.md`, sin dependencias de build — se abre directo en el navegador o se sirve con cualquier servidor estático. Es la base que se traducirá a vistas Blade en la Fase 2 (ver `CLAUDE.md` raíz: todavía no existe el proyecto Laravel).

## Páginas

| Archivo | Pantalla |
|---|---|
| `index.html` | Landing |
| `login.html` | Login / Registro |
| `dashboard.html` | Dashboard del padre/madre |
| `chat.html` | Chat dual — "Sobre el bebé" / "Para mí" (toggle en JS) |
| `mood-log.html` | Bitácora emocional diaria |
| `screening.html` | Tamizaje breve — flujo de 8 preguntas en JS, sin recargar página |
| `screening-result.html` | Resultado del tamizaje |
| `wellbeing.html` | Panel de bienestar del cuidador |
| `urgent-baby.html` | Modal de urgencia médica (bebé) |
| `urgent-caregiver.html` | Modal de urgencia de salud mental (cuidadora) |
| `profile.html` | Perfil |
| `privacy.html` | Privacidad y datos de salud — alineada con la Ley 21.719 (ver nota legal abajo) |
| `help.html` | Ayuda y contacto — canales de soporte + FAQ (`<details>` nativo) |
| `qr.html` | Lámina QR (material impreso/hospital) |

## Nota legal — `privacy.html`

Refleja la **Ley 21.719 de Protección de Datos Personales de Chile**, vigente en plenitud desde el **1 de diciembre de 2026**: datos de salud/bienestar emocional como categoría de "datos sensibles" con protección reforzada, consentimiento explícito/específico/revocable, los derechos **ARSOPB** (Acceso, Rectificación, Supresión, Oposición, Portabilidad, Bloqueo temporal), notificación de brechas a la Agencia de Protección de Datos Personales dentro de 72 horas, y un contacto de Delegado de Protección de Datos. Es contenido de producto — la página incluye una nota visible de que debe ser revisada por un asesor legal antes de producción; no reemplaza asesoría legal real.

## Estructura compartida

- `assets/css/main.css` — tokens de diseño (`:root` con las variables de `docs/DESIGN-SYSTEM.md`) y componentes (botones, tarjetas, chips, alertas, burbujas de chat, nav inferior, etc.).
- `assets/js/main.js` — interacciones: nav inferior activo (`data-page` en `<body>`), mostrar/ocultar contraseña, toggle de modo de chat, selector de ánimo, chips de selección, flujo del tamizaje.
- `assets/img/qr.svg` — el mismo SVG del mockup importado.

## Notas para la migración a Blade (Fase 2)

- Cada página es HTML plano con clases semánticas (no hay inline-style soup salvo casos puntuales) — pensado para que cada `<div class="card">...</div>` etc. se traduzca 1:1 a un `@include`/componente Blade.
- El toggle de modo de chat y el flujo del tamizaje están en JS puro; en Blade probablemente el tamizaje pase a manejarse con estado de servidor (una pregunta por request) en vez de client-side, pero la lógica de puntaje (`finishScreening` en `main.js`) sirve de referencia para el cálculo de nivel (leve / leve-moderado / alto).
- Los nombres de componentes Blade sugeridos en `docs/DESIGN-SYSTEM.md` (`<x-mood-log>`, `<x-screening-question>`, `<x-chat-mode-toggle>`, `<x-wellbeing-summary-card>`) corresponden a bloques ya identificables en `mood-log.html`, `screening.html` y `chat.html`.
