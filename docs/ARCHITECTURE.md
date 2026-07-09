# Arquitectura — CuidarIA

Monolito clásico en Laravel, patrón MVC. Se prioriza cohesión y velocidad de desarrollo sobre separación en servicios distribuidos; el alcance es un MVP de 4 semanas.

## Modelos (Eloquent ORM)

- **User** — cuidador principal. Datos de cuenta (solo primer nombre, no apellidos — minimización de datos bajo Ley 21.719) y rol de permisos (usuario/administrador). Incluye además el **vínculo con el bebé** (madre / padre / otro cuidador): no cambia permisos, solo adapta el copy de bienestar — el `DynamicContextController` no debe asumir recuperación física post-parto ni experiencia de gestación al generar contención emocional para un cuidador que no dio a luz. Al crear la cuenta debe quedar registro auditable de cuándo se dio el consentimiento explícito de datos sensibles y a qué versión de la política (no basta con la casilla marcada en el momento).
- **Newborn** — perfil del lactante: nombre (solo primer nombre), fecha de nacimiento, semanas de gestación (para cálculo de edad corregida si nació prematuro), puntaje Apgar al minuto 1 y 5 (opcional — da contexto sobre condiciones especiales al nacer, más allá de la prematurez).
- **MentalHealthLog** — registro diario del cuidador: horas de sueño percibidas, estado de ánimo (escala de 5), nivel de ansiedad (escala continua), nota libre opcional. Es la fuente de datos que alimenta al `DynamicContextController`.
- **Screening** — resultados del tamizaje breve autoadministrado (indicadores de estrés/depresión perinatal). Guarda puntaje y nivel resultante (leve / leve-moderado / alto).
- **MedicalAndPsychologicalGuideline** — repositorio documental indexado, dividido en dos líneas:
  1. Línea pediátrica: protocolos oficiales de salud del bebé (MINSAL, OMS, UNICEF).
  2. Línea de salud mental: estrategias de regulación emocional, manejo de privación de sueño, validación del cansancio, redes de apoyo.

## Controladores

- **DynamicContextController** — el "cerebro" del RAG dual. Antes de enviar la pregunta del usuario a la IA, revisa los últimos registros de `MentalHealthLog`. Si detecta patrones sostenidos de sueño crítico o ansiedad alta, ajusta el System Prompt para que la respuesta sea más empática, valide el esfuerzo del cuidador y reduzca la carga de culpa antes de entregar la instrucción clínica.
- **ChatController** — gestiona las peticiones del asistente interactivo en ambos modos (bebé / cuidador).
- **HarnessController** — panel administrativo para correr baterías de pruebas automatizadas sobre las respuestas de la IA antes de producción.
- **CourseController** — administra el flujo de contenido educativo (módulos pediátricos y módulos de bienestar del cuidador), aplicando middlewares/policies según corresponda.

## Vistas (Blade) — organización conceptual

- **Dashboard**: tarjeta de progreso del bebé + hitos próximos + accesos rápidos, y una columna de bienestar del cuidador con recordatorios de autocuidado (no solo vacunas del bebé).
- **Chat**: selector visible arriba del hilo — "sobre el bebé" (paleta menta) vs. "para mí" (paleta celeste).
- **Bitácora emocional / Screening**: formularios cortos, ver `docs/DESIGN-SYSTEM.md` para reglas de tono e iconografía.
- **Panel de bienestar**: métricas resumen, tendencia semanal, insight proactivo, acceso a red de apoyo.

Ver `docs/VIEWS.md` para el inventario completo de vistas, su estado (existente / nueva / modificada) y el alcance actual (solo maquetas HTML, sin lógica de backend todavía).

## Flujo RAG dual

```
[Consulta del cuidador]
        |
        v
[Laravel backend] --> lee MentalHealthLog (estado emocional reciente)
        |
        v
[Buscador MySQL] --> extrae guía clínica (línea pediátrica o línea de salud mental)
        |
        v
[Construcción del prompt] --> guía oficial + nivel de estrés del cuidador + pregunta
        |
        v
[LLM (Groq / Gemini)] --> responde educando al cuidador y asegurando su contención emocional
```

## Harness de seguridad y empatía

El banco de pruebas evalúa dos cosas antes de cualquier paso a producción:

1. Que el sistema derive a urgencia médica si el bebé está en riesgo (ej. fiebre neonatal).
2. Que el sistema derive a canales de salud mental o urgencia psiquiátrica si el cuidador expresa ideación de daño o colapso severo.

Ambas derivaciones usan la misma jerarquía visual (coral) definida en `docs/DESIGN-SYSTEM.md` — se tratan como el mismo nivel de riesgo, independientemente de si el paciente en riesgo es el bebé o el adulto.

## Vistas de referencia (implementación estática)

El mockup importado (`mockups/neonatcare-ai.html`) y las vistas HTML/CSS/JS standalone en `site/` (ver `docs/VIEWS.md`) son la fuente de verdad visual para traducir a Blade en la Fase 2. Usan la dirección de paleta celeste=marca/pediátrico, menta=bienestar del cuidador — ver la nota de actualización en `docs/DESIGN-SYSTEM.md`.
