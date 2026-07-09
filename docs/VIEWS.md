# Inventario de vistas — CuidarIA

## Alcance actual

Todo lo listado abajo existe hoy **solo como maqueta estática en HTML/Tailwind** (sin lógica, sin backend, sin conexión a datos reales). La conversión a Blade, la creación de rutas y la lógica de controladores se hace recién cuando se inicie el proyecto Laravel en Laragon — no antes. Si Claude Code está generando código Blade o PHP a partir de este documento sin que el proyecto Laravel exista todavía, es una señal de que se está adelantando fuera de alcance.

## Vistas existentes (definidas antes del pivote a bienestar del cuidador)

| Vista | Estado | Notas |
|---|---|---|
| Landing | Estable | Copy debe mencionar el doble enfoque: bebé + cuidador |
| Login / Registro | Estable | Sin cambios de fondo |
| Dashboard del padre | Modificada | Columna de bienestar del cuidador agregada (ver abajo) |
| Chat IA | Modificada | Selector dual agregado (ver abajo) |
| Alerta de urgencia médica | Estable | Mantiene paleta coral, es la referencia de jerarquía visual para toda urgencia |
| Pantalla QR / acceso | Estable | Sin cambios de fondo |
| Perfil | Estable | Incluye accesos a "recordatorio diario de bitácora" y "red de apoyo y contención" |

## Vistas nuevas (a partir del pivote de bienestar del cuidador)

| Vista | Estado | Descripción |
|---|---|---|
| Bitácora emocional diaria | Maqueta HTML lista | Check-in de menos de 30 segundos: sueño, ánimo (única excepción a la regla sin-emoji), nivel de ansiedad, nota opcional |
| Tamizaje breve (Screening) | Maqueta HTML lista | Formato una pregunta a la vez, barra de progreso, disclaimer de "no es un diagnóstico", vista de resultado histórico |
| Panel de bienestar del cuidador | Maqueta HTML lista | Métricas resumen, tendencia semanal de ánimo, insight proactivo, acceso a red de apoyo |

## Vista modificada — detalle

**Chat con selector dual**: agrega un segmented control arriba del hilo ("sobre el bebé" en menta / "para mí" en celeste). El modo pediátrico mantiene cita a fuente oficial bajo cada respuesta médica. El modo cuidador usa tono de contención, sin perder precisión cuando la conversación deriva a una urgencia real.

**Dashboard**: la columna derecha pasa de mostrar solo vacunas/hitos del bebé a incluir también recordatorios de autocuidado generados según los patrones de la bitácora emocional.

## Archivo de referencia

El mockup completo (13 pantallas: Landing, Login, Dashboard, Chat dual —ambos modos—, Bitácora emocional, Tamizaje —pregunta y resultado—, Panel de bienestar, Modal de urgencia —bebé y cuidadora—, Lámina QR, Perfil) está importado desde el proyecto de diseño "NeonatCare AI Interface" (claude.ai/design) y vive en `mockups/neonatcare-ai.html` (+ `mockups/qr.svg`). Es HTML estático puro (sin Tailwind — ver nota de discrepancia abajo), pensado para abrirse directo en el navegador. No reconstruir estas vistas desde cero: partir de este archivo.

## Siguiente paso de diseño pendiente

Ya resuelto en `mockups/neonatcare-ai.html`: no quedan emojis fuera del selector de ánimo, y el branding ya dice "CuidarIA" en todas las pantallas (no "Sostén Perinatal AI").

## Nota de reconciliación con docs/DESIGN-SYSTEM.md (resuelta 2026-07-09)

El mockup importado invertía los roles de celeste/menta respecto de la versión anterior de `docs/DESIGN-SYSTEM.md` y cambiaba tipografía (Quicksand + Nunito Sans) e iconografía (Material Symbols Rounded). El usuario confirmó que el mockup manda: `docs/DESIGN-SYSTEM.md`, `docs/ARCHITECTURE.md` y el `CLAUDE.md` raíz ya quedaron actualizados con esa dirección.

## Implementación estática (HTML/CSS/JS)

Las 13 pantallas ya están implementadas como sitio estático independiente (sin dependencias de build) en `site/`, listo para servir tal cual o para traducir a Blade en la Fase 2. Ver `site/README.md` para el detalle de páginas y componentes JS.
