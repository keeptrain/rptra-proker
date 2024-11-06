function toggleForm() {
    const formSection = document.getElementById('formSection');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (formSection.style.display === 'none' || formSection.style.display === '') {
        formSection.style.display = 'block'; // Show the form
        toggleIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 15l-7-7-7 7" />`; // Arrow Up
    } else {
        formSection.style.display = 'none'; // Hide the form
        toggleIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />`; // Arrow Down
    }
}