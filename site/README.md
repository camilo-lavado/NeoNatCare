# CuidarIA — sitio estático (Fase 1: HTML/CSS/JS)

Implementación real (no maqueta de canvas) de las pantallas descritas en `docs/VIEWS.md`, sin dependencias de build — se abre directo en el navegador o se sirve con cualquier servidor estático. Es la base que se traducirá a vistas Blade en la Fase 2 (ver `CLAUDE.md` raíz: todavía no existe el proyecto Laravel).

## Páginas

| Archivo | Pantalla |
|---|---|
| `index.html` | Landing |
| `login.html` | Login |
| `register.html` | Crear cuenta — incluye consentimiento explícito y separado para datos sensibles (Ley 21.719), validado en JS antes de avanzar |
| `register-baby.html` | Onboarding del bebé (paso 2 de 2 tras crear cuenta): nombre, fecha de nacimiento, semanas de gestación |
| `dashboard.html` | Dashboard del padre/madre |
| `chat.html` | Chat dual — "Sobre el bebé" / "Para mí" (toggle en JS) |
| `mood-log.html` | Bitácora emocional diaria |
| `screening.html` | Tamizaje breve — flujo de 8 preguntas en JS, sin recargar página |
| `screening-result.html` | Resultado del tamizaje |
| `wellbeing.html` | Panel de bienestar del cuidador |
| `log-measurement.html` | Registrar controles diarios (peso, tomas, sueño), enlazada desde la alerta del Dashboard |
| `urgent-baby.html` | Modal de urgencia médica (bebé) |
| `urgent-caregiver.html` | Modal de urgencia de salud mental (cuidadora) |
| `profile.html` | Perfil |
| `edit-profile.html` | Editar los datos de la cuenta del cuidador (nombre, correo, contraseña) |
| `edit-baby.html` | Editar los datos del bebé — mismos campos que `register-baby.html`, precargados |
| `privacy.html` | Privacidad y datos de salud — alineada con la Ley 21.719 (ver nota legal abajo) |
| `help.html` | Ayuda y contacto — canales de soporte + FAQ (`<details>` nativo) |
| `qr.html` | Lámina QR (material impreso/hospital) |

## Nota legal — `privacy.html`

Refleja la **Ley 21.719 de Protección de Datos Personales de Chile**, vigente en plenitud desde el **1 de diciembre de 2026**: datos de salud/bienestar emocional como categoría de "datos sensibles" con protección reforzada, consentimiento explícito/específico/revocable, los derechos **ARSOPB** (Acceso, Rectificación, Supresión, Oposición, Portabilidad, Bloqueo temporal), notificación de brechas a la Agencia de Protección de Datos Personales dentro de 72 horas, y un contacto de Delegado de Protección de Datos. Es contenido de producto — la página incluye una nota visible de que debe ser revisada por un asesor legal antes de producción; no reemplaza asesoría legal real.

## Estructura compartida

- `assets/css/main.css` — tokens de diseño (`:root` con las variables de `docs/DESIGN-SYSTEM.md`) y componentes (botones, tarjetas, chips, alertas, burbujas de chat, nav inferior, formularios, consentimiento, etc.).
- `assets/js/main.js` — interacciones: nav inferior activo (`data-page` en `<body>`), mostrar/ocultar contraseña (soporta varios campos por página), toggle de modo de chat, selector de ánimo, chips de selección, flujo del tamizaje, checkboxes genéricos (`data-checkbox`) y formularios con consentimiento obligatorio (`data-consent-form` + `data-redirect`, ver nota abajo).
- `assets/img/qr.svg` — el mismo SVG del mockup importado.

## Consentimiento de datos sensibles en formularios (`register.html`)

Los formularios que piden autorización para tratar datos sensibles usan `data-consent-form` en el `<form>`, `data-checkbox data-required` en cada casilla obligatoria y `data-redirect="siguiente.html"` en vez de un `onsubmit` inline. Esto es intencional: la navegación de éxito vive en `initConsentForms` (`main.js`), no en el HTML, para que ningún atajo (como un `onsubmit` puesto sin querer en un formulario nuevo) pueda saltarse la validación de que ambas casillas — términos generales y autorización específica de datos sensibles — estén marcadas.

## Notas para la migración a Blade (Fase 2)

- Cada página es HTML plano con clases semánticas (no hay inline-style soup salvo casos puntuales) — pensado para que cada `<div class="card">...</div>` etc. se traduzca 1:1 a un `@include`/componente Blade.
- El toggle de modo de chat y el flujo del tamizaje están en JS puro; en Blade probablemente el tamizaje pase a manejarse con estado de servidor (una pregunta por request) en vez de client-side, pero la lógica de puntaje (`finishScreening` en `main.js`) sirve de referencia para el cálculo de nivel (leve / leve-moderado / alto).
- Los nombres de componentes Blade sugeridos en `docs/DESIGN-SYSTEM.md` (`<x-mood-log>`, `<x-screening-question>`, `<x-chat-mode-toggle>`, `<x-wellbeing-summary-card>`) corresponden a bloques ya identificables en `mood-log.html`, `screening.html` y `chat.html`.
- `register-baby.html` y `edit-baby.html` comparten exactamente los mismos campos (nombre, fecha de nacimiento, semanas de gestación) porque ambos escriben al mismo modelo `Newborn` (ver `docs/ARCHITECTURE.md`) — en Blade debieran converger en una sola vista con prefill condicional en vez de mantenerse duplicados.
- El consentimiento explícito de datos sensibles en `register.html` debe volver a pedirse en el backend (no basta con la validación de JS del prototipo): la Ley 21.719 exige poder demostrar cuándo y a qué versión del texto se dio el consentimiento, así que en Laravel esto probablemente signifique guardar una fila de auditoría (usuario, fecha, versión de la política) al crear la cuenta.
