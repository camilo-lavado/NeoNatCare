<x-layout page="urgent-caregiver" title="No estás sola en esto — CuidarIA" raw>
    <x-urgency-sheet
        icon="volunteer_activism"
        title="No estás sola en esto"
        copy="Lo que sientes merece apoyo inmediato de una persona especializada. Hablar con alguien ahora puede ayudarte mucho."
        primary-label="Llamar a línea de contención"
        primary-href="tel:6003607777"
        secondary-icon="chat"
        secondary-label="Escribir a Salud Responde"
        secondary-icon-color="text-menta-600"
        :chat-href="route('chat')"
        footer-icon="verified"
        footer-icon-color="text-menta-600"
        footer-text="Red de salud mental perinatal · MINSAL"
        backdrop-bubble="A veces siento que ya no quiero seguir y pienso en hacerme daño"
        backdrop-variant="sec"
    />
</x-layout>
