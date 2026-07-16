// CuidarIA — interacciones compartidas (puerto de site/assets/js/main.js a las vistas Blade).
// A diferencia del mockup estático, aquí no existen clases CSS semánticas tipo
// ".is-selected" — cada init function alterna directamente las clases utilitarias
// de Tailwind que ya vienen renderizadas por los componentes Blade correspondientes.
"use strict";

document.addEventListener("DOMContentLoaded", () => {
    initPasswordToggle();
    initSwitches();
    initChatModeToggle();
    initMoodLog();
    initChipSelectors();
    initScreening();
    initFakeSubmitForms();
    initRoleCapture();
    initRolePersonalization();
});

const SELECTED_CHIP_CLASSES = ["border-menta", "bg-menta-100", "text-menta-600"];
const UNSELECTED_CHIP_CLASSES = ["border-celeste-border", "bg-card", "text-ink-2"];

/* Mostrar/ocultar contraseña (login, registro, editar perfil) */
function initPasswordToggle() {
    document.querySelectorAll("[data-password-toggle]").forEach((toggle) => {
        const input = toggle.closest("[data-field-control]")?.querySelector("[data-password-input]");
        if (!input) return;
        toggle.addEventListener("click", () => {
            const isText = input.type === "text";
            input.type = isText ? "password" : "text";
            toggle.textContent = isText ? "visibility" : "visibility_off";
        });
    });
}

/* Perfil: switch de recordatorio diario (visual, no persiste todavía) */
function initSwitches() {
    document.querySelectorAll("[data-switch]").forEach((btn) => {
        btn.addEventListener("click", () => {
            const isOn = btn.classList.toggle("bg-menta");
            btn.classList.toggle("bg-celeste-border", !isOn);
            const knob = btn.querySelector("span");
            if (knob) knob.classList.toggle("left-[19px]", isOn);
            if (knob) knob.classList.toggle("left-[3px]", !isOn);
        });
    });
}

/* Chat: selector "Sobre [bebé]" / "Para mí" */
function initChatModeToggle() {
    const segmented = document.querySelector("[data-chat-toggle]");
    if (!segmented) return;
    segmented.querySelectorAll("[data-mode]").forEach((option) => {
        option.addEventListener("click", () => setChatMode(option.dataset.mode));
    });
}

function setChatMode(mode) {
    document.querySelectorAll("[data-chat-toggle] [data-mode]").forEach((el) => {
        const active = el.dataset.mode === mode;
        el.classList.toggle("bg-card", active);
        el.classList.toggle("shadow-[0_2px_6px_rgba(38,56,60,.08)]", active);
        if (el.dataset.mode === "baby") {
            el.classList.toggle("text-ink", active);
            el.classList.toggle("text-ink-2", !active);
        }
    });
    document.querySelectorAll("[data-mode-panel]").forEach((el) => {
        el.classList.toggle("hidden", el.dataset.modePanel !== mode);
    });
    document.querySelectorAll("[data-mode-only]").forEach((el) => {
        el.classList.toggle("hidden", el.dataset.modeOnly !== mode);
    });
}

/* Bitácora emocional: selector de ánimo (única excepción a la regla sin-emoji) */
function initMoodLog() {
    const moodOptions = document.querySelectorAll("[data-mood-option]");
    if (!moodOptions.length) return;
    moodOptions.forEach((option) => {
        option.addEventListener("click", () => {
            moodOptions.forEach((o) => {
                const face = o.querySelector("[data-mood-face]");
                const label = o.querySelector("[data-mood-label]");
                const selected = o === option;
                face?.classList.toggle("bg-menta-100", selected);
                face?.classList.toggle("border-menta", selected);
                face?.classList.toggle("bg-card", !selected);
                face?.classList.toggle("border-celeste-border", !selected);
                label?.classList.toggle("text-menta-600", selected);
                label?.classList.toggle("font-bold", selected);
                label?.classList.toggle("text-ink-2", !selected);
            });
        });
    });
}

/* Chips de selección simple (sueño en la bitácora, rol en el registro) */
function initChipSelectors() {
    document.querySelectorAll("[data-chip-group]").forEach((group) => {
        const chips = group.querySelectorAll(".chip-option");
        chips.forEach((chip) => {
            chip.addEventListener("click", () => {
                chips.forEach((c) => {
                    c.classList.remove(...SELECTED_CHIP_CLASSES);
                    c.classList.add(...UNSELECTED_CHIP_CLASSES);
                });
                chip.classList.remove(...UNSELECTED_CHIP_CLASSES);
                chip.classList.add(...SELECTED_CHIP_CLASSES);
            });
        });
    });
}

/* Formularios sin backend real todavía (bitácora, controles, datos del bebé):
   simplemente evitan el submit real y navegan a la siguiente pantalla. */
function initFakeSubmitForms() {
    document.querySelectorAll("form[data-redirect]").forEach((form) => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            window.location.href = form.dataset.redirect;
        });
    });
}

