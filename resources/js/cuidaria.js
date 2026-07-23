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
    const moodHidden = document.querySelector("[data-mood-hidden]");
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
            if (moodHidden) moodHidden.value = option.dataset.moodOption;
        });
    });
}

/* Chips de selección simple (sueño en la bitácora, rol en el registro) */
function initChipSelectors() {
    document.querySelectorAll("[data-chip-group]").forEach((group) => {
        const chips = group.querySelectorAll(".chip-option");
        const sleepHidden = group.closest("form")?.querySelector("[data-sleep-hidden]");
        chips.forEach((chip) => {
            chip.addEventListener("click", () => {
                chips.forEach((c) => {
                    c.classList.remove(...SELECTED_CHIP_CLASSES);
                    c.classList.add(...UNSELECTED_CHIP_CLASSES);
                });
                chip.classList.remove(...UNSELECTED_CHIP_CLASSES);
                chip.classList.add(...SELECTED_CHIP_CLASSES);
                if (sleepHidden && chip.dataset.sleep) sleepHidden.value = chip.dataset.sleep;
            });
        });
    });
}

/* Formularios sin backend real todavía (bitácora, controles):
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

/* Tamizaje breve: Escala de Depresión Posparto de Edimburgo (EPDS), 10 ítems.
   Traducción española estándar ampliamente publicada — TODO(CuidarIA): verificar
   la redacción exacta contra el PDF oficial de MINSAL antes de producción (ver
   docs/RAG-FUENTES.md, la lectura automática del PDF quedó bloqueada).
   El puntaje real (suma, nivel, alerta de la pregunta 10) se calcula en el
   servidor (App\Services\EpdsScorer) — el cliente solo recolecta las respuestas
   y las envía en un POST real; no se calcula ni se decide nada sensible acá. */
const EPDS_ITEMS = [
    { text: "He sido capaz de reír y ver el lado bueno de las cosas", options: [
        { label: "Tanto como siempre", value: 0 },
        { label: "No tanto ahora", value: 1 },
        { label: "Mucho menos ahora", value: 2 },
        { label: "No, nada en absoluto", value: 3 },
    ] },
    { text: "He mirado el futuro con placer", options: [
        { label: "Tanto como siempre", value: 0 },
        { label: "Algo menos de lo que solía hacer", value: 1 },
        { label: "Definitivamente menos ahora", value: 2 },
        { label: "No, nada en absoluto", value: 3 },
    ] },
    { text: "Me he culpado sin necesidad cuando las cosas no salían bien", options: [
        { label: "Sí, la mayoría de las veces", value: 3 },
        { label: "Sí, algunas veces", value: 2 },
        { label: "No muy a menudo", value: 1 },
        { label: "No, nunca", value: 0 },
    ] },
    { text: "He estado ansiosa y preocupada sin motivo", options: [
        { label: "No, para nada", value: 0 },
        { label: "Casi nada", value: 1 },
        { label: "Sí, a veces", value: 2 },
        { label: "Sí, a menudo", value: 3 },
    ] },
    { text: "He sentido miedo y pánico sin motivo alguno", options: [
        { label: "Sí, bastante", value: 3 },
        { label: "Sí, a veces", value: 2 },
        { label: "No, no mucho", value: 1 },
        { label: "No, nada", value: 0 },
    ] },
    { text: "Las cosas me han estado abrumando", options: [
        { label: "Sí, la mayor parte del tiempo no he podido afrontarlas bien", value: 3 },
        { label: "Sí, a veces no he podido afrontarlas tan bien como siempre", value: 2 },
        { label: "No, la mayor parte del tiempo las he afrontado bastante bien", value: 1 },
        { label: "No, he estado afrontando las cosas tan bien como siempre", value: 0 },
    ] },
    { text: "Me he sentido tan infeliz que he tenido dificultades para dormir", options: [
        { label: "Sí, la mayoría de las veces", value: 3 },
        { label: "Sí, a veces", value: 2 },
        { label: "No muy a menudo", value: 1 },
        { label: "No, nada", value: 0 },
    ] },
    { text: "Me he sentido triste y desgraciada", options: [
        { label: "Sí, la mayoría de las veces", value: 3 },
        { label: "Sí, bastante a menudo", value: 2 },
        { label: "No muy a menudo", value: 1 },
        { label: "No, nada", value: 0 },
    ] },
    { text: "Me he sentido tan infeliz que he estado llorando", options: [
        { label: "Sí, la mayoría de las veces", value: 3 },
        { label: "Sí, bastante a menudo", value: 2 },
        { label: "Solo en alguna ocasión", value: 1 },
        { label: "No, nunca", value: 0 },
    ] },
    { text: "Se me ha ocurrido la idea de hacerme daño", options: [
        { label: "Sí, bastante a menudo", value: 3 },
        { label: "A veces", value: 2 },
        { label: "Casi nunca", value: 1 },
        { label: "Nunca", value: 0 },
    ] },
];

const OPTION_BASE_CLASSES = ["px-[18px]", "py-4", "rounded-2xl", "text-[15px]", "text-left"];
const OPTION_UNSELECTED_CLASSES = ["border-[1.5px]", "border-celeste-border", "bg-card", "text-ink"];
const OPTION_SELECTED_CLASSES = ["border-2", "border-menta", "bg-menta-100", "font-bold", "text-menta-600"];

function initScreening() {
    const root = document.querySelector("[data-screening]");
    if (!root) return;

    const form = document.querySelector("[data-screening-form]");
    const progressFill = root.querySelector("[data-progress-fill]");
    const progressLabel = root.querySelector("[data-progress-label]");
    const questionEl = root.querySelector("[data-question-text]");
    const optionList = root.querySelector("[data-option-list]");
    const backBtn = root.querySelector("[data-question-back]");
    const exitUrl = root.dataset.exitUrl;

    let step = 0;
    const answers = new Array(EPDS_ITEMS.length).fill(null);

    function render() {
        const total = EPDS_ITEMS.length;
        progressFill.style.width = `${((step + 1) / total) * 100}%`;
        progressLabel.textContent = `Pregunta ${step + 1} de ${total}`;
        questionEl.textContent = EPDS_ITEMS[step].text;

        optionList.innerHTML = "";
        EPDS_ITEMS[step].options.forEach((option) => {
            const btn = document.createElement("button");
            btn.type = "button";
            const isSelected = answers[step] === option.value;
            btn.classList.add(...OPTION_BASE_CLASSES, ...(isSelected ? OPTION_SELECTED_CLASSES : OPTION_UNSELECTED_CLASSES));
            btn.textContent = option.label;
            btn.addEventListener("click", () => {
                answers[step] = option.value;
                if (step < total - 1) {
                    step += 1;
                    render();
                } else {
                    submitScreening(answers, form);
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

/* Envía las 10 respuestas como un POST real a ScreeningController@store.
   El cálculo del puntaje, el nivel, y la derivación por la pregunta 10
   ocurren en el servidor — ver App\Services\EpdsScorer. */
function submitScreening(answers, form) {
    if (!form) return;
    answers.forEach((value) => {
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "answers[]";
        input.value = String(value);
        form.appendChild(input);
    });
    form.submit();
}
