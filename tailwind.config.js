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
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
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
                    "primary-content":  "#F1F5FB",  // Color del contenido de la Sidebar

                    "neutral":          "#FFFFFF",  // Color del Fondo Completo de la página

                    "base-100":         "#EFDFDF",  // Color de fondo de elementos varios por encima del fondo general
                    "base-content":     "#2A2222",  // Color de los textos e íconos de los elementos en el fondo general
                    
                    "accent":           "#E3DFDF",  // Color del encabezado de tablas, bordes y elementos de formulario especiales  
                    "accent-content":   "#F6EFEF",  // Color del cuerpo de las tablas y elementos de formulario comunes
                    
                    "error-content":    "#dc2626", // Color de alertas de validacion de formularios

                    "success":          "#6EE299",      
                    "success-content":  "#D0FDE1",
                },
                dark: {
                    ...require("daisyui/src/theming/themes")["dark"],

                    "primary":          "#981915",  // Color de Fondo de la sidebar
                    "primary-content":  "#D1D5DB",  // Color del contenido de la Sidebar

                    "neutral":          "#374151",  // Color del Fondo Completo de la página

                    "base-100":         "#1F2937",  // Color de fondo de elementos varios por encima del fondo general
                    "base-content":     "#FAFAFA",  // Color de los textos e íconos de los elementos en el fondo general                              

           
                    "base-300":         "#0f172a", 
                    
                    "accent":           "#536074",       
                    "accent-content":   "#424D5F",  

                    // Sin usar por el momento
                    "secondary":        "#AAAAAA",  
                    "secondary-content":"#AAAAAA",       
                         
                    "base-200":         "#1961FD",   
   
                    "info":             "#172554",  
                       
                    "info-content":     "#3b82f6",     
                    "success":          "#1A8241",      
                    "success-content":  "#16a34a",      
                    "warning":          "#f59e00",     
                    "warning-content":  "#FFFFFF",     
                    "error":            "#dc2626",   
                    "error-content":    "#F57979",
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