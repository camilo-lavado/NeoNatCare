<x-layout page="urgent-baby" title="Urgencia médica — CuidarIA" raw>
    <x-urgency-sheet
        icon="emergency_home"
        title="Esto necesita atención médica ahora"
        copy="La dificultad para respirar y el quejido en un recién nacido requieren evaluación inmediata. Estás haciendo lo correcto al pedir ayuda."
        primary-label="Llamar a SAMU 131"
        primary-href="tel:131"
        secondary-icon="location_on"
        secondary-label="Ver urgencia más cercana"
        secondary-icon-color="text-celeste"
        :chat-href="route('chat')"
        footer-icon="verified"
        footer-icon-color="text-celeste"
        footer-text="Protocolo MINSAL · dificultad respiratoria neonatal"
        backdrop-bubble="Mi bebé respira muy rápido y hace un quejido al respirar"
        backdrop-variant="celeste"
    />
</x-layout>
