# Glosario — CuidarIA

Términos clínicos, legales y de producto que aparecen en la app, explicados en lenguaje simple. Este glosario **sí se sube al repo** — es contenido real de producto (útil para cualquiera que lea el código o revise la app), no material de planificación con IA.

Para las guías clínicas completas con cita a la fuente oficial, ver [`guias-clinicas/`](guias-clinicas). Para los conceptos de Laravel usados para construir la app, ver `APRENDIZAJE/` (local, no se sube).

## Clínicos — bebé (0 a 28 días)

**Apgar (puntaje Apgar)**
Evaluación rápida del estado del recién nacido, hecha al minuto 1 y al minuto 5 después del parto (a veces también a los 10 minutos si el resultado es bajo). Se creó en 1952 (Dra. Virginia Apgar) y mide 5 signos — color/apariencia, frecuencia cardíaca, reflejos, tono muscular y respiración — cada uno puntuado de 0 a 2, para un total de 0 a 10. Un puntaje más bajo al minuto 1 seguido de una mejora al minuto 5 es normal y esperable; no es, por sí solo, un diagnóstico de nada. En CuidarIA es un campo **opcional** al registrar al bebé (`register-baby`/`edit-baby`) — muchos cuidadores no lo tendrán a mano al crear la cuenta.

**Edad corregida**
Para bebés prematuros (nacidos antes de las 37 semanas de gestación), es la edad que "debería" tener contando desde la fecha estimada de parto en vez de la fecha real de nacimiento. Se calcula restando a la edad cronológica las semanas que faltaron para llegar a las 40 semanas de embarazo. Se usa para evaluar crecimiento y desarrollo sin generar preocupación injustificada por comparar a un bebé prematuro con uno de término. Detalle con fuente: [`guias-clinicas/pediatricas.md`](guias-clinicas/pediatricas.md#edad-corregida-bebés-prematuros).

**Semanas de gestación**
Cuánto duró el embarazo al momento del parto, medido en semanas. Junto con la fecha de nacimiento, es el dato que permite calcular la edad corregida si el bebé nació prematuro (antes de 37 semanas).

**Ictericia neonatal**
Coloración amarilla de la piel y los ojos, muy común en el recién nacido. La mayoría de los casos son normales (fisiológicos) y se resuelven solos en un par de semanas; hay señales de alarma específicas que sí requieren consulta el mismo día. Detalle: [`guias-clinicas/pediatricas.md`](guias-clinicas/pediatricas.md#ictericia-neonatal).

**Fiebre neonatal**
En un recién nacido, cualquier fiebre (incluso sin otros síntomas) se trata como potencialmente grave, porque su sistema inmune todavía no logra contener bien las infecciones — el umbral de preocupación es mucho más bajo que en un niño mayor. Detalle: [`guias-clinicas/pediatricas.md`](guias-clinicas/pediatricas.md#fiebre-neonatal).

**Onfalitis**
Infección del cordón umbilical o de la zona alrededor del ombligo — enrojecimiento, hinchazón, mal olor o secreción son señales de alarma que requieren consulta pronto.

**PNI (Programa Nacional de Inmunizaciones)**
El calendario oficial de vacunas gratuitas y obligatorias del MINSAL para todos los niños que viven en Chile. La **BCG** (contra formas graves de tuberculosis) se aplica en la maternidad, junto con la primera dosis de Hepatitis B — son las únicas vacunas del PNI durante el primer mes de vida.

**Control de niño sano**
Consulta periódica de seguimiento (peso, talla, desarrollo) que no espera a que el bebé esté enfermo — el primero ocurre dentro de los primeros días tras el alta.

## Salud mental perinatal

**Tamizaje (screening)**
Cuestionario corto y estandarizado para detectar señales tempranas de un problema — en este caso, de estrés o depresión perinatal. **No es un diagnóstico**: un resultado alto significa "vale la pena hablarlo con un profesional", no una conclusión clínica. Es la base de la pantalla `screening.blade.php` de la app.

**Depresión posparto**
Cuadro de salud mental que puede aparecer después del parto (o durante el embarazo), distinto de la tristeza pasajera de los primeros días ("baby blues"). Tiene tratamiento y detectarla a tiempo importa — por eso existe el tamizaje.

**Ansiedad perinatal**
Preocupación o miedo excesivo relacionado con el embarazo, el parto o la crianza temprana, que interfiere con el día a día — distinto del nivel de preocupación esperable en cualquier padre o madre primerizo.

**Psicoeducación perinatal**
Información y estrategias prácticas (no terapia) para entender y manejar mejor lo que se siente en el posparto — validación del cansancio, manejo de la privación de sueño, cuándo pedir ayuda.

## Legal y privacidad (Chile)

**Ley 21.719**
Ley de Protección de Datos Personales de Chile, vigente en plenitud desde el 1 de diciembre de 2026. Clasifica los datos de salud (físicos y de bienestar emocional) como **datos sensibles**, con protección reforzada.

**Datos sensibles**
Categoría de datos personales (salud, entre otras) que la ley protege de forma reforzada: requieren consentimiento explícito, específico y revocable — no basta con aceptar términos generales.

**ARSOPB**
Los seis derechos que la Ley 21.719 le da a cualquier persona sobre sus datos: **A**cceso, **R**ectificación, **S**upresión, **O**posición, **P**ortabilidad y **B**loqueo temporal. Detalle con qué significa cada uno: `privacy.blade.php`.

**DPO (Delegado de Protección de Datos)**
La persona/canal de contacto responsable de las consultas y solicitudes sobre datos personales dentro de una organización — en CuidarIA, `dpo@cuidaria.cl`.

## Organismos y fuentes citadas

- **MINSAL** — Ministerio de Salud de Chile. Fuente principal por ser el contexto legal/sanitario del producto.
- **OMS / WHO** — Organización Mundial de la Salud. Respaldo internacional cuando MINSAL no cubre un tema específico.
- **UNICEF** — Fondo de las Naciones Unidas para la Infancia.
- **Chile Crece Contigo** — Programa del Estado de Chile de apoyo a la primera infancia (MINSAL/MIDESO), fuente de varias recomendaciones prácticas (ej. lactancia).
- **Salud Responde** — Línea telefónica gratuita del MINSAL (600 360 7777), disponible 24/7, referenciada en la app como canal de contención de salud mental.

## Producto y tecnología

**RAG (Retrieval-Augmented Generation)**
Técnica de IA donde, antes de generar una respuesta, el sistema primero *busca* información relevante en una base de datos propia (en este caso, guías clínicas indexadas) y se la entrega al modelo de lenguaje como contexto — para que responda citando fuentes reales en vez de "inventar" (alucinar). CuidarIA usa un **RAG dual**: una línea de búsqueda para contenido pediátrico y otra para salud mental. Todavía no está implementado — `guias-clinicas/` es el material que eventualmente se indexará. Detalle de la arquitectura planeada: `docs/ARCHITECTURE.md`.

**MVC, rutas, Blade, componentes, migraciones, Eloquent** — ver `APRENDIZAJE/` (conceptos de Laravel, explicados con el código real de este proyecto).
