# Sistema de diseño — Celeste Menta

Paleta única y definitiva del proyecto. No introducir tonos nuevos sin aprobación explícita.

> **Actualizado 2026-07-09** a partir del mockup importado desde claude.ai/design ("NeonatCare AI Interface", archivo `NeonatCare AI.dc.html`, ver [mockups/neonatcare-ai.html](../mockups/neonatcare-ai.html)). Esa sesión de diseño invirtió deliberadamente los roles semánticos de celeste y menta respecto de la versión anterior de este documento ("dirección elegida", según el propio comentario del archivo) y cambió tipografía e iconografía. Esta versión documenta esa dirección como la vigente.

## Paleta de color

### Celeste (color primario de marca — todo lo pediátrico y la identidad de CuidarIA)
| Uso | Hex | Variable |
|---|---|---|
| Fondo de página | `#F2FAFB` | `--bg` |
| Fondo suave / tint | `#E4F4F5` | `--tint` |
| Acento suave (chips, badges de fuente médica) | `#CDE9EC` | `--acc` |
| Borde de acento | `#B7DEE2` | `--accB` |
| Acento claro (burbuja de usuario en chat pediátrico) | `#A9DEE6` | `--psoft` |
| Borde / línea suave general | `#DCEDEE` | `--border` |
| Primario de marca (botones principales, headers, nav activo) | `#3B9FB4` | `--p` |

### Menta (acento secundario — bienestar emocional del cuidador, modo "para mí")
| Uso | Hex | Variable |
|---|---|---|
| Fondo suave | `#EAF7F1` | `--sec50` |
| Fondo de chip / toggle activo | `#D8EFE3` | `--sec100` |
| Burbuja de usuario en chat "para mí" | `#BFE7D7` | `--secsoft` |
| Acento claro (gráficos, barras) | `#7FCBB0` | `--sec` |
| Acento medio (gráficos, días destacados) | `#5FAF95` | `--sec2` |
| Texto/ícono sobre fondo menta (máximo contraste) | `#2F6B57` | `--sec600` |

### Coral (reservado exclusivamente para urgencia real — médica o de salud mental)
- Fondo: `#FBE4DD` (`--coralbg`)
- Medio (botones de urgencia): `#E8795E` (`--coral`)
- Texto/ícono: `#C2603A` (`--coraltx`)

### Ámbar (solo para advertencias leves o disclaimers, nunca para urgencias)
- Fondo: `#FCEFD9` (`--amberbg`)
- Texto/ícono: `#E0A342` (`--amber`)

### Neutros
- Tarjeta / superficie: `#FFFFFF` (`--card`)
- Texto principal: `#26383C` (`--ink`)
- Texto secundario: `#74898C` (`--ink2`)

## Regla semántica de color — no negociable

| Color | Significado | Ejemplos de uso |
|---|---|---|
| Celeste | Marca, flujo normal, todo lo pediátrico | Landing, login, dashboard, nav, chat modo "Sobre el bebé", lámina QR |
| Menta | Bienestar emocional del cuidador, modo "para mí" | Chat en modo cuidador, bitácora emocional, panel de bienestar, tamizaje |
| Ámbar | Advertencia leve, disclaimer | "Esto es un apoyo, no un diagnóstico" |
| Coral | Urgencia real (bebé o adulto) | Fiebre neonatal, derivación a salud mental de riesgo, red de apoyo |

Nunca usar coral o ámbar de forma decorativa. Si una vista nueva necesita un cuarto tono, es señal de que el copy o la jerarquía de información está mal planteada — resolver ahí antes de pedir un color nuevo.

## Tipografía

- **Nunito Sans** — interfaz, cuerpo de texto, botones, formularios. Pesos usados: 400, 600, 700, 800.
- **Quicksand** — títulos (encabezados de pantalla, mensajes de bienvenida, nombres propios como el del bebé). Pesos usados: 500, 600, 700. Uso moderado: un titular por pantalla como máximo, nunca en botones de navegación inferior.

(Reemplaza a la pareja Manrope/Fraunces de la versión anterior de este documento.)

## Iconografía

Regla estricta: **sin emojis, con una sola excepción.**

- Única excepción permitida: el selector de ánimo en la bitácora emocional ("¿cómo te sientes hoy?"), donde los emojis funcionan como iconografía de estado reconocible al instante.
- En cualquier otro lugar de la app (navegación, botones, alertas, tarjetas, chat), usar **Material Symbols Rounded** (outline/rounded, peso 400), nunca emoji. Esto incluye las alertas de urgencia, los badges de fuente médica y los íconos de navegación inferior. (Reemplaza a la referencia anterior a Tabler/Lucide — mismo principio de iconografía outline, set concreto distinto.)
- Los iconos heredan el color del contexto semántico (celeste, menta, coral o ámbar según corresponda).

## Componentes y geometría

- Radio de esquina: 14–16px en tarjetas de contenido, 20px en tarjetas destacadas/hero, 40px en el marco de teléfono de las maquetas.
- Tarjetas: fondo blanco o crema, sin sombras duras — solo sombras suaves y difusas si el contenedor lo requiere.
- Botones primarios: fondo celeste de marca (`#3B9FB4`), texto blanco, radio 14–16px.
- Botones secundarios: fondo celeste acento (`#CDE9EC`), texto celeste de marca (`#3B9FB4`); en pantallas de modo "para mí" el equivalente menta es fondo `#D8EFE3` / texto `#2F6B57`.
- Un acento por vista: no combinar coral y ámbar en la misma pantalla salvo que ambos representen alertas simultáneas reales.

## Componentes Blade sugeridos (nombres fijos, no renombrar)

- `<x-mood-log>` — selector de ánimo con emojis, sueño y ansiedad.
- `<x-screening-question>` — pregunta única del tamizaje con barra de progreso.
- `<x-chat-mode-toggle>` — selector "sobre el bebé" / "para mí".
- `<x-wellbeing-summary-card>` — tarjetas resumen del panel de bienestar.

## Tono de escritura

- Cálido, directo, nunca clínico-frío ni evaluatorio.
- Nada de salud mental debe leerse como una calificación del desempeño parental.
- Los disclaimers de tamizaje siempre aclaran que no es un diagnóstico.
- Frases cortas, verbos activos, sin relleno corporativo.
