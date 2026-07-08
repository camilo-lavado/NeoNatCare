
document.addEventListener("DOMContentLoaded", () => {
    const screens = document.querySelectorAll('.screen');
    const navButtons = document.querySelectorAll('[data-target]');
    
    function showScreen(id) {
        screens.forEach(s => s.classList.remove('active'));
        const target = document.getElementById(id);
        if (target) target.classList.add('active');
    }
    
    navButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const targetId = btn.getAttribute('data-target');
            showScreen(targetId);
        });
    });
    
    // Default screen
    showScreen('LANDING');
});