/* El rol de cuidador (madre/padre/otro) todavía no tiene columna en `users`
   (ver TODO(CuidarIA) en register.blade.php), así que se sigue capturando
   vía sessionStorage como en el mockup — el formulario de registro es un
   POST real, así que solo guardamos el rol antes de que navegue. */
function initRoleCapture() {
    document.querySelectorAll("form").forEach((form) => {
        const roleChips = form.querySelectorAll("[data-chip-group] [data-role]");
        if (!roleChips.length) return;
        form.addEventListener("submit", () => {
            const selected = [...roleChips].find((c) => c.classList.contains("border-menta"));
            if (!selected) return;
            try {
                sessionStorage.setItem("cuidaria_role", selected.dataset.role);
            } catch (e) {
                /* sessionStorage puede no estar disponible (modo privado); seguimos igual */
            }
        });
    });
}

const ROLE_LABELS = {
    madre: "Madre de Lucas",
    padre: "Padre de Lucas",
    otro: "Cuidador/a de Lucas",
};

function initRolePersonalization() {
    let role = null;
    try {
        role = sessionStorage.getItem("cuidaria_role");
    } catch (e) {
        return;
    }
    if (role && ROLE_LABELS[role]) {
        document.querySelectorAll("[data-role-chip]").forEach((el) => {
            el.textContent = ROLE_LABELS[role];
        });
    }
}

/* Tamizaje breve: flujo de preguntas cliente-side, sin recargar página */
const SCREENING_QUESTIONS = [
    "¿Con qué frecuencia has sentido que no puedes controlar los sucesos importantes de tu vida?",
    "¿Con qué frecuencia te has sentido segura de tu capacidad para manejar tus problemas personales?",
    "En las últimas 2 semanas, ¿con qué frecuencia te has sentido abrumada o sin poder controlar las cosas importantes para ti?",
    "¿Con qué frecuencia has sentido que las dificultades se acumulan tanto que no puedes superarlas?",
    "¿Con qué frecuencia has dormido menos de lo que tu cuerpo necesita por cuidar a tu bebé?",
    "¿Con qué frecuencia has sentido ganas de llorar sin una razón clara?",
    "¿Con qué frecuencia has podido pedir ayuda cuando la has necesitado?",
    "¿Con qué frecuencia te has sentido conectada emocionalmente con tu bebé?",
];

const SCREENING_OPTIONS = ["Nunca", "Algunos días", "Más de la mitad de los días", "Casi todos los días"];

const OPTION_BASE_CLASSES = ["px-[18px]", "py-4", "rounded-2xl", "text-[15px]", "text-left"];
const OPTION_UNSELECTED_CLASSES = ["border-[1.5px]", "border-celeste-border", "bg-card", "text-ink"];
const OPTION_SELECTED_CLASSES = ["border-2", "border-menta", "bg-menta-100", "font-bold", "text-menta-600"];

function initScreening() {
    const root = document.querySelector("[data-screening]");
    if (!root) return;

    const progressFill = root.querySelector("[data-progress-fill]");
    const progressLabel = root.querySelector("[data-progress-label]");
    const questionEl = root.querySelector("[data-question-text]");
    const optionList = root.querySelector("[data-option-list]");
    const backBtn = root.querySelector("[data-question-back]");
    const exitUrl = root.dataset.exitUrl;
    const resultUrl = root.dataset.resultUrl;

    let step = 0;
    const answers = new Array(SCREENING_QUESTIONS.length).fill(null);

    function render() {
        const total = SCREENING_QUESTIONS.length;
        progressFill.style.width = `${((step + 1) / total) * 100}%`;
        progressLabel.textContent = `Pregunta ${step + 1} de ${total}`;
        questionEl.textContent = SCREENING_QUESTIONS[step];

        optionList.innerHTML = "";
        SCREENING_OPTIONS.forEach((label, idx) => {
            const btn = document.createElement("button");
            btn.type = "button";
            const isSelected = answers[step] === idx;
            btn.classList.add(...OPTION_BASE_CLASSES, ...(isSelected ? OPTION_SELECTED_CLASSES : OPTION_UNSELECTED_CLASSES));
            btn.textContent = label;
            btn.addEventListener("click", () => {
                answers[step] = idx;
                if (step < total - 1) {
                    step += 1;
                    render();
                } else {
                    finishScreening(answers, resultUrl);
                }
            });
            optionList.appendChild(btn);
        });
    }

    if (backBtn) {
        backBtn.addEventListener("click", () => {
            if (step > 0) {
                step -= 1;
                render();
            } else if (exitUrl) {
                window.location.href = exitUrl;
            }
        });
    }

    render();
}

function finishScreening(answers, resultUrl) {
    const total = answers.reduce((sum, v) => sum + (v ?? 0), 0);
    const max = answers.length * 3;
    const ratio = total / max;

    let level = "Leve";
    if (ratio >= 0.66) level = "Alto";
    else if (ratio >= 0.33) level = "Leve–moderado";

    try {
        sessionStorage.setItem("cuidaria_screening_level", level);
    } catch (e) {
        /* sessionStorage puede no estar disponible (modo privado); seguimos igual */
    }
    window.location.href = resultUrl;
}
