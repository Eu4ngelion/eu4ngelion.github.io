// Light & Dark Mode
const themeToggleButton = document.getElementById('theme-toggle');
themeToggleButton.addEventListener('click', function() {
    if (!document.body.classList.contains('light-theme')) {
        document.body.classList.remove('dark-theme');
        document.body.classList.add('light-theme');
    } else {
        document.body.classList.remove('light-theme');
        document.body.classList.add('dark-theme');
    }
});

// Hamburger Menu
const hamburgerButton = document.getElementById('hamburger');
const navlinks = document.getElementById('nav-links');
hamburgerButton.addEventListener('click', function() {
    if (!navlinks.classList.contains('show')) {
        navlinks.classList.add('show');
    }
    else {
        navlinks.classList.remove('show');
    }
});