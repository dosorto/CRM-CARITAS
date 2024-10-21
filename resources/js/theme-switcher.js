document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.querySelector('.theme-controller');
    const htmlElement = document.documentElement;

    // Function to set theme
    function setTheme(isDark) {
        if (isDark) {
            htmlElement.classList.add('dark');
            htmlElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            htmlElement.classList.remove('dark');
            htmlElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
    }

    // Function to get the current theme
    function getTheme() {
        // First, check localStorage
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            return savedTheme === 'dark';
        }
        // If no saved preference, return false for light theme
        return false;
    }

    // Set initial theme
    const isDarkTheme = getTheme();
    setTheme(isDarkTheme);

    // Update checkbox state
    themeToggle.checked = isDarkTheme;

    // Listen for checkbox changes
    themeToggle.addEventListener('change', (e) => {
        setTheme(e.target.checked);
    });

    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (localStorage.getItem('theme') === null) {
            setTheme(false);  // Always set to light if no preference
            themeToggle.checked = false;
        }
    });

    console.log('Xdddd')
});