# CLAUDE.md — Contexto para Claude Code

Este archivo se lee automáticamente al abrir el proyecto. Contiene las decisiones ya tomadas para que no se re-discutan ni se reinterpreten al programar.

## Qué es CuidarIA

Portal Laravel monolítico (MVC) para padres primerizos, con doble foco: cuidado clínico del recién nacido (0-28 días) y bienestar emocional del cuidador. No es una app de tracking de bebé genérica ni una app de terapia; es un acompañante que combina protocolos clínicos oficiales con contención emocional contextual.

## Fase actual del proyecto — leer antes de programar

Todavía **no existe el proyecto Laravel**. Lo que existe hoy son maquetas estáticas en HTML/Tailwind (ver `docs/VIEWS.md`). El desarrollador va a crear el proyecto Laravel por su cuenta en un entorno local con Laragon. Cuando se retome el trabajo acá:

- No asumas que ya hay migraciones, modelos o rutas creadas — verifica el estado real del repo antes de generar código.
- El objetivo inmediato al iniciar el backend es traducir las maquetas HTML de `docs/VIEWS.md` a vistas Blade, y luego construir los modelos y controladores descritos en `docs/ARCHITECTURE.md`.
- No agregues librerías de frontend (React, Vue, Alpine, etc.) sin que se pida explícitamente. El frontend es Blade + Tailwind.

## Convenciones de nombres (no renombrar sin avisar)

Modelos: `User`, `Newborn`, `MentalHealthLog`, `Screening`, `MedicalAndPsychologicalGuideline`.
Controladores: `DynamicContextController` (orquesta el RAG dual), `ChatController`, `HarnessController`, `CourseController`.
Componentes Blade sugeridos: `<x-mood-log>`, `<x-screening-question>`, `<x-chat-mode-toggle>`, `<x-wellbeing-summary-card>`.

## Reglas de diseño no negociables

- Paleta exclusiva: Celeste Menta (ver `docs/DESIGN-SYSTEM.md`). No introducir colores nuevos sin justificación explícita del usuario.
- Sin emojis en la interfaz, con una única excepción: el selector de ánimo en la bitácora emocional ("¿cómo te sientes hoy?") sí puede usar emojis como íconos de estado. En cualquier otro lugar, usar iconografía outline (tipo Tabler/Lucide), nunca emoji.
- Jerarquía semántica de color estricta: coral = urgencia real (médica o de salud mental), ámbar = advertencia leve/disclaimer, menta = flujo normal. No usar coral ni ámbar decorativamente.
- Nada de salud mental debe sentirse punitivo o evaluatorio. Revisar el copy contra `docs/DESIGN-SYSTEM.md` antes de dar por cerrada cualquier vista nueva.

## Flujo RAG dual (resumen — detalle en ARCHITECTURE.md)

1. El controlador lee el `MentalHealthLog` reciente del usuario.
2. Busca el fragmento clínico relevante (línea pediátrica o línea de salud mental) en `MedicalAndPsychologicalGuideline`.
3. Construye el prompt: guía oficial + estado emocional reciente + pregunta del usuario.
4. El LLM responde ajustando el tono según la carga emocional detectada, sin dejar de ser preciso clínicamente.
5. El Harness (semana 4 del roadmap) valida que el sistema derive a urgencia médica o a salud mental cuando corresponda.

## Qué evitar

- No inventar features fuera de alcance (por ejemplo, videollamadas, integración con dispositivos IoT, marketplace) sin que el usuario lo pida.
- No optimizar prematuramente para escala; el alcance es un MVP de 4 semanas.
- No tomar decisiones de arquitectura mayores (cambiar de monolito a microservicios, cambiar de motor de base de datos, etc.) sin preguntar primero.
