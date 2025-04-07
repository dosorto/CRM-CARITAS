// resources/js/theme-switcher.js

// Función inmediata para prevenir flash
(function() {
    function getTheme() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            return savedTheme === 'dark';
        }
        return window.matchMedia('(prefers-color-scheme: dark)').matches;
    }

    const isDark = getTheme();
    if (isDark) {
        document.documentElement.classList.add('dark');
        document.documentElement.setAttribute('data-theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        document.documentElement.setAttribute('data-theme', 'light');
    }
})();

// Código del controlador del tema
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.querySelector('.theme-controller');
    if (!themeToggle) return; // Prevenir errores si el toggle no existe

    const htmlElement = document.documentElement;

    function setTheme(isDark) {

        const themeName = isDark ? 'dark' : 'light';

        if (isDark) {
            htmlElement.classList.add('dark');
            htmlElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            htmlElement.classList.remove('dark');
            htmlElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }

        // Emitir un evento personalizado cuando cambie el tema
        window.dispatchEvent(new CustomEvent('themeChanged', {
            detail: { theme: themeName }
        }));
    }

    function getTheme() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            return savedTheme === 'dark';
        }
        return false;
    }

    const isDarkTheme = getTheme();
    setTheme(isDarkTheme);
    themeToggle.checked = isDarkTheme;

    themeToggle.addEventListener('change', (e) => {
        setTheme(e.target.checked);
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (localStorage.getItem('theme') === null) {
            setTheme(false);
            themeToggle.checked = false;
        }
    });
});
