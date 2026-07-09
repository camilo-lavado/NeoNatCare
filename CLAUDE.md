# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repository is

This is the **documentation/planning repo for CuidarIA**, a Laravel monolith (MVC) for first-time parents that combines two concerns in one product: clinical care guidance for the newborn (0–28 days) and emotional wellbeing support for the caregiver. It is not a generic baby-tracking app nor a therapy app — it's a companion that blends official clinical protocols with contextual emotional support.

**No Laravel project exists in this repo yet.** There is no code — only Markdown docs under `docs/`. The developer will scaffold the actual Laravel project separately, locally, using Laragon. Because of this:

- There are no build/lint/test commands to run here — don't invent them.
- Do not assume migrations, models, routes, or Blade views exist. Before generating any PHP/Blade code, verify the actual state of the repo/project first.
- Do not generate Laravel/Blade code against this repo speculatively "ahead of schedule" — the docs (especially `docs/VIEWS.md`) exist to be translated into Blade only once the Laravel project has actually been scaffolded.
- The current static mockups (HTML/Tailwind) referenced by the docs may not be present in this repo — ask the user for them if a task requires editing them rather than regenerating from scratch (see `docs/VIEWS.md`).

## Documentation map

- `docs/README.md` — product pitch, naming rationale, current phase, tech stack.
- `docs/ARCHITECTURE.md` — Eloquent models, controllers, and the dual-RAG flow.
- `docs/DESIGN-SYSTEM.md` — the "Celeste Menta" color system, typography, iconography, and copy tone rules.
- `docs/ROADMAP.md` — the 4-week MVP sprint plan and explicit out-of-scope items.
- `docs/VIEWS.md` — inventory of mockup views, their status, and what's pending.
- `docs/CLAUDE.md` — an earlier/duplicate copy of this file's guidance; treat this root `CLAUDE.md` as canonical and keep them in sync (or consolidate) rather than letting them diverge.

## Planned tech stack (once the backend is scaffolded)

- Laravel 11+ (PHP 8.2+), MySQL 8.0, managed locally via Laragon.
- Views: Laravel Blade. **No frontend framework** (React/Vue/Alpine) unless explicitly requested — Blade + Tailwind only.
- AI: native HTTP client to Groq Cloud / Gemini API in production; LM Studio (local Llama 3 / Phi-3) for offline dev.

## Architecture (planned) — dual RAG flow

The core feature is a **dual RAG pipeline** that answers caregiver questions using two separate knowledge lines depending on context: official pediatric clinical protocols (MINSAL/OMS/UNICEF) vs. perinatal mental-health psychoeducation content.

Key models: `User`, `Newborn`, `MentalHealthLog` (daily sleep/mood/anxiety check-in — feeds the RAG context), `Screening` (perinatal stress/depression self-assessment score), `MedicalAndPsychologicalGuideline` (indexed doc repository, split into the pediatric line and the mental-health line).

Key controllers:
- `DynamicContextController` — the RAG orchestrator. Reads the user's recent `MentalHealthLog` entries; if it detects sustained poor sleep or high anxiety, it adjusts the system prompt to be more empathetic and reduce guilt-inducing framing before issuing clinical instructions.
- `ChatController` — handles the two chat modes: "about the baby" (menta palette) vs. "for me" (celeste palette).
- `HarnessController` — admin panel that runs automated test batteries against AI responses before anything ships to production. Must validate two things: escalation to medical urgency (e.g. neonatal fever) and escalation to mental-health/psychiatric urgency (e.g. harm ideation) — both use the same coral urgency treatment regardless of whether the at-risk party is the baby or the adult.
- `CourseController` — manages educational content modules (pediatric + caregiver wellbeing), applying middleware/policies.

Naming is fixed by prior decision — don't rename models/controllers without flagging it first.

## Design system — non-negotiable rules

Full detail in `docs/DESIGN-SYSTEM.md`; the rules Claude is most likely to violate by default:

- **Fixed palette** ("Celeste Menta", updated 2026-07-09 to match the imported mockup): **celeste = brand/all pediatric content** (`--p:#3B9FB4`), **menta = caregiver wellbeing/"for me" mode** (`--sec:#7FCBB0`, text `--sec600:#2F6B57`), ámbar = mild warning/disclaimer only (`--amber:#E0A342`), coral = real urgency only, medical or mental-health (`--coral:#E8795E`). Never use coral or ámbar decoratively. If a new view seems to need a fifth color, that's a signal the copy/information hierarchy is wrong — fix that instead of adding a color.
- Typography: **Quicksand** for headings, **Nunito Sans** for body/UI text (not Manrope/Fraunces — that was the pre-mockup direction).
- **No emoji anywhere in the UI**, with exactly one exception: the mood selector in the daily emotional log (`<x-mood-log>`). Everywhere else, use **Material Symbols Rounded** icons, including urgency alerts and source badges.
- Fixed Blade component names (do not rename): `<x-mood-log>`, `<x-screening-question>`, `<x-chat-mode-toggle>`, `<x-wellbeing-summary-card>`.
- Copy tone: warm, direct, never clinical-cold or evaluative. Mental-health content must never read as judging parenting performance; screening disclaimers must always clarify "this is not a diagnosis."

## Scope discipline

This is a deliberately scoped 4-week MVP (see `docs/ROADMAP.md`). Do not introduce: IoT/wearable integration, live video calls/telemedicine, a marketplace, multi-language support, or a switch away from the Laravel monolith / MySQL — without the user explicitly asking. Don't over-engineer for scale beyond MVP needs.
