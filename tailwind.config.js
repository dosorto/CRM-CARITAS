const defaultTheme = require('tailwindcss/defaultTheme');
const { addDynamicIconSelectors } = require('@iconify/tailwind')

module.exports = {

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('daisyui'),
        addDynamicIconSelectors(),
    ],
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    "primary":          "#981915",  // Color de Fondo de la sidebar
                    "primary-content":  "#D1D5DB",  // Color del contenido de la Sidebar

                    "neutral":          "#FFFFFF",  // Color del Fondo Completo de la página

                    "base-100":         "#EFDFDF",  // Color de fondo de elementos varios por encima del fondo general
                    "base-content":     "#3A3232",  // Color de los textos e íconos de los elementos en el fondo general
                    
                },
                dark: {
                    ...require("daisyui/src/theming/themes")["dark"],

                    "primary":          "#981915",  // Color de Fondo de la sidebar
                    "primary-content":  "#D1D5DB",  // Color del contenido de la Sidebar

                    "neutral":          "#374151",  // Color del Fondo Completo de la página

                    "base-100":         "#1F2937",  // Color de fondo de elementos varios por encima del fondo general
                    "base-content":     "#FAFAFA",  // Color de los textos e íconos de los elementos en el fondo general                              

                    

                    "base-200":         "#1961FD",              
                    "base-300":         "#0f172a", 
                    
                    // Sin usar por el momento
                    "secondary":        "#AAAAAA",  
                    "secondary-content":"#AAAAAA",       
                    "accent":           "#37cdbe",       
                    "accent-content":   "#37cdbe",       
   
                    "info":             "#3b82f6",     
                    "info-content":     "#3b82f6",     
                    "success":          "#16a34a",      
                    "success-content":  "#16a34a",      
                    "warning":          "#f59e0b",     
                    "warning-content":  "#f59e0b",     
                    "error":            "#dc2626",   
                    "error-content":    "#dc2626",
                },
            },
        ],
        darkTheme: "dark",
        base: true,
        styled: true,
        utils: true,
        prefix: "",
        logs: true,
        themeRoot: ":root",
    },
    darkMode: ['class', '[data-theme="dark"]']
};