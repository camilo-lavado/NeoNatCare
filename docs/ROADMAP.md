# Roadmap — CuidarIA (sprint de 4 semanas)

Alcance viable como monolito Laravel + Laragon en un mes, manteniendo dificultad media-alta sin retrasos.

## Semana 1 — Cimientos y bitácora emocional

- Scaffolding del proyecto en Laragon (PHP 8.2+, MySQL 8.0+).
- Migraciones de base de datos, incluyendo las tablas de registros anímicos (`mental_health_logs`, `screenings`).
- Conversión de las maquetas HTML existentes a vistas Blade: landing, login, dashboard, formularios de bitácora emocional y tamizaje.

## Semana 2 — Integración de la IA y prompting empático

- Conexión vía cliente HTTP al proveedor del LLM (Groq / Gemini, o LM Studio local para desarrollo offline).
- Programación de las reglas del `DynamicContextController` que ajustan el tono de la IA según el estado emocional registrado.
- Implementación del selector de modo en el chat (bebé / cuidador).

## Semana 3 — Indexación de datos RAG mixtos

- Carga en la base de datos de los fragmentos técnicos de pediatría y los fragmentos de contención/psicoeducación perinatal.
- Implementación del buscador MySQL para ambas líneas de `MedicalAndPsychologicalGuideline`.
- Construcción del panel de bienestar del cuidador (tendencias, insight proactivo).

## Semana 4 — Harness de seguridad y empatía, cierre

- Construcción del panel de pruebas críticas (`HarnessController`): validar derivación a urgencia médica y a salud mental de riesgo.
- Políticas de acceso y control de errores.
- Auditoría de seguridad del comportamiento de la IA.
- Optimización de interfaces y revisión final contra `docs/DESIGN-SYSTEM.md` (paleta, tipografía, regla sin-emoji).

## Fuera de alcance para este sprint

- Integraciones con dispositivos IoT o wearables.
- Videollamadas o telemedicina en vivo.
- Marketplace de productos o servicios.
- Multi-idioma (el MVP se entrega solo en español).
