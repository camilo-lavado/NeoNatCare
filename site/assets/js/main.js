// CuidarIA — interacciones compartidas del sitio estático
"use strict";

document.addEventListener("DOMContentLoaded", () => {
  initBottomNav();
  initPasswordToggle();
  initChatModeToggle();
  initMoodLog();
  initChipSelectors();
  initScreening();
  initCheckboxes();
  initConsentForms();
  initNameCapture();
  initPersonalization();
});

/* Resalta el ítem activo del nav inferior según data-page en <body> */
function initBottomNav() {
  const page = document.body.dataset.page;
  if (!page) return;
  document.querySelectorAll(".bottom-nav__item[data-nav]").forEach((item) => {
    item.classList.toggle("is-active", item.dataset.nav === page);
  });
}

/* Login / Registro: mostrar/ocultar contraseña (soporta varios campos por página) */
function initPasswordToggle() {
  document.querySelectorAll("[data-password-toggle]").forEach((toggle) => {
    const input = toggle.closest(".field__control")?.querySelector("[data-password-input]");
    if (!input) return;
    toggle.addEventListener("click", () => {
      const isText = input.type === "text";
      input.type = isText ? "password" : "text";
      toggle.textContent = isText ? "visibility" : "visibility_off";
    });
  });
}

/* Checkboxes genéricos (recordarme, aceptar términos, consentimiento de datos sensibles) */
function initCheckboxes() {
  document.querySelectorAll("[data-checkbox]").forEach((box) => {
    box.setAttribute("role", "checkbox");
    box.setAttribute("tabindex", "0");
    box.setAttribute("aria-checked", box.classList.contains("is-checked") ? "true" : "false");
    const toggle = () => {
      box.classList.toggle("is-checked");
      box.setAttribute("aria-checked", box.classList.contains("is-checked") ? "true" : "false");
    };
    box.addEventListener("click", toggle);
    box.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        toggle();
      }
    });
  });
}

/* Formularios con consentimiento explícito de datos sensibles (Ley 21.719):
   no dejan avanzar hasta que se marquen los checkboxes requeridos. La
   navegación de éxito vive acá (no en un onsubmit inline) para que ningún
   otro handler pueda saltarse la validación. */
function initConsentForms() {
  document.querySelectorAll("[data-consent-form]").forEach((form) => {
    const requiredBoxes = form.querySelectorAll("[data-checkbox][data-required]");
    const errorEl = form.querySelector("[data-consent-error]");
    const redirect = form.dataset.redirect;

    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const allChecked = [...requiredBoxes].every((box) => box.classList.contains("is-checked"));
      if (!allChecked) {
        if (errorEl) errorEl.style.display = "block";
        return;
      }
      if (errorEl) errorEl.style.display = "none";

      // Si el formulario captura nombre y/o rol de vínculo con el bebé
      // (ej. register.html), los guardamos para personalizar Perfil/Dashboard.
      const roleChip = form.querySelector(".chip-option.is-selected[data-role]");
      const nameField = form.querySelector("[data-capture-name]");
      try {
        if (roleChip) sessionStorage.setItem("cuidaria_role", roleChip.dataset.role);
        if (nameField && nameField.value) sessionStorage.setItem("cuidaria_name", nameField.value);
      } catch (err) {
        /* sessionStorage puede no estar disponible (modo privado); seguimos igual */
      }

      if (redirect) window.location.href = redirect;
    });
  });
}

/* Formularios normales (no de consentimiento, ej. edit-profile.html) que
   también capturan el nombre para personalizar Perfil/Dashboard. */
function initNameCapture() {
  document.querySelectorAll("form[data-consent-form]").forEach((form) => form.dataset.captured = "1");
  document.querySelectorAll("form").forEach((form) => {
    if (form.dataset.captured === "1") return; // ya lo maneja initConsentForms
    const nameField = form.querySelector("[data-capture-name]");
    if (!nameField) return;
    form.addEventListener("submit", () => {
      if (!nameField.value) return;
      try {
        sessionStorage.setItem("cuidaria_name", nameField.value);
      } catch (e) {
        /* sessionStorage puede no estar disponible (modo privado); seguimos igual */
      }
    });
  });
}

/* Personaliza nombre y rol de vínculo con el bebé (madre/padre/otro cuidador)
   guardados durante el registro. Si no hay nada guardado, no toca el HTML
   por defecto (Valentina / Madre de Lucas). */
const ROLE_LABELS = {
  madre: "Madre de Lucas",
  padre: "Padre de Lucas",
  otro: "Cuidador/a de Lucas",
};

function initPersonalization() {
  let name = null;
  let role = null;
  try {
    name = sessionStorage.getItem("cuidaria_name");
    role = sessionStorage.getItem("cuidaria_role");
  } catch (e) {
    return;
  }

  if (name) {
    document.querySelectorAll("[data-personalized-name]").forEach((el) => {
      el.textContent = name;
    });
  }
  if (role && ROLE_LABELS[role]) {
    document.querySelectorAll("[data-role-chip]").forEach((el) => {
      el.textContent = ROLE_LABELS[role];
    });
  }
}

/* Chat: selector "Sobre el bebé" / "Para mí" */
function initChatModeToggle() {
  const segmented = document.querySelector("[data-chat-toggle]");
  if (!segmented) return;
  const options = segmented.querySelectorAll(".segmented__option");

  options.forEach((option) => {
    option.addEventListener("click", () => setChatMode(option.dataset.mode));
  });
}

function setChatMode(mode) {
  document.querySelectorAll(".segmented__option[data-mode]").forEach((el) => {
    el.classList.toggle("is-active", el.dataset.mode === mode);
  });
  document.querySelectorAll("[data-mode-panel]").forEach((el) => {
    el.classList.toggle("is-active", el.dataset.modePanel === mode);
  });
  document.querySelectorAll("[data-mode-only]").forEach((el) => {
    el.classList.toggle("is-active", el.dataset.modeOnly === mode);
  });
}

/* Bitácora emocional: selector de ánimo (única excepción a la regla sin-emoji) */
function initMoodLog() {
  const moodOptions = document.querySelectorAll("[data-mood-option]");
  if (!moodOptions.length) return;
  moodOptions.forEach((option) => {
    option.addEventListener("click", () => {
      moodOptions.forEach((o) => o.classList.remove("is-selected"));
      option.classList.add("is-selected");
    });
  });
}

/* Chips de selección simple (ej. horas de sueño) */
function initChipSelectors() {
  document.querySelectorAll("[data-chip-group]").forEach((group) => {
    const chips = group.querySelectorAll(".chip-option");
    chips.forEach((chip) => {
      chip.addEventListener("click", () => {
        chips.forEach((c) => c.classList.remove("is-selected"));
        chip.classList.add("is-selected");
      });
    });
  });
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

function initScreening() {
  const root = document.querySelector("[data-screening]");
  if (!root) return;

  const progressFill = root.querySelector("[data-progress-fill]");
  const progressLabel = root.querySelector("[data-progress-label]");
  const questionEl = root.querySelector("[data-question-text]");
  const optionList = root.querySelector("[data-option-list]");
  const backBtn = root.querySelector("[data-question-back]");

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
      btn.className = "option-list__item";
      if (answers[step] === idx) btn.classList.add("is-selected");
      btn.textContent = label;
      btn.addEventListener("click", () => {
        answers[step] = idx;
        if (step < total - 1) {
          step += 1;
          render();
        } else {
          finishScreening(answers);
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
      } else {
        window.location.href = "dashboard.html";
      }
    });
  }

  render();
}

function finishScreening(answers) {
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
  window.location.href = "screening-result.html";
}
