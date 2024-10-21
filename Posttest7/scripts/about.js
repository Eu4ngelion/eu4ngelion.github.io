
// Light & Dark Mode
const themeToggleButton = document.getElementById('themeToggle');
const about = document.getElementById('about');
themeToggleButton.addEventListener('click', function() {
    if (!document.body.classList.contains('light-theme')) {
        document.body.classList.remove('dark-theme');
        document.body.classList.add('light-theme');
        themeToggleButton.classList.remove('bi-sun');
        themeToggleButton.classList.add('bi-moon');
    } else {
        document.body.classList.remove('light-theme');
        document.body.classList.add('dark-theme');
        themeToggleButton.classList.remove('bi-moon');
        themeToggleButton.classList.add('bi-sun');
    }
});