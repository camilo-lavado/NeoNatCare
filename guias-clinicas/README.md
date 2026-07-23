# Guías clínicas — material fuente

Esta carpeta **sí se sube al repo** (no está en `.gitignore`): es contenido real de producto, no documentación de planificación con IA. Sirve dos propósitos:

1. **Contenido para la landing** (`/bienvenida`): una sección de lectura con los puntos principales de las guías en que se basa el asistente, con cita a la fuente oficial.
2. **Semilla del RAG dual** (ver `docs/ARCHITECTURE.md`): cuando se construya `MedicalAndPsychologicalGuideline` (modelo + búsqueda), estos archivos son el material que se va a indexar — separados ya en línea pediátrica y línea de salud mental, como pide la arquitectura.

## Metodología de curación

- Fuentes priorizadas: **MINSAL** (Chile, por ser el contexto legal/sanitario del producto — Ley 21.719, Salud Responde), **OMS/WHO**, **UNICEF**.
- Cada punto es un **resumen original**, no una copia del texto fuente (derechos de autor). Máximo una cita textual corta (menos de 15 palabras) por tema, siempre entre comillas y atribuida.
- Cada tema cierra con una línea `Fuente:` con el nombre del documento/organismo y el enlace real.
- Esto **no reemplaza asesoría médica ni psicológica** — es la misma nota de deslinde que ya existe en `site/terms.html` / `resources/views/terms.blade.php`.

## Archivos

- [`pediatricas.md`](pediatricas.md) — línea pediátrica (0 a 28 días): fiebre neonatal, lactancia, sueño seguro, control de peso, cordón umbilical, ictericia, vacunación, edad corregida.
- [`salud-mental.md`](salud-mental.md) — línea de salud mental perinatal: depresión posparto y tamizaje, ansiedad perinatal, privación de sueño, cuándo derivar a urgencia, redes de apoyo (Chile), rol del cuidador no gestante.

## Estado

- [x] `pediatricas.md` — investigación completa, 8/8 temas con fuente. Falta revisión humana (ver detalle/puntos débiles en `docs/RAG-FUENTES.md`)
- [x] `salud-mental.md` — investigación completa, 6/6 temas con fuente. Falta revisión humana, especialmente el tema de derivación a urgencia
- [ ] Revisión humana de ambos archivos (copyright + exactitud + sensibilidad del contenido de salud mental) — **siguiente paso**
- [ ] Sección "Fuentes y guías" en `resources/views/landing.blade.php` — pendiente, se arma después de la revisión humana
- [ ] Migración/modelo `MedicalAndPsychologicalGuideline` y búsqueda MySQL/SQLite real — fuera de alcance de esta etapa, queda para cuando se construya el RAG real (ver `docs/ROADMAP.md`, Semana 3)

## Próximo paso al retomar

Si esta carpeta sigue con checkboxes sin marcar, retomar revisando `docs/RAG-FUENTES.md` — ahí queda el detalle de qué agente se lanzó, con qué prompt, y qué encontró o no encontró.
